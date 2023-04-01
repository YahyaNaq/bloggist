<?php

use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$post=$db->query(
    "SELECT * FROM posts 
    INNER JOIN users ON posts.author_id = users.id 
    INNER JOIN images ON posts.image_id = images.id
    WHERE posts.id=:id", [
        'id' => $_GET['id'] ?? ''
])->findOrFail();
        
$heading = $post['title'];
$bgimg='assets/img/'. $post['filename'];
        
require view('post.view.php');