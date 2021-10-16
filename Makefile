PHP_SERVICE := $(docker ps -q -f "name=guess-game-api_php")

build:
	@docker-compose build

up:
	@docker-compose up -d

down:
	@docker-compose down

clean:
	@docker system prune --volumes --force

composer:
	@docker-compose exec -T $(PHP_SERVICE) composer install

console:
	@docker-compose exec -T $(PHP_SERVICE) php bin/console

doctrine-mapping-info:
	@docker-compose exec -T $(PHP_SERVICE) php bin/console doctrine:mapping:info

doctrine-schema-update:
	@docker-compose exec -T $(PHP_SERVICE) php bin/console doctrine:database:create --if-not-exists
	@docker-compose exec -T $(PHP_SERVICE) php bin/console doctrine:schema:update --force

doctrine-mapping-import:
	@docker-compose exec -T $(PHP_SERVICE) php bin/console doctrine:mapping:import "App\Entity" xml --path=config/import