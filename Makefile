CONTAINER_NAME := guess-php

### DOCKER ###
build:
	@docker-compose build

up:
	@docker-compose up -d

down:
	@docker-compose down

clean:
	@docker system prune --all --force

bash:
	@docker exec -it $(CONTAINER_NAME) sh

### COMPOSER ###
composer:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer install

### ANALYSIS ###
phpstan:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer phpstan

lint:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer lint

ccs:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer ccs

fcs:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer fcs

### TESTING ###
ci:
	@docker exec -e APP_ENV=test -it $(CONTAINER_NAME) composer ci

### DATABASE ###
doctrine-fixtures-load:
	@docker exec -it $(CONTAINER_NAME) php bin/console doctrine:fixtures:load --no-interaction

doctrine-mapping-info:
	@docker exec -it $(CONTAINER_NAME) php bin/console doctrine:mapping:info

doctrine-mapping-import:
	@docker exec -it $(CONTAINER_NAME) php bin/console doctrine:mapping:import "App\Entity" xml --path=config/import

doctrine-schema-update:
	@docker exec -it $(CONTAINER_NAME) php bin/console doctrine:database:create --if-not-exists
	@docker exec -it $(CONTAINER_NAME) php bin/console doctrine:schema:update --force