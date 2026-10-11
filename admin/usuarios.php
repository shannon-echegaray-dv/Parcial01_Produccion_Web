<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/users.php';

$userRows = allUsers();

$pageTitle = 'Usuarios';
$activeAdminPage = 'users';
require __DIR__ . '/../views/admin-users.php';
