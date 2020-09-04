#------------------------------------------------------------------------------
# Database Makefile
#------------------------------------------------------------------------------

database-admin-exec = docker-compose -f ${DOCKER_COMPOSE_FILE} exec -T --user root db ${1}
database-doctrine-exec = docker-compose -f ${DOCKER_COMPOSE_FILE} exec -T --user ${USER_ID} php ${1}

#------------------------------------------------------------------------------

db-init: db-create-database db-update-create ##@database create and populate database

db-create-database: clean-db
	$(call database-doctrine-exec, php bin/console doctrine:database:create)

db-update-create: 
	$(call database-doctrine-exec, php bin/console doctrine:schema:create)

db-update-schema: 
	$(call database-doctrine-exec, php bin/console doctrine:schema:update --force)

#------------------------------------------------------------------------------

clean-db: ##@database clean database
	$(call database-doctrine-exec, php bin/console doctrine:database:drop --force)

#------------------------------------------------------------------------------

.PHONY: db-init db-create db-populate
