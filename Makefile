install:
		composer install

lint:
		composer exec --verbose phpcs -- --standard=PSR12 src tests

lint-fix:
		composer exec --verbose phpcbf -- --standard=PSR12 src tests

test:
		composer exec --verbose phpunit tests

phpunit-gen:
		php ./vendor/bin/phpunit --generate-configuration

test-coverage-text-report:
		XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

test-coverage-html-report:
		XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-html ./test-reports/html