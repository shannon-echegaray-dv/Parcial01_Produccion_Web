<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/users.php';
require_once __DIR__ . '/../model/profiles.php';

$users = allUsers();
$profileOptions = profileNames();
$userId = (int) ($_GET['id'] ?? 0);
$formUser = ['id' => '', 'name' => '', 'email' => '', 'profile' => ''];
$isEditingUser = false;

foreach ($users as $user) {
    if ($user['id'] === $userId) {
        $formUser = $user;
        $isEditingUser = true;
        break;
    }
}

$pageTitle = $isEditingUser ? 'Modificar usuario' : 'Nuevo usuario';
$activeAdminPage = 'users';
require __DIR__ . '/../views/admin-user-form.php';
