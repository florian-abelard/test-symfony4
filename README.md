# test symfony 4

## Démarrage

### Pré-requis

* docker
* docker-compose (version 3)

### Usage

#### Démarrage des containers docker

Editer le fichier `.env`, puis : 
```bash
make up
```

### Avec symfony

```bash
rm application/ -Rf
docker-compose exec php composer create-project symfony/website-skeleton application

# A compléter
```

### Accès

Accès interface web sur `http://localhost:8080`

Accès adminer sur `http://localhost:8081`
