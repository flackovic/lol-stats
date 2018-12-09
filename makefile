.PHONY: cs-fix
cs: ## executes php cs fixer
		./vendor/bin/php-cs-fixer --no-interaction --diff -v fix

.PHONY: cs-check
cs-check: ## executes php cs fixer in dry run mode
		./vendor/bin/php-cs-fixer --no-interaction --dry-run --diff -v fix
