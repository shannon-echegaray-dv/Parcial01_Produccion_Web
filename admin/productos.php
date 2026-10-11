<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/products.php';
require_once __DIR__ . '/../model/categories.php';

$allProducts = allProducts();
$categoryTree = productCategoryTree();
$categories = array_keys($categoryTree);

$selectedCategory = (string) ($_GET['categoria'] ?? '');

$selectedSubcategory = (string) ($_GET['subcategoria'] ?? '');
if (!in_array($selectedCategory, $categories, true)) {
    $selectedCategory = '';
}
$availableSubcategories = [];
if ($selectedCategory !== '') {
    $availableSubcategories = $categoryTree[$selectedCategory];
}
if (!array_key_exists($selectedSubcategory, $availableSubcategories)) {
    $selectedSubcategory = '';
}

$categoryProductIds = [];
foreach ($availableSubcategories as $productIds) {
    foreach ($productIds as $productId) {
        $categoryProductIds[] = $productId;
    }
}

$subcategoryProductIds = [];
if ($selectedSubcategory !== '') {
    $subcategoryProductIds = $availableSubcategories[$selectedSubcategory];
}

$filteredProducts = [];
foreach ($allProducts as $product) {
    if ($selectedCategory !== '' && !in_array($product['id'], $categoryProductIds, true)) {
        continue;
    }

    if ($selectedSubcategory !== '' && !in_array($product['id'], $subcategoryProductIds, true)) {
        continue;
    }

    $filteredProducts[] = $product;
}

$pageTitle = 'Productos';
$activeAdminPage = 'products';
require __DIR__ . '/../views/admin-products.php';
