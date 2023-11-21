SHELL=/usr/bin/env bash

include .env

.PHONY: build
build:
	@docker compose build

.PHONY: up
up:
	@docker compose up -d

.PHONY: down
down:
	@docker compose down

.PHONY: init
init:
	@${MAKE} backend.init.${ENV}
	@${MAKE} down

# Backend
.PHONY: backend.init.production
backend.init.production:
	@docker compose run --rm backend cp .env.example.production .env
	@docker compose run --rm backend sed -i s@%APP_URL%@${BACKEND_APP_URL}@ .env
	@docker compose run --rm backend composer install --no-dev
	@docker compose run --rm backend php artisan key:generate
	@docker compose run --rm backend php artisan db:wipe --force
	@docker compose run --rm backend php artisan migrate --force
	@docker compose run --rm backend php artisan optimize

.PHONY: backend.init.develop
backend.init.develop:
	@docker compose run --rm backend su www-data -c "cp .env.example.develop .env"
	@docker compose run --rm backend su www-data -c "sed -i s@%APP_URL%@${BACKEND_APP_URL}@ .env"
	@docker compose run --rm backend su www-data -c "composer install"
	@docker compose run --rm backend su www-data -c "php artisan key:generate"
	@docker compose run --rm backend su www-data -c "php artisan db:wipe --force"
	@docker compose run --rm backend su www-data -c "php artisan migrate --force"
	@docker compose run --rm backend su www-data -c "php artisan optimize:clear"
