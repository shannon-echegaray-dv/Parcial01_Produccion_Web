<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/products.php';
require_once __DIR__ . '/../model/categories.php';
require_once __DIR__ . '/../model/brands.php';

$productId = (int) ($_GET['id'] ?? 0);
$formProduct = findProductById($productId);
$isEditingProduct = $formProduct !== null;

if ($formProduct === null) {
    $formProduct = [
        'id' => '',
        'name' => '',
        'description' => '',
        'price' => '',
        'category' => '',
        'brand' => '',
        'model' => '',
    ];
}

$categoryTree = productCategoryTree();
$productCategory = findProductCategory((int) $formProduct['id']);
$formCategory = $productCategory['category'];
$formSubcategory = $productCategory['subcategory'];
$brands = allBrands();

$pageTitle = $isEditingProduct ? 'Modificar producto' : 'Nuevo producto';
$activeAdminPage = 'products';
require __DIR__ . '/../views/admin-product-form.php';
