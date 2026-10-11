<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/brands.php';

$brands = allBrands();
$brandName = (string) ($_GET['nombre'] ?? '');
$isEditingBrand = in_array($brandName, $brands, true);
if (!$isEditingBrand) {
    $brandName = '';
}

$pageTitle = $isEditingBrand ? 'Modificar marca' : 'Nueva marca';
$activeAdminPage = 'brands';
require __DIR__ . '/../views/admin-brand-form.php';
