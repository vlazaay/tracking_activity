#.PHONY: restart-containers

restart-containers:
	docker-compose down
	docker-compose up -d

build:
	docker-compose up -d --build

start:
	docker-compose -f docker/docker-compose.yml up --build

stop:
	docker-compose -f docker/docker-compose.yml down

migrate:
	vendor/bin/phinx migrate
	echo "Migrations complete"

