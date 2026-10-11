<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/categories.php';

$categoryTree = productCategoryTree();
$parentCategory = (string) ($_GET['padre'] ?? '');
if (!array_key_exists($parentCategory, $categoryTree)) {
    $parentCategory = '';
}
$isViewingSubcategories = $parentCategory !== '';
$categoryParentContext = $parentCategory;
$categoryRows = [];

if ($isViewingSubcategories) {
    foreach ($categoryTree[$parentCategory] as $subcategory => $productIds) {
        $categoryRows[] = [
            'name' => $subcategory,
            'parent' => $parentCategory,
            'productCount' => count($productIds),
            'isParent' => false,
        ];
    }
} else {
    foreach ($categoryTree as $category => $children) {
        $productCount = 0;
        foreach ($children as $childProductIds) {
            $productCount += count($childProductIds);
        }
        $categoryRows[] = [
            'name' => $category,
            'parent' => '',
            'productCount' => $productCount,
            'isParent' => true,
        ];
    }
}

$pageTitle = 'Categorías';
$activeAdminPage = 'categories';
require __DIR__ . '/../views/admin-categories.php';
