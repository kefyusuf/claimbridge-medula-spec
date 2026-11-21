/**
 * PHP DTO codegen: emits a self-contained composer package into
 * dist/php — one string-backed enum per registry enum and one readonly
 * DTO class per registry DVO, with guide provenance docblocks.
 * Deterministic: no timestamps in the output.
 */
import { mkdirSync, writeFileSync } from "node:fs";
import { resolve } from "node:path";
import type { Registry, YamlFile } from "./loadRegistry.js";

const PHP_VERSION = "^8.3";
const PKG_NAME = "kefyusuf/claimbridge-medula-dto";

type Field = Record<string, unknown>;

/** Folds Turkish and non-ASCII characters to identifier-safe ASCII. */
function fold(text: string): string {
  return text
    .replace(/ç/gi, "c")
    .replace(/ğ/gi, "g")
    .replace(/ı|İ/gi, "i")
    .replace(/ö/gi, "o")
    .replace(/ş/gi, "s")
    .replace(/ü/gi, "u")
    .replace(/[^A-Za-z0-9]+/g, "_");
}

function pascal(text: string): string {
  return fold(text)
    .split("_")
    .filter(Boolean)
    .map((part) => part.charAt(0).toUpperCase() + part.slice(1))
    .join("");
}

function caseName(label: string, code: string): string {
  const base = pascal(label);
  const name = base === "" ? `Code_${code}` : base;
  return /^[A-Za-z_]/.test(name) ? name : `Code_${name}`;
}

function phpDoc(text: string): string {
  return text.replace(/\*\//g, "* /").trimEnd();
}

function provenance(dvo: YamlFile): string {
  const refs = (dvo.data["sourceRefs"] as Array<Record<string, unknown>>) ?? [];
  const first = refs[0] ?? {};
  const page = first["page"] ?? "?";
  const section = first["section"] ?? first["notes"] ?? "guide table";
  return `guideVersion 3.1.1, page ${page} (${phpDoc(String(section))}).`;
}

const TYPE_MAP: Record<string, string> = {
  string: "string",
  integer: "int",
  decimal: "float",
  boolean: "bool",
  date: "string",
};

function scalarType(type: string): string {
  return TYPE_MAP[type] ?? "array";
}

function enumClass(id: string): string {
  return pascal(id);
}

function dtoNamespace(domain: string): string {
  return `ClaimBridge\\Medula\\Dto\\${pascal(domain)}`;
}

function generateEnum(entry: YamlFile): string {
  const data = entry.data;
  const id = String(data["id"]);
  const name = enumClass(id);
  const values = (data["values"] as Array<Record<string, string>>) ?? [];
  const used = new Set<string>();
  const lines: string[] = [];
  for (const v of values) {
    let caseId = caseName(v["label"] ?? "", v["code"]);
    while (used.has(caseId)) {
      caseId = `${caseId}_v${v["code"]}`;
    }
    used.add(caseId);
    lines.push(
      `    case ${caseId} = ${JSON.stringify(v["code"])}; // ${v["label"]}`,
    );
  }
  const refs = (data["sourceRefs"] as Array<Record<string, unknown>>) ?? [];
  const page = refs[0]?.["page"] ?? "?";
  return [
    "<?php",
    "",
    "declare(strict_types=1);",
    "",
    "namespace ClaimBridge\\Medula\\Enum;",
    "",
    "/**",
    ` * ${phpDoc(String(data["displayName"] ?? id))} (guide 3.1.1, page ${page}).`,
    " *",
    " * @deprecated Generated artifact — do not edit by hand.",
    " */",
    `enum ${name}: string`,
    "{",
    ...lines,
    "}",
    "",
  ].join("\n");
}

function generateDvo(entry: YamlFile): string {
  const data = entry.data;
  const id = String(data["id"]);
  const domain = String(data["domain"]);
  const className = pascal(id);
  const fields = (data["fields"] as Array<Field>) ?? [];
  const used = new Set<string>();

  const props: string[] = [];
  const reads: string[] = [];
  const writes: string[] = [];
  const imports = new Set<string>();

  for (const f of fields) {
    const name = String(f["name"]);
    const prop = name;
    const type = String(f["type"] ?? "string");
    const enumRef = f["enumRef"] as string | null;
    const doc = phpDoc(String(f["description"] ?? ""));
    const deprecated = f["deprecatedIn"] ? " @deprecated." : "";
    let phpType: string;
    let readExpr: string;

    if (type === "enum" && enumRef) {
      const cls = enumClass(enumRef);
      imports.add(`use ClaimBridge\\Medula\\Enum\\${cls}`);
      phpType = `?${cls}`;
      readExpr = `isset($data[${JSON.stringify(name)}]) ? ${cls}::tryFrom((string) $data[${JSON.stringify(name)}]) : null`;
    } else if (type === "array" || type === "object") {
      phpType = "array";
      readExpr = `isset($data[${JSON.stringify(name)}]) && is_array($data[${JSON.stringify(name)}]) ? $data[${JSON.stringify(name)}] : []`;
    } else {
      phpType = `?${scalarType(type)}`;
      const key = JSON.stringify(name);
      const v = `$data[${key}]`;
      if (type === "integer") {
        readExpr = `isset($data[${key}]) && is_numeric($data[${key}]) ? (int) ${v} : null`;
      } else if (type === "decimal") {
        readExpr = `isset($data[${key}]) && is_numeric($data[${key}]) ? (float) ${v} : null`;
      } else if (type === "boolean") {
        readExpr = `isset($data[${key}]) ? (bool) ${v} : null`;
      } else {
        readExpr = `isset($data[${key}]) && is_scalar($data[${key}]) ? (string) ${v} : null`;
      }
    }

    let unique = prop;
    let counter = 2;
    while (used.has(unique)) {
      unique = `${prop}${counter++}`;
    }
    used.add(unique);

    props.push(
      `    /** ${doc}${deprecated} */`,
      `    public readonly ${phpType} $${unique}${type === "array" || type === "object" ? " = []" : " = null"},`,
    );
    reads.push(`        ${readExpr},`);
    if (type === "enum" && enumRef) {
      writes.push(
        `        ${JSON.stringify(name)} => $${unique} !== null ? $${unique}->value : null,`,
      );
    } else {
      writes.push(`        ${JSON.stringify(name)} => $${unique},`);
    }
  }

  const body = [
    "<?php",
    "",
    "declare(strict_types=1);",
    "",
    `namespace ${dtoNamespace(domain)};`,
    "",
    ...(imports.size ? [...imports].sort().map((i) => i + ";") : []),
    "",
    "/**",
    ` * ${phpDoc(id)} — ${provenance(entry)}`,
    " *",
    " * @deprecated Generated artifact — do not edit by hand.",
    " */",
    `final class ${className}`,
    "{",
    "    public function __construct(",
    ...props,
    "    ) {}",
    "",
    "    /** @param array<string, mixed> $data */",
    `    public static function fromArray(array $data): self`,
    "    {",
    "        return new self(",
    ...reads,
    "        );",
    "    }",
    "",
    "    /** @return array<string, mixed> */",
    "    public function toArray(): array",
    "    {",
    "        return [",
    ...writes,
    "        ];",
    "    }",
    "}",
    "",
  ].join("\n");
  return body;
}

export function writePhp(reg: Registry, phpDir: string): void {
  mkdirSync(resolve(phpDir, "src", "Enum"), { recursive: true });
  mkdirSync(resolve(phpDir, "src", "Dto"), { recursive: true });

  const enums = [...reg.enums].sort((a, b) =>
    String(a.data["id"]).localeCompare(String(b.data["id"])),
  );
  for (const entry of enums) {
    const name = enumClass(String(entry.data["id"]));
    write(resolve(phpDir, "src", "Enum", `${name}.php`), generateEnum(entry));
  }

  const dvos = [...reg.dvos].sort((a, b) =>
    `${a.data["domain"]}/${a.data["id"]}`.localeCompare(
      `${b.data["domain"]}/${b.data["id"]}`,
    ),
  );
  for (const entry of dvos) {
    const domain = pascal(String(entry.data["domain"]));
    const dir = resolve(phpDir, "src", "Dto", domain);
    mkdirSync(dir, { recursive: true });
    write(
      resolve(dir, `${pascal(String(entry.data["id"]))}.php`),
      generateDvo(entry),
    );
  }

  const composer = {
    name: PKG_NAME,
    description:
      "Generated PHP DTOs and enums for the claimbridge MEDULA-compatible claim flow — do not edit; regenerate from claimbridge-medula-spec.",
    license: "MIT",
    type: "library",
    require: { php: PHP_VERSION },
    autoload: {
      "psr-4": {
        "ClaimBridge\\Medula\\": "src/",
      },
    },
  };
  write(
    resolve(phpDir, "composer.json"),
    `${JSON.stringify(composer, null, 4)}\n`,
  );

  const readme = [
    "# claimbridge-medula-dto (generated)",
    "",
    "PHP 8.3 DTOs and string-backed enums generated from the",
    "claimbridge-medula-spec registry (guide 3.1.1). **Do not edit by hand** —",
    "regenerate with `pnpm generate` in the spec repository.",
    "",
    `- \`src/Enum/\` — ${enums.length} string-backed enums`,
    `- \`src/Dto/\` — ${dvos.length} readonly DTO classes grouped by domain`,
    "",
    "Every DTO exposes `fromArray()` / `toArray()`; enum-bound fields are typed",
    "with the generated enum class and coerced via `tryFrom` (never throws on",
    "codes added by later guide editions).",
    "",
    "All content is guide-verified with page-level provenance; the package",
    "contains no real patient data.",
    "",
  ].join("\n");
  write(resolve(phpDir, "README.md"), readme);
}

function write(path: string, content: string): void {
  mkdirSync(resolve(path, ".."), { recursive: true });
  writeFileSync(path, content, "utf8");
}
