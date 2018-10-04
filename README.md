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


* Creating Database with installing Doctrine support via the ORM pack
```sh
composer require symfony/orm-pack
```
	- This command will create ```Entity```, ```Migrations``` and ```Repository``` folder inside ```src``` folder
	- In addition under ```config/packages``` it'll create ```doctrine.yaml``` and ```doctrine_migrations.yaml``` file
	- At the same time under ```config/packages/prod``` folder it'll create another ```doctrine.yaml``` file

* To create a database by command please got to the ```.env``` file and change the ```db_user```, ```db_password``` and ```db_name``` and run the bellow command, which will create the database for you.
```sh
php bin/console doctrine:database:create
```

* For our project we are not using orm type as ```annotations```, where as we are using orm type as ```xml```. [Personally I myself and other develoer also feel orm type ```xml``` is most handy rather than using ```annotations```]

* Only annotation mapping is supported by ```php bin/console make:Entity``` so we have to make our xml by typing it.

* Now, we are going to change the orm type
	- to do this, open the ```config/packages/doctrine.yaml``` file
	- find the line ```type: annotation``` and replace it with ```type: xml```

* For more generalized our project we are changing the orm mapping directory [it's just an practise, not mandatory]
	- to do this, open the ```config``` folder
	- create a folder called ```doctrine```
	- now open the ```config/packages/doctrine.yaml``` file
	- find the line ```dir: '%kernel.project_dir%/src/Entity'``` and replace it with ```dir: '%kernel.project_dir%/config/doctrine'```

* Though we are not using ```annotations```, so we have to create entity file by manually
	- open ```src/Entity``` folder and create two entity files called ```Offices.php``` and ```OfficeEmployees.php```
	- to present the object relation between entities we created two entity here
	- now placed the bellow code into ```Offices.php``` and followed by ```OfficeEmployees.php```

```sh
<?php

namespace App\Entity;

class Offices
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $office_name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOfficeName()
    {
        return $this->office_name;
    }

    /**
     * @param string $office_name
     */
    public function setOfficeName(string $office_name)
    {
        $this->office_name = $office_name;
    }
}
```
* here variable type ```Offices``` is a special type of variable, which indicate that this is variable which is connected with other table's [here is ```Offices``` or ```src\Entity\Offices.php```] id. In Symfony autometically add ```_id``` with the variable name.
```sh
<?php

namespace App\Entity;

class OfficeEmployees
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Offices
     */
    protected $offices;

    /**
     * @var string
     */
    protected $emp_name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmpName()
    {
        return $this->emp_name;
    }

    /**
     * @param string $emp_name
     */
    public function setEmpName(string $emp_name)
    {
        $this->emp_name = $emp_name;
    }

    /**
     * @return Offices
     */
    public function getOffices()
    {
        return $this->offices;
    }

    /**
     * @param Offices $offices
     */
    public function setOffices(Offices $offices)
    {
        $this->offices = $offices;
    }
}
```

* To use Doctrine Extensions: Timestampable, Sluggable, Translatable, etc
```sh
composer require gedmo/doctrine-extensions
```

* Now inside ```config/doctrine``` folder create a file ```Offices.orm.xml``` and paste bellow codes
```sh
<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
        http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <entity name="App\Entity\Offices" table="offices">

        <id name="id" column="id" type="integer">

            <generator strategy="AUTO" />

        </id>

        <field name="office_name" type="string" nullable="true" />

    </entity>

</doctrine-mapping>
```

* Again inside ```config/doctrine``` folder create a file ```Offices.orm.xml``` and paste bellow codes
```sh
<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns:gedmo="http://gediminasm.org/schemas/orm/doctrine-extensions-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
        http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <entity name="App\Entity\OfficeEmployees" table="office_employees">

        <id name="id" column="id" type="integer">

            <generator strategy="AUTO" />

        </id>

        <field name="emp_name" type="string" nullable="true" />

        <one-to-one field="offices" target-entity="App\Entity\Offices">

            <cascade>
                <cascade-persist/>
            </cascade>

            <gedmo:blameable on="create"/>

            <join-column name="offices_id" referenced-column-name="id" nullable="false"/>

        </one-to-one>

    </entity>

</doctrine-mapping>
```

* Here ```one-to-one``` or ```one-to-many``` or ```many-to-one``` define the relationship with tables

* Now run the command for creating migration file by which next time developer can track the changes
```sh
php bin/console make:migration
```

* Our migration file is ready to execute now. After running the bellow command create the tables into database.
```sh
php bin/console doctrine:migrations:migrate
```

# Developed By

* [Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)
