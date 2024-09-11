# SLIM SKELETON

## Requirements:

- PHP 8.1 or newer
- MySQL / PostgreSQL / SQLite or any SQL Database
- Composer (https://getcomposer.org)

## Skeleton built with

- [Slim Framework 4](https://www.slimframework.com/)
- [Doctrine](https://www.doctrine-project.org/index.html)
- [PHP-DI](https://php-di.org)
- [DotENV](https://github.com/vlucas/phpdotenv)

## Configuring App

### Copying `.env` from `.env.example`

```bash
cp .env.example .env
```

### Configuring the database

for example

```dotenv
DB_DRIVER=pdo_pgsql
DB_HOST=127.0.0.1
DB_DATABASE=your_database
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_user_password
DB_PORT=5432
```

DBAL Drivers can be configure using this [pdo lists](https://www.doctrine-project.org/projects/doctrine-dbal/en/4.1/reference/configuration.html)

### Initialize Composer's file

Generate composer autoload using:

```bash
composer install
```

## Configuring the server

### Using PHP Build in server

This app can be run using simple PHP Built in server. Just run:

```bash
php -S localhost:1234 -t public
```

Now you can navigate your base url to **http://localhost:1234/**

### Using Valet

To use of valet to run the app

```bash
valet links skeleton
```

Now you can navigate your base url to **http://skeleton.test**

PS. **\*.test** subdomain should following your valet configuration

## Miscellaneous

### Doctrine CLI

This skeleton contains the CLI for Doctrine as well. To run doctrine cli, use

```bash
./bin/doctrine list
```

## Contact

- Author (Dito YP - https://github.com/jimmyfish)

## Contributing

- Just fork this project and open PR
- Please follow this contributing (code of conduct)[https://docs.github.com/en/communities/setting-up-your-project-for-healthy-contributions/setting-guidelines-for-repository-contributors]
