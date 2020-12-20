docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker-compose exec php-cli vendor/bin/codecept run unit entities

migrate:
	docker-compose exec php-cli php artisan migrate

composer-update:
	docker-compose exec php-cli composer update

composer-require:
	docker-compose exec php-cli composer require
