<?php

use Core\Database;

$heading="Edit a blog";
$base_uri = "/" . explode("/", $uri)[1];

$config = require base_path("config.php");
$db = new Database($config['database']);

$post=$db->query("SELECT posts.id, title, body, filename FROM posts INNER JOIN images on posts.image_id=images.id where posts.id=:id", [
    'id' => $_GET['id']
])->findOrFail();

$id = $post['id'];
$title = $post['title'];
$body = $post['body'];
$img_path = "/assets/img/" . $post['filename'];
// dd($img_path);

require view('dashboard\edit.view.php');