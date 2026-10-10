<?php
declare(strict_types=1);

require __DIR__ . '/config/app.php';
require __DIR__ . '/model/products.php';

$pageTitle = 'Inicio';
$activePage = 'home';
$products = featuredProducts();

require __DIR__ . '/views/home.php';
