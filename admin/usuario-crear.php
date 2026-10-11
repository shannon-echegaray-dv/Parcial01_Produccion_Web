<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/users.php';
require_once __DIR__ . '/../model/profiles.php';

$profileOptions = profileNames();
$formUser = ['id' => '', 'name' => '', 'email' => '', 'profile' => ''];
$isEditingUser = false;

$pageTitle = 'Nuevo usuario';
$activeAdminPage = 'users';
require __DIR__ . '/../views/admin-user-form.php';
