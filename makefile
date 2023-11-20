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
	@${MAKE} backend.init
	@${MAKE} down

# Backend
.PHONY: backend.init
backend.init:
	@docker compose run --rm backend su www-data -c "cp .env.example .env"
	@docker compose run --rm backend su www-data -c "sed -i s@%APP_URL%@${BACKEND_APP_URL}@ .env"
	@docker compose run --rm backend su www-data -c "composer install"
	@docker compose run --rm backend su www-data -c "php artisan key:generate"
	@docker compose run --rm backend su www-data -c "php artisan db:wipe --force"
	@docker compose run --rm backend su www-data -c "php artisan migrate --force"
	@docker compose run --rm backend su www-data -c "php artisan optimize:clear"
