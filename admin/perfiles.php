<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/profiles.php';

$profileRows = allProfiles();
$profileSections = profileSectionNames();

$pageTitle = 'Perfiles';
$activeAdminPage = 'profiles';
require __DIR__ . '/../views/admin-profiles.php';
