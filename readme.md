# Symfony CMS 


This project is a contact managing tool made in the context of an exercise from [Normandie Web School](https://normandie-web-school.fr/).

## Prerequisites

- Composer
- PHP (^7.2.5)
- Apache
- MySQL

### Installation

```
$ git clone
```

```
$ cd contact-manager
```

```
$ composer install
```

### Configuration

Create a new ".env.local" file and add those lines :

```
APP_ENV=dev
APP_SECRET=whatever
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```

Make sure to replace `db_user`, `db_password` and `db_name` by real values and generate a secret

### Initialization

Once you have configured your project you can run this command to create the schema 

```
$ php bin/console doctrine:migration:migrate
```

This step is optional but you can also run this command to load some dummy data into the database

```
$ php bin/console doctrine:fixtures:load
```

### Usage

When everything is done just startup your web server and Voila !
Your project should be accessible at :

- http://localhost/contact-manager/public
