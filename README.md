[![N|Solid](https://dev.vpoids.org/images/login-page-logo.png)](https://dev.vpoids.org/)

# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* API version 1.0.0
* API documentation
* API for Angelflight mobile application
* [Developed By](https://kisorniru.github.io/)

### Tech

Dillinger uses a number of open source projects to work properly:

* [Symfony 4.0.6] - Number one fastest PHP framework!
* [Twig] -  Modern template engine for PHP.
* [markdown-it] - Markdown parser done right. Fast and easy to extend.
* [Gulp] - the streaming build system
* [PhpStorm] - Super flexible and rich IDE for project development.

### Installation

This project requires latest [composer](https://getcomposer.org/) version and [git](https://git-scm.com/) to run.

```sh
$ git clone http://117.58.246.154:100/siddique/afids-api.git
$ cd afids-api
$ composer update
```

* copy and paste ``` .env.dist ``` file where it is AND rename it as ``` .env ``` file
* open ```.env``` file and change inside DATABASE_URL
    - DataBase_userName
    - DataBase_password
    - DataBase_host
    - DataBase_name

```sh
$ ---
$ DATABASE_URL=mysql://DataBase_userName:DataBase_password@DataBase_host:3306/DataBase_name
$ ---
```

# After Installation

run the bellow command from inside the project 
* to start listening development server

```sh
$ php bin/console server:start
```

* start browsing `http://127.0.0.1:8001`

* to stop listening development server

```sh
$ php bin/console server:stop
```
# Developed By

* [bGlobal Interactive Limited](https://www.bGlobal.com)
