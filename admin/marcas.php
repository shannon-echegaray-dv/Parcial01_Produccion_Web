<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/brands.php';

$brands = allBrands();

$pageTitle = 'Marcas';
$activeAdminPage = 'brands';
require __DIR__ . '/../views/admin-brands.php';
