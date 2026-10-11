<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/categories.php';

$categoryTree = productCategoryTree();
$categoryName = (string) ($_GET['nombre'] ?? '');

$parentCategory = (string) ($_GET['padre'] ?? '');

$categoryParentContext = $parentCategory;
if (isset($_GET['categoria_padre'])) {
    $queryParentCategory = (string) $_GET['categoria_padre'];
    if (array_key_exists($queryParentCategory, $categoryTree)) {
        $categoryParentContext = $queryParentCategory;
    }
}
$isEditingCategory = false;
$formCategory = '';
$formParentCategory = '';

if ($parentCategory !== '' && isset($categoryTree[$parentCategory][$categoryName])) {
    $isEditingCategory = true;
    $formCategory = $categoryName;
    $formParentCategory = $parentCategory;
} elseif ($parentCategory === '' && isset($categoryTree[$categoryName])) {
    $isEditingCategory = true;
    $formCategory = $categoryName;
}

$pageTitle = $isEditingCategory ? 'Modificar categoría' : 'Nueva categoría';
$activeAdminPage = 'categories';
require __DIR__ . '/../views/admin-category-form.php';
