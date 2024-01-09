<?php

// return  [
//     "/" => "controllers/index.php",
//     "/about" => "controllers/about.php",
//     "/notes" => "controllers/notes/index.php",
//     "/note" => "controllers/notes/show.php",
//     "/note/create" => 'controllers/notes/create.php',
//     "/contact" => "controllers/contact.php",
// ];

// main pages

$router->get("/", "/index.php");
$router->get("/about", "/about.php");
$router->get("/contact", "/contact.php");

// show

$router->get("/notes", "/notes/index.php")->only("auth");
$router->get("/note", "/notes/show.php");
$router->get("/note/edit", "/notes/edit.php");
$router->patch("/note", "/notes/update.php");

// CRUD notes

$router->delete("/note", "/notes/destroy.php");
$router->get("/note/create", "/notes/create.php");
$router->post("/notes", "/notes/store.php");

// user register

$router->get("/register", "/registration/create.php")->only("guest");
$router->post("/register", "/registration/store.php");


// user login and logout

$router->get("/login", "/session/create.php")->only("guest");

$router->post("/session", "/session/store.php")->only("guest");

$router->delete("/session", "/session/destroy.php")->only("auth");








// $router->delete("/note", "controllers/notes/destroy.php");
