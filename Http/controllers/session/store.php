<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST["email"];

$password = $_POST["password"];



// Validate submitted form-----------------------------

$form = new LoginForm();

if($form->validate($email, $password)) {

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {

        redirect("/");

    } else {

        $form->errorMsg("email", "Wrong email or password.");

    }

};

Session::flash("errors", $form->error());
Session::flash("old", [
    "email" => $_POST["email"],
]);


return redirect("/login");

    // return view("session/create.view.php", [
    //     "errors" => $form->error(),
    // ]);