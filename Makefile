docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

composer-install:
	docker-compose exec php-cli composer install

composer-update:
	docker-compose exec php-cli composer update

app:
	make docker-build
	make composer-install
	docker-compose exec php-cli php yii migrate --interactive=0
