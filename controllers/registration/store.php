<?php

use Core\Database;
use Core\Validator;


$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors=[];

//Validate full name
if (! Validator::string($full_name, 2, 50)) {
    $errors['full_name'] = "Please provide a name with min 2 and max 50 characters";
}

//Validate username
if (! Validator::string($username, 5, 50)) {
    $errors['username'] = "Please provide a username with min 5 and max 50 characters";
}

//Validate email
if (! Validator::string($email, 3, 255)) {
    $errors['email']['length'] = "Please provide an email with min 3 and max 255 characters";
}
elseif (! Validator::email($email)) {
    $errors['email']['invalid'] = "Please provide a valid email";
    // $errors=['email' => 'invalid'=> 'Please provide a valid email']
}

//Validate password
if (! Validator::string($password, 8, 255)) {
    $errors['password'] = "Please provide a password with min 8 and max 255 characters";
}

$heading = 'Register for a new account';
$subheading = 'Write, Like and Share!';
$bgimg='assets/img/contact-bg.jpg';

if (! empty($errors)) {
    return require view('registration\create.view.php');
}


$config= require base_path('config.php');
$db = new Database($config['database']);

// Check if the user is already registered
$user = $db->query("SELECT id,email from users where email=:email", [
    'email' => $email
])->find();

if ($user) {
    header("location: /");
    exit();
}


$db->query("INSERT INTO users (email, full_name, username, password) VALUES (:email, :full_name, :username, :password)", [
    'full_name' => $full_name,
    'username' => $username,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

login([
    'email' => $email,
    'id' => $user['id']
]);

header('location: /');
die();



