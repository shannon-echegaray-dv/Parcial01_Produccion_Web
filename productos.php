<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/model/products.php';
require_once __DIR__ . '/model/categories.php';

$allProducts = allProducts();
$categoryTree = productCategoryTree();
$categories = array_keys($categoryTree);
$brands = [];
foreach ($allProducts as $product) {
    if (!in_array($product['brand'], $brands, true)) {
        $brands[] = $product['brand'];
    }
}

$selectedCategory = (string) ($_GET['categoria'] ?? '');

$selectedSubcategory = (string) ($_GET['subcategoria'] ?? '');

$selectedBrand = (string) ($_GET['marca'] ?? '');

$selectedSort = (string) ($_GET['orden'] ?? 'destacados');

if (!isset($categoryTree[$selectedCategory])) {
    $selectedCategory = '';
}

if ($selectedCategory === '' || !isset($categoryTree[$selectedCategory][$selectedSubcategory])) {
    $selectedSubcategory = '';
}

if (!in_array($selectedBrand, $brands, true)) {
    $selectedBrand = '';
}
if (!in_array($selectedSort, ['destacados', 'ranking', 'nombre-asc', 'nombre-desc'], true)) {
    $selectedSort = 'destacados';
}

$categoryProductIds = [];
if ($selectedCategory !== '') {
    if ($selectedSubcategory !== '') {
        $categoryProductIds = $categoryTree[$selectedCategory][$selectedSubcategory];
    } else {
        foreach ($categoryTree[$selectedCategory] as $productIds) {
            foreach ($productIds as $productId) {
                $categoryProductIds[] = $productId;
            }
        }
    }
}

$filteredProducts = [];
foreach ($allProducts as $product) {
    if ($selectedCategory !== '' && !in_array($product['id'], $categoryProductIds, true)) {
        continue;
    }

    if ($selectedBrand !== '' && $product['brand'] !== $selectedBrand) {
        continue;
    }

    $filteredProducts[] = $product;
}

usort($filteredProducts, function (array $first, array $second) use ($selectedSort): int {
    if ($selectedSort === 'ranking') {
        if ($first['rating'] !== $second['rating']) {
            return $second['rating'] <=> $first['rating'];
        }

        return $first['id'] <=> $second['id'];
    }
    if ($selectedSort === 'nombre-asc') {
        return strcoll($first['name'], $second['name']);
    }
    if ($selectedSort === 'nombre-desc') {
        return strcoll($second['name'], $first['name']);
    }
    $firstFeatured = $first['id'] <= 6;
    $secondFeatured = $second['id'] <= 6;
    if ($firstFeatured !== $secondFeatured) {
        return $firstFeatured ? -1 : 1;
    }

    return $first['id'] <=> $second['id'];
});

$pageTitle = 'Productos';
$activePage = 'products';
require __DIR__ . '/views/products.php';
