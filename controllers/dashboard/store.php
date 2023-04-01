<?php

use Core\Validator;
use Core\Database;

$heading="Add a new blog";
$base_uri = "/" . explode("/", $uri)[1];

$title=$_POST['title'];
$body=$_POST['body'];
$image=$_FILES['image'];

$config = require base_path('config.php');
$db = new Database($config['database']);

//Validate inputs
$errors= [];

// Validate image
// Check if the user even provided an image
if ($image['name']) {
    $img_info = getimagesize($image['tmp_name']);
    $img_type = $img_info[2];

    if (! Validator::image($img_type, [ IMAGETYPE_JPEG, IMAGETYPE_PNG ])) {
        $img_type_str = image_type_to_extension($img_type, false);
        $errors['image']="$img_type_str is not allowed";
    
    } elseif (! Validator::int($image['size'], 10, 10485760)) { // 10MBs = 10485760 bytes
        $errors['image']="Max allowed size for a blog cover is 10MBs";
    }
} else {
    $errors['image']="Please provide an image";
}

// Validate title
if (! Validator::string($title, 10, 150)) {
    $errors['title']="A blog title must be min 10 and max 150 characters";

} else {
    $titleCheck = $db->query('SELECT title FROM posts WHERE title=:title', [
        'title' => $title
    ])->find();
        
    if ($titleCheck) {
        $errors['title']="A blog with this title already exists";
    }
}

// Validate body
if (! Validator::string($body, 250, 10000)) {
    $errors['body']="A blog post must be min 250 and max 10000 characters";
}

if (! empty($errors)) {
    return require view('dashboard/create.view.php');
}

//save to assets folder
move_uploaded_file($image['tmp_name'], "assets/img/" . $image['name']);

//insert into the database
$db->query('INSERT INTO images (filename) VALUES (:filename)', [
    'filename' => $image['name']
]);
// dd($image['name']);
$image_id = $db->query("SELECT id from images where filename=:filename", [
    'filename' => $image['name']
])->find();

$db->query(
    'INSERT into posts (title, body, author_id, likes, comments, image_id)
    VALUES (:title, :body, :author_id, 0, 0, :image_id)', [
        'title' => $title,
        'body' => $body,
        'author_id' => $_SESSION['user']['id'],
        'image_id' => $image_id['id']
]);

    
header('location: /dashboard');
exit();
