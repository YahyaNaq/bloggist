<?php

use Core\Database;

$heading = 'Recent Blogs';
$bgimg='assets/img/home-bg.jpg';

$config = require base_path('config.php');
$db = new Database($config['database']);

$offset = 1;

$posts=$db->query(
    "SELECT posts.*, images.filename, users.full_name from posts
    inner join users on posts.author_id=users.id
    inner join images on posts.image_id=images.id
    ORDER BY posted_on DESC LIMIT 2"
    )->findAll();

require view('index.view.php');