# Copilot Instructions

After every single edit to a PHP file, always run `php -l` on the edited file to lint it and ensure code sanity before proceeding further. This is mandatory for all PHP code changes.

## MultiFlexi Specific Guidelines

### Application Configuration (`*.app.json` files)
- All files `*.app.json` must conform to the schema available at: https://raw.githubusercontent.com/VitexSoftware/php-vitexsoftware-multiflexi-core/refs/heads/main/multiflexi.app.schema.json
- All files `*.credential-type.json` must conform to the schema available at: https://raw.githubusercontent.com/VitexSoftware/php-vitexsoftware-multiflexi-core/refs/heads/main/multiflexi.credential-type.schema.json
- Always use schema version 3.0.0
- Use `cmdparamsTemplate` with `${VARIABLE}` syntax for placeholders
- Environment variables must follow the pattern `^[A-Z0-9_]+$`
- Required fields: `$schema`, `name`, `description`, `executable`, `environment`
- Use localized strings where appropriate

### Validation
Please ensure any changes to `*.app.json` files are validated. The MultiFlexi CLI validation command may not be available in all versions:

```bash
# Try MultiFlexi CLI validation (if available)
multiflexi-cli application validate-json --file multiflexi/[filename].app.json

# Alternative: Use online JSON schema validator or tools like ajv-cli
# Install ajv-cli: npm install -g ajv-cli
# Validate: ajv validate -s schema.json -d multiflexi/[filename].app.json

# Alternative: Manual JSON syntax check
json_verify < multiflexi/[filename].app.json
```

**Note**: The MultiFlexi CLI validation may have issues in some versions. Ensure the JSON is syntactically valid and follows the schema structure manually if validation tools are not working.


