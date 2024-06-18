restart:
	php bin/console doctrine:database:drop --force || true
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate -n
	php bin/console doctrine:fixtures:load -n

clear-cache:
	APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear

composer-install:
	APP_ENV=prod composer install --no-dev --optimize-autoloader
