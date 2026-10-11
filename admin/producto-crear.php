<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/products.php';
require_once __DIR__ . '/../model/categories.php';
require_once __DIR__ . '/../model/brands.php';

$formProduct = [
    'id' => '',
    'name' => '',
    'description' => '',
    'price' => '',
    'category' => '',
    'brand' => '',
    'model' => '',
];
$isEditingProduct = false;
$categoryTree = productCategoryTree();
$formCategory = '';
$formSubcategory = '';
$brands = allBrands();

$pageTitle = 'Nuevo producto';
$activeAdminPage = 'products';
require __DIR__ . '/../views/admin-product-form.php';
