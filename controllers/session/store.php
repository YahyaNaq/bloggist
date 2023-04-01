<?php

use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors=[];

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

if (! empty($errors)) {
    return require view('session\create.view.php');
}

$config= require base_path('config.php');
$db = new Database($config['database']);

// Check if the user exist
$user = $db->query("SELECT * from users where email=:email", [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
            'id' => $user['id']
        ]);
        header("location: /");
        exit();
    }
}

$errors['no_user_found'] = "Email or password is incorrect";

return require view('session\create.view.php');



