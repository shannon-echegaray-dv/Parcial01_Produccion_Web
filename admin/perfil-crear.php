<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/profiles.php';

$profileSections = profileSectionNames();
$formProfile = ['name' => '', 'sections' => []];
$isEditingProfile = false;

$pageTitle = 'Nuevo perfil';
$activeAdminPage = 'profiles';
require __DIR__ . '/../views/admin-profile-form.php';
