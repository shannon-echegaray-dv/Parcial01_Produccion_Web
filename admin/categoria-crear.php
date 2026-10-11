<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/categories.php';

$categoryTree = productCategoryTree();
$categoryParentContext = (string) ($_GET['categoria_padre'] ?? '');
if (!array_key_exists($categoryParentContext, $categoryTree)) {
    $categoryParentContext = '';
}
$formCategory = '';
$formParentCategory = $categoryParentContext;
$isEditingCategory = false;

$pageTitle = 'Nueva categoría';
$activeAdminPage = 'categories';
require __DIR__ . '/../views/admin-category-form.php';
