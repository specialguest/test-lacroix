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
