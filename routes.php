<?php

$router->get('/','controllers\index.php');

$router->get('/about','controllers\about.php');

$router->get('/contact','controllers\contact\create.php');
$router->post('/contact','controllers\contact\store.php');

$router->get('/register','controllers\registration\create.php')->only('guest');
$router->post('/register','controllers\registration\store.php')->only('guest');

$router->get('/login','controllers\session\create.php')->only('guest');
$router->post('/session','controllers\session\store.php')->only('guest');
$router->delete('/session','controllers\session\destroy.php')->only('auth');

$router->get('/post','controllers\post.php');

$router->get('/dashboard','controllers\dashboard\index.php')->only('auth');

$router->get('/dashboard/add-a-new-blog','controllers\dashboard\create.php')->only('auth');
$router->post('/dashboard/add-a-new-blog','controllers\dashboard\store.php')->only('auth');

$router->get('/dashboard/edit-a-blog','controllers\dashboard\edit.php')->only('auth');
$router->patch('/dashboard/edit-a-blog','controllers\dashboard\update.php')->only('auth');

$router->get('/dashboard/delete-a-blog','controllers\dashboard\delete.php')->only('auth');
$router->delete('/dashboard/delete-a-blog','controllers\dashboard\destroy.php')->only('auth');

$router->get('/dashboard/analytics','controllers\dashboard\analytics.php')->only('auth');