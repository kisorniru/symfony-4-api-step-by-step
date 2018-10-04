[![N|Solid](https://dev.vpoids.org/images/login-page-logo.png)](https://dev.vpoids.org/)

# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* API version 1.0.0
* API documentation
* API for Angelflight mobile application
* [Developed By: Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)

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

* Symfony provides a utility called the "Security Checker" to check whether your project's dependencies contain any known security vulnerability
```sh
$ composer require sensiolabs/security-checker --dev
```

* This is a complex topic. But useful for developing tools to serialize and deserialize your objects
```sh
$ composer require symfony/serializer
```

* Create a ``` .htaccess ``` into your public directory and bellow code into their to remove index.php from url
```sh
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

* Create a folder called ``` Routes ``` into ``` src ``` directory
* Inside ``` Routes ``` folder Create a file ``` routes.yml ``` and add bellow code
	- ```api``` and ```test_route.yaml``` is what we are going to create
	- ```test``` is using for prefix
```sh
api_app_test:
    resource: "api/test_route.yaml"
    prefix: /test
```

* Create a folder called ``` api ``` into ``` Routes ``` directory
* Inside ``` api ``` folder Create a file ``` test_route.yaml ``` and add bellow code
	- ```TestController``` is a controller and ```indexAction``` is a function, what we create later
	- ```test-one``` is using for last route
```sh
api_app_test_one:
    path: /test-one
    methods: GET
    controller: App\Controller\TestController::indexAction
```

* Create a file inside ```Controller``` called ```TestController.php```
	- Extends base ```Controller``` with this ```TestController``` class
	- Use ```Controller\Controller``` with this ```TestController``` class
	- Use ```HttpFoundation\Response``` with this ```TestController``` class
	- Use ```Serializer\SerializerInterface``` with this ```TestController``` class

* Inside ``` TestController.php ``` create a public function called ```indexAction```
	- Add ```SerializerInterface``` into the ```indexAction``` function

# Developed By

* [Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)
