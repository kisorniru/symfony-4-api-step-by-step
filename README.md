[![N|Solid](https://symfony.com/images/v5/logos/header-logo.svg)](https://symfony.com/doc/current/index.html)

# README #

This documentation will help to jump start with [Symfony](https://symfony.com/). If you are familiar with different framework of php then this documentation is for you, otherwise not. Remember one thing, this is a dummy CRUD project using symfony which lets you to start Symfony quickly but not teach you Symfony. To do this you have to visit Symfony site. 

### What is this repository for? ###

* web-server-bundle
* security-checker
* twig(https://twig.symfony.com/)
* routing
* form
* form-type 
* controller
* entity
* xml
* orm
* serializer
* CRUD Application
* [Developed By: Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)

### Tech

Dillinger uses a number of open source projects to work properly:

* [Symfony 4.1.0] - Number one fastest PHP framework!
* [Twig] -  Modern template engine for PHP.
* [markdown-it] - Markdown parser done right. Fast and easy to extend.
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

* Before creating the routes, lets create Database with installing Doctrine support via the ORM pack
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
     * @var string
     */
    protected $office_description;

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

    /**
     * @return string
     */
    public function getOfficeDescription()
    {
        return $this->office_description;
    }

    /**
     * @param string $office_description
     */
    public function setOfficeDescription(string $office_description)
    {
        $this->office_description = $office_description;
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

        <field name="office_description" type="string" nullable="true" />

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

* We will come back to ```Repository```, but before that lets do something controlling stuff with ```Controller``` 

* Create two file inside ```Controller``` folder called ```OfficesController.php``` and ```OfficeEmployeesController.php```
	- Extends base controller by using ```use Symfony\Bundle\FrameworkBundle\Controller\Controller;``` with this two controller
	- ```use Symfony\Bundle\FrameworkBundle\Controller\Controller;``` with this two controller
	- ```use Symfony\Component\HttpFoundation\Response;``` with this two controller

* Now we are starting with ```OfficesController.php``` controller
* Inside ``` OfficesController.php ``` create a public function called ```index```, which will show a hello message for us. So, lets do something fun part.
	- Run ```composer require twig``` command to add ```twig```. Twig is a view template engine. In symfony you can use two different view engine for view write. Apart from ```twig``` you can use ```php``` [ reference : https://symfony.com/doc/2.0/cookbook/templating/PHP.html]. But remember, Symfony recomand ```twig``` instead of any other things. I am using twig for this documentation.
	- After running the command for twig, it'll create a folder called ```Template``` into project root directory, where mainly all view related files will stored.
	- For configure your own directory path, you have to open the ```config/packages/twig.yaml``` file and change into ```default_path: '%kernel.project_dir%/templates'``` this line. I am taking the default path for this project.
	- To organize the files for particular things I love to create folder by folder for it's related files.
	- Create a folder called ```Offices``` where we'll store all ```Offices``` related files.
	- First of all create a file called ```index.html.twig``` inside ```Offices``` folder
	- add bellow html code into ```index.html.twig``` for an example purpose
	- Twig is a view design template engine. To read more about it visit it's official website documentation [https://twig.symfony.com/]. 
```sh
<h1> {{ title }}</h1>

<div>

    <h3>What is Lorem Ipsum?</h3>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    <br>
    <h3>Why do we use it?</h3>
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

</div>
```

* Now we are going to call this view file from controller. Open ```OfficesController.php``` file and paste the bellow code inside ```index``` function.
```sh
	$pageTitle = "Home Page";

    $offices = $this->getDoctrine()->getRepository(Offices::class)->findAll();

    return $this->render('Offices/index.html.twig', [
        'title' => $pageTitle,
        'offices' => $offices,
    ]);
```

	<!-- - Add ```SerializerInterface``` into the ```indexAction``` function -->

* Now lets call the route. Create a ``` .htaccess ``` into your ```public``` directory and bellow code into their to remove index.php from url.
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

* To more organize our application we are creating a folder called ``` Routes ``` into ``` src ``` directory and going to map it with the main route file ```config/routes.yaml``` by add this code
```sh
index:
   path: /
   controller: App\Controller\OfficesController::index

web_app:
  resource: "../src/Routes/routes.yml"
  prefix: /web
```
	- here ```prefix``` is not mendatory.

* Inside ``` Routes ``` folder Create a file ``` routes.yml ``` and a folder ```web``` and again inside ```web``` create another folder ```offices```
* Now Open the ``` routes.yml ``` file and add bellow code
```sh
web_app_offices:
    resource: "web/offices/routes_for_offices.yaml"
    prefix: /offices
```
	- here ```prefix``` is not mendatory.

* Inside ``` offices ``` folder create a file ``` routes_for_offices.yaml ``` and add bellow code
	- ```OfficesController``` is a controller and ```index``` is a function, what we create earlier
	- path ```index``` is the last part of our route
```sh
web_app_index:
    path: /index
    methods: GET
    controller: App\Controller\OfficesController::index
```

* Now browse ```http://127.0.0.1:8000/web/offices/index``` Seeeeeeeee!!!! we are done!!!

* Now we will add some office name into ```offices``` table from our another view file.

* Oh! now lets do some stylesheet stuf by creating ```css``` and ```images``` folder into ```public``` folder. We are creating ```css``` folder for stylesheets and ```images``` for assets into public folder. we are using public folder for regular access. Now create ```style.css``` file into css folder and add bellow code to test our own stylesheet test.
```sh
	h1 {
		color: #F00001;
	}
```
	- run ```composer require asset``` command to access asset() function.

* Now open ```templates/base.html.twig``` file and bellow command
```sh
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>{% block title %} {% endblock %}</title>

        {% block stylesheets %}
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        {% endblock %}

    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg navbar-light navbar-bg mb-5">

            <a style="margin-left: 75px;" class="navbar-brand space-brand" href="{{ app.request.schemeAndHttpHost }}">
                <img class="nav-profile-img rounded-circle" src="{{ asset('images/dummy_logo_1.jpg') }}">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav mr-auto">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: #000;" href="{{ asset('web/offices/index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Offices
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ asset('web/offices/create') }}">Office List</a>
                                <a class="dropdown-item" href="{{ asset('web/offices/create') }}">New Office</a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: #000;" href="{{ asset('web/offices/index') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Office Employee
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ asset('web/offices/create') }}">Office Employee List</a>
                                <a class="dropdown-item" href="{{ asset('web/offices/create') }}">New Office Employee</a>
                            </div>
                        </li>
                    </ul>

                </ul>

                <form class="form-inline my-2 my-lg-0">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>

                </form>

            </div>

        </nav>

        {% block body %} {% endblock %}

        {% block pagescripts %}

            <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

            <script>
                $('.dropdown-toggle').dropdown();

            </script>

        {% endblock %}

    </body>

</html>
```

* Again open our created ```index.html.twig``` and paste the bellow code
```sh
{% extends 'base.html.twig' %}

{% block title %} {{ title }} {% endblock %}

{% block body %}

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="show-article-container p-3 mt-4">
                    <table id="offices" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Office Name</th>
                            <th>Office Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            {% if offices %}
                                {% for office in offices %}
                                    <tr>
                                        <td>{{ office.officeName }}</td>
                                        <td>{{ office.officeDescription }}</td>
                                        <td>
                                            <a href="/web/offices/{{ office.id }}" class="btn btn-dark">Show</a>
                                            <a href="/web/offices/edit/{{ office.id }}" class="btn btn-light">Edit</a>
                                            <a href="#" class="btn btn-danger delete-office" data-id="{{ office.id }}">Delete</a>
                                        </td>
                                    </tr>
                                {% endfor %}
                            {% else %}
                                <tr>
                                    <td colspan="3">No offices to display</td>
                                </tr>
                            {% endif %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{% endblock %}
```

* Lets add some offices and for that inside ``` offices/routes_for_offices.yaml ``` folder add bellow code first
```sh
web_app_create:
  path: /create
  methods: ['GET','POST']
  controller: App\Controller\OfficesController::create
```

* Before start with controller we are going to add a bundle ```form``` for easy to handle symfony form\
```sh
composer require form
```

* Add Bellow code with your controller
```sh
use App\Entity\Offices;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
``` 
* Now inside ``` OfficesController.php ``` controller create another function called ```create``` and paste the bellow code
```sh
    $pageTitle = "Create Page";

    $offices = new Offices();

    $form = $this->createFormBuilder($offices)
            ->add('office_name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('office_description', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('office_save', SubmitType::class, array('label' => 'Submit', 'attr' => array('class'=>'btn btn-primary mt-3')))
            ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid())
    {
        $offices = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($offices);
        $entityManager->flush();

        return $this->redirectToRoute('web_app_index');
    }

    return $this->render('Offices/create.html.twig', array(
        'title' => $pageTitle,
        'form' => $form->createView()
    ));
```

* Now create ```create.html.twig``` and paste the bellow code
```sh
{% extends 'base.html.twig' %}

{% block title %} {{ title }} {% endblock %}

{% block body %}

    <div class="container">
        
        <div class="row">
            
            <div class="col-sm-12">
                
                {{ form_start(form) }}

                {{ form_widget(form) }}

                {{ form_end(form) }}
                
            </div>
            
        </div>
        
    </div>

{% endblock %}
```

* lets show individual office details by clicking ```show``` button. For this create a view file called ```show.html.twig``` and paste the bellow code
```sh
{% extends 'base.html.twig' %}

{% block title %} {{ title }} {% endblock %}

{% block body %}

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ offices.officeName }}</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p>{{ offices.officeDescription }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{% endblock %}
```

* To call this page add a route  ``` routes_for_offices.yaml ``` by adding the bellow code
```sh
web_app_show:
  path: /{id}
  methods: GET
  controller: App\Controller\OfficesController::show
```

* Lets create a function ```show``` and pass two parameter called ```$id``` and ```SerializerInterface $serializer``` inside ```OfficesController.php``` controller and add the bellow code. Here second parameter is not mendatory, This is a complex topic but I am using it to avoid unexpected null value error. To use this you have to run ```composer require symfony/serializer``` command and have to use ```use Symfony\Component\Serializer\SerializerInterface;``` in your controller.

```sh
    $pageTitle = "Show Page";

    $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

    return $this->render('Offices/show.html.twig', [
        'title' => $pageTitle,
        'offices' => $offices,
    ]);
```

* Now we'll work for delete section. To call delete route we are going to add a route into ``` routes_for_offices.yaml ``` file
```sh
web_app_delete:
  path: /delete/{id}
  methods: DELETE
  controller: App\Controller\OfficesController::delete
```

* We are adding some js stuff for alert us before delete. For that we are going to create a folder called ```js``` inside ```public``` folder and create a js file called ```main-js.js```

* Now we add this js file's reference into our ```base.htnl.twig``` file. For that open the file and add bellow code there
```sh
.
.
      {% block javascripts %} {% endblock %}
    
    </body>

</html>
```

* Add another js file's reference into our ```index.htnl.twig``` file. For that open the file and add bellow code there
```sh
.
.
{% block javascripts %}
  <script type="text/javascript" src="/js/main-js.js"></script>
{% endblock %}
```

* Now add some javascript into ```public/js/main-js.js``` file
```sh
const offices = document.getElementById('offices');

if (offices) {
  
  offices.addEventListener('click', (e) => {
    
    if (e.target.className === 'btn btn-danger delete-office') {

      if (confirm('Are you Sure?')) {

        const id = e.target.getAttribute('data-id');

        fetch(`/web/offices/delete/${id}`, {

          method: 'DELETE'

        }).then(res => window.location.reload());

      }

    }

  });
}
```

* Lets do some controlling stuff for delete method. Create a ```delete``` function into ```OfficeController.php``` with parameter $id
```sh
    $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($offices);
    $entityManager->flush();

    $response = new Response();
    $response->send();
```

* Now we are going to edit our newly created office information. For that at first we'll create a route in ``` routes_for_offices.yaml ``` file
```sh
web_app_edit:
  path: /edit/{id}
  methods: ['GET','POST']
  controller: App\Controller\OfficesController::edit
```

* For edit something we need a view file where our current content will display. So, for that we are going to create a view file called ```edit.html.twig``` into ```templates/Offices``` folder
```sh
{% extends 'base.html.twig' %}

{% block title %} {{ title }} {% endblock %}

{% block body %}

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                {{ form_start(form) }}

                {{ form_widget(form) }}

                {{ form_end(form) }}

            </div>

        </div>

    </div>

{% endblock %}
``` 

* Now come up it's controlling stuff. for that we take two parameter into a function called ```edit``` into ```OfficesController.php```. One parameter is ```$id``` and another one is ```Request $request```.
```sh
    $pageTitle = "Edit Page";

    $offices = $this->getDoctrine()->getRepository(Offices::class)->find($id);

    $form = $this->createFormBuilder($offices)
        ->add('office_name', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('office_description', TextareaType::class, array('attr' => array('class' => 'form-control')))
        ->add('office_save', SubmitType::class, array('label' => 'Update', 'attr' => array('class'=>'btn btn-primary mt-3')))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid())
    {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('web_app_index');
    }

    return $this->render('Offices/edit.html.twig', array(
        'title' => $pageTitle,
        'form' => $form->createView()
    ));
```

# NOW THIS IS YOUR TURN TO POPULATE DATA DO FUN STUFF WITH ```OfficeEmployeesController.php```

# Developed By

* [Md. Noor-A-Alam Siddique](https://kisorniru.github.io/)
