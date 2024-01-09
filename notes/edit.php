<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$id = $_GET["id"];

$currentUserId = 1;



$note = $db->query("select * from notes where id = :id", ["id" => $id])->findOrFail();

authorize($note["user_id"] == $currentUserId);

view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "errors" => [],
    "note" => $note,
]);
