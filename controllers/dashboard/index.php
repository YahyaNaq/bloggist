<?php

use Core\Database;

$heading = "Your Blogs";
$base_uri = "/" . explode("/", $uri)[1];

$config = require base_path('config.php');
$db = new Database($config['database']);

$posts=$db->query(
    "SELECT posts.*, images.filename img_name, users.full_name FROM posts
    INNER JOIN users ON posts.author_id=users.id
    inner join images ON posts.image_id=images.id
    WHERE author_id=:id ORDER BY posted_on DESC", [
    'id' => $_SESSION['user']['id']
])->findAll();

require view("dashboard\index.view.php");