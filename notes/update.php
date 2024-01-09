<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);


$id = $_POST["id"];

$currentUserId = 1;



$note = $db->query("select * from notes where id = :id", ["id" => $id])->findOrFail();


authorize($note["user_id"] == $currentUserId);

$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "A body is no more than 1,000  characters is required";
}

if (count($errors)) {
    return view("notes/edit.view.php", [
        "heading" => "Create Note",
        "errors" => $errors,
        "note" => $note,
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    "id" => $id,
    "body" => $_POST["body"],
]);

header("Location: /notes");

die();
