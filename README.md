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

### For New Project Setup GuideLine [Step by Step]

This project requires latest [composer](https://getcomposer.org/) version and [git](https://git-scm.com/) to run.

* If you already have virtual host setup and not require internal web server [here my project name is : symfony-api-boilerplate.local].
```sh
$ composer create-project symfony/website-skeleton symfony-api-boilerplate.local
```

* Switch to project directory
```sh
$ cd symfony-api-boilerplate.local
```

* If you require internal web server than 
```sh
$ composer require symfony/web-server-bundle --dev
```

* to start listening development server
```sh
$ php bin/console server:start
```

* start browsing `http://127.0.0.1:8000`

* to stop listening development server
```sh
$ php bin/console server:stop
```

# Developed By

* [Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)
