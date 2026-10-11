<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/brands.php';

$brandName = '';
$isEditingBrand = false;

$pageTitle = 'Nueva marca';
$activeAdminPage = 'brands';
require __DIR__ . '/../views/admin-brand-form.php';
