<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'user_name' => $_POST['user_name'] ?? '',
    'password' => $_POST['password'] ?? ''
]);

$signedIn = (new Authenticator)->attempt(... $attributes);

echo json_encode($signedIn);
die;
