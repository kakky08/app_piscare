init:
	docker-compose up -d --build

up:
	docker-compose up -d

down:
	docker-compose down

laravel:
	docker-compose exec api composer create-project laravel/laravel .

app:
	docker compose exec app bash

dev:
	docker-compose exec front yarn dev

front:
	docker-compose exec front sh

tailwind:
	yarn add -D tailwindcss@latest postcss@latest autoprefixer@latest
	yarn tailwindcss init -p
	exit
