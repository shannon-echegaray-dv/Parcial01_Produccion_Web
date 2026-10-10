<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/model/products.php';
require_once __DIR__ . '/model/comments.php';

$productId = (int) ($_GET['id'] ?? 0);
$product = findProductById($productId);
$comments = $product !== null ? approvedComments($product['id']) : [];
$averageRating = $product['rating'] ?? null;

$pageTitle = $product['name'] ?? 'Producto no encontrado';
$activePage = 'products';
require __DIR__ . '/views/product-detail.php';
