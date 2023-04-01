<?php

use Core\Database;
use Core\Validator;


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$errors=[];

//Validate name
if (! Validator::string($name, 2, 50)) {
    $errors['name'] = "Please provide a name with min 2 and max 50 characters";
}

//Validate email
if (! Validator::string($email, 3, 255)) {
    $errors['email']['length'] = "Please provide an email with min 3 and max 255 characters";
}
elseif (! Validator::email($email)) {
    $errors['email']['invalid'] = "Please provide a valid email";
    // $errors=['email' => 'invalid'=> 'Please provide a valid email']
}

//Validate message
if (! Validator::string($message, 10, 1000)) {
    $errors['message'] = "Please provide a message with min 10 and max 1000 characters";
}

$heading = 'Contact Me';
$subheading = 'Have questions? I have answers.';
$bgimg='assets/img/contact-bg.jpg';

if (! empty($errors)) {
    return require view('contact\create.view.php');
}


$config= require base_path('config.php');
$db = new Database($config['database']);

$db->query("INSERT INTO contact (name, email, message) VALUES (:name, :email, :msg)", [
    'name' => $name,
    'email' => $email,
    'msg' => $message
]);

header('location: /');
exit();

