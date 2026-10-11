<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../model/comments.php';
require_once __DIR__ . '/../model/products.php';

$allProducts = allProducts();
$selectedStatus = $_GET['estado'] ?? '';
if ($selectedStatus !== 'activos' && $selectedStatus !== 'inactivos') {
    $selectedStatus = '';
}
$selectedProductId = (string) ($_GET['producto'] ?? '');

$productIds = [];
foreach ($allProducts as $product) {
    $productIds[] = (string) $product['id'];
}
if (!in_array($selectedProductId, $productIds, true)) {
    $selectedProductId = '';
}

$commentRows = [];
foreach (allComments() as $comment) {
    if ($selectedStatus === 'activos' && !$comment['approved']) {
        continue;
    }

    if ($selectedStatus === 'inactivos' && $comment['approved']) {
        continue;
    }

    if ($selectedProductId !== '' && (string) $comment['productId'] !== $selectedProductId) {
        continue;
    }

    $comment['productName'] = 'Producto no disponible';
    foreach ($allProducts as $product) {
        if ($product['id'] === $comment['productId']) {
            $comment['productName'] = $product['name'];
            break;
        }
    }

    $commentRows[] = $comment;
}

$pageTitle = 'Comentarios';
$activeAdminPage = 'comments';
require __DIR__ . '/../views/admin-comments.php';
