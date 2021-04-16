include .env
export $(shell sed 's/=.*//' .env)

DOCKER_COMPOSE      = docker-compose
COMPOSER            = docker exec -it $(APP_NAME)-php-fpm composer
PHP                 = docker exec -it $(APP_NAME)-php-fpm php
BUILDKIT            = COMPOSE_DOCKER_CLI_BUILD=1 DOCKER_BUILDKIT=1

#### [ Docker]
build: ### build/rebuild images
	$(BUILDKIT) $(DOCKER_COMPOSE) build

up: ## Start the docker hub
	$(BUILDKIT) $(DOCKER_COMPOSE) up -d

start: ## Starts existing containers for a service.
	$(DOCKER_COMPOSE) start

stop: ## Stops running containers without removing them.
	$(DOCKER_COMPOSE) stop

down: ## Stops containers and removes containers, networks, volumes, and images created by up.
	$(DOCKER_COMPOSE) down --remove-orphans

#### [ Application deployment ]

install:
	@printf '\033[1m === [ Installation GO GO GO ] ===\033[0m\n'
	$(COMPOSER) install --no-interaction -o
	#$(PHP) bin/console doctrine:schema:update --force

composer_update: ## update composer and vendors
	$(COMPOSER) selfupdate --2
	$(COMPOSER) update

#### [ Application test ]

ci:
	# Unit testing
	$(PHP) bin/phpunit
