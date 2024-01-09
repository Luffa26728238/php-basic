<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . "/../";


require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    //Core\Database
    $class = str_replace("\\", "/", $class);

    require base_path("{$class}.php");
});


require base_path("bootstrap.php");


$router = new \Core\Router();

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
// unset($_SESSION["_flash"]);

Session::unflash();

// class Person
// {
//     public $name;
//     public $age;

//     public function breath()
//     {
//         echo $this->name . " is breathing!";
//     }
// }

// $person = new Person();

// $person->name = "eric";

// $person->age = 23;

// $person->breath();