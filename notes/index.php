<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$heading = "My Notes";

$notes = $db->query("select * from notes where user_id = 1")->findAll();


view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes" => $notes,
]);
