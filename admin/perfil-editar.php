<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/profiles.php';

$profiles = allProfiles();
$profileSections = profileSectionNames();
$profileName = (string) ($_GET['nombre'] ?? '');
$formProfile = ['name' => '', 'sections' => []];
$isEditingProfile = false;

foreach ($profiles as $profile) {
    if ($profile['name'] === $profileName) {
        $formProfile = $profile;
        $isEditingProfile = true;
        break;
    }
}

$pageTitle = $isEditingProfile ? 'Modificar perfil' : 'Nuevo perfil';
$activeAdminPage = 'profiles';
require __DIR__ . '/../views/admin-profile-form.php';
