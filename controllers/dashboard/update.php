<?php

use Core\Validator;
use Core\Database;

$heading="Edit a blog";
$base_uri = "/" . explode("/", $uri)[1];

$id = $_POST['id'];
$title=$_POST['title'];
$body=$_POST['body'];
$image=$_FILES['image'];
$img_name=$image['name'];
$img_path="/assets/img/" . $img_name;

$config = require base_path('config.php');
$db = new Database($config['database']);

//Validate inputs
$errors= [];

// Validate image
// Check if the user even provided an image
if ($img_name) {
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
    $titleCheck = $db->query('SELECT title FROM posts WHERE title=:title and id!=:id', [
        'id' => $id,
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
    return require view('dashboard/edit.view.php');
}

$old_post = $db->query("SELECT title, body from posts where id=:id", [
    'id' => $id
])->find();

$updated_fields=[];
foreach ($old_post as $key => $val) {
    if ($_POST[$key]!=$val) $updated_fields[]="$key=" . $_POST[$key];
}

// dd($updated_fields);

//save to assets/img folder
move_uploaded_file($image['tmp_name'], "assets/img/" . $img_name);

//insert into the database
$db->query('INSERT INTO images (filename) VALUES (:filename)', [
    'filename' => $img_name
]);

$image_id = $db->query("SELECT id from images where filename=:filename", [
    'filename' => $img_name
])->find();

$db->query(
    'UPDATE posts SET ' . implode(', ', $updated_fields) . ' WHERE id=:id', [
]);

    
header('location: /dashboard');
exit();
