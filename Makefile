.PHONY: up down rebuild

# Variable que almacena el nombre de la carpeta
CONT :=000

up:
	docker-compose up -d

down:
	docker-compose down

rebuild:
	docker-compose down
	docker-compose build --no-cache
	docker-compose up -d

prune:
	docker-compose down --remove-orphans

terminal:
	sudo docker exec -it $(CONT) bash