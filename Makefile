D_VER=$(shell docker -v)
DC_VER=$(shell docker-compose -v)
CONTAINER_ID=$(shell docker ps -f name=yii2-test -q)
CURRENT_UID=$(id -u):$(id -g)
EXEC=docker exec --user $(CURRENT_UID) -it $(CONTAINER_ID)
COMPOSER=$(EXEC) composer
YII=$(EXEC) yii
YII_CMD=""

.PHONY: check_containers first up down yii

check_containers:
ifeq ($(strip $(CONTAINER_ID)),)
ifeq ($(D_VER),)
	$(error "Install docker first")
endif
ifeq ($(DC_VER),)
	$(error "Install docker-composer first")
endif
	@echo "Found " $(D_VER) "and" $(DC_VER)
	$(shell DOCKER_BUILDKIT=1 docker-compose up -d)
	@CONTAINER_ID=$(docker ps -f name=yii2-test -q)
	@echo "CONTAINER_ID is" $(CONTAINER_ID)
endif

first: check_containers
	@echo "=== Install Dependencies ==="
	@$(COMPOSER) install
	@echo "=== Make Database Migrations ==="
	@$(YII) migrate --interactive=0

up: check_containers

down:
	$(shell docker-compose down)

yii: check_containers
	@$(YII) $(YII_CMD)
