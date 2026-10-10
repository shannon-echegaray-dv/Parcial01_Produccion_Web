<?php
$pageTitle = $pageTitle ?? APP_NAME;
$activePage = $activePage ?? '';
?>
<!doctype html>
<html lang="es-AR" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?> | <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= url('assets/css/output.css') ?>">
</head>
<body class="min-h-full bg-white font-sans text-gray-900 antialiased">
<a class="absolute left-4 top-0 z-50 -translate-y-full rounded-lg border-2 border-green-700 bg-white px-4 py-2 text-green-800 focus:translate-y-3" href="#contenido">Saltar al contenido</a>
<header class="relative border-b border-gray-100 bg-white">
    <div class="mx-auto flex min-h-20 w-full max-w-6xl items-center justify-between gap-8 px-6 max-sm:gap-3 max-sm:py-3">
        <a class="whitespace-nowrap font-sans text-lg font-semibold text-gray-800" href="<?= url('index.php') ?>">
            <span>city <strong class="font-extrabold text-green-700">farmac</strong></span>
        </a>
        <nav id="main-menu" class="ml-auto hidden items-center gap-9 text-sm font-semibold text-gray-600 sm:flex max-sm:absolute max-sm:left-0 max-sm:right-0 max-sm:top-full max-sm:z-40 max-sm:flex-col max-sm:items-stretch max-sm:gap-1 max-sm:border-t max-sm:border-gray-100 max-sm:bg-white max-sm:px-6 max-sm:py-3 max-sm:shadow-lg">
            <a class="block w-full px-3 py-2 hover:bg-green-50 hover:text-green-800 sm:w-auto sm:px-2 sm:py-1 <?= $activePage === 'home' ? 'border-b-2 border-green-700 text-green-800' : '' ?>" href="<?= url('index.php') ?>">Inicio</a>
            <a class="block w-full px-3 py-2 hover:bg-green-50 hover:text-green-800 sm:w-auto sm:px-2 sm:py-1 <?= $activePage === 'products' ? 'border-b-2 border-green-700 text-green-800' : '' ?>" href="<?= url('productos.php') ?>">Productos</a>
            <a class="block w-full px-3 py-2 hover:bg-green-50 hover:text-green-800 sm:w-auto sm:px-2 sm:py-1 <?= $activePage === 'contact' ? 'border-b-2 border-green-700 text-green-800' : '' ?>" href="<?= url('contactanos.php') ?>">Contactanos</a>
        </nav>
        <a class="rounded-lg border border-green-200 text-xs font-bold text-green-800 hover:bg-green-50 max-sm:ml-auto p-2" href="<?= url('inicio-sesion.php') ?>">Ingresar</a>
        <button class="rounded-lg p-2 text-gray-700 hover:bg-gray-100 sm:hidden" type="button" onclick="document.getElementById('main-menu').classList.toggle('hidden');">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>
<main id="contenido">


