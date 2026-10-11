<?php
$pageTitle = $pageTitle ?? 'Panel';
$activeAdminPage = $activeAdminPage ?? '';
$adminSections = [
    'home' => ['Inicio', 'admin/inicio.php'],
    'products' => ['Productos', 'admin/productos.php'],
    'categories' => ['Categorías', 'admin/categorias.php'],
    'brands' => ['Marcas', 'admin/marcas.php'],
    'comments' => ['Comentarios', 'admin/comentarios.php'],
    'users' => ['Usuarios', 'admin/usuarios.php'],
    'profiles' => ['Perfiles', 'admin/perfiles.php'],
];
?>
<!doctype html>
<html lang="es-AR" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?> | <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= url('assets/css/output.css') ?>">
</head>
<body class="flex min-h-screen flex-col bg-gray-50 font-sans text-gray-900 antialiased">
<header class="border-b border-gray-200 bg-white">
    <div class="mx-auto flex w-full max-w-[100rem] items-center justify-between gap-6 px-6 py-4">
        <a class="font-sans text-lg font-semibold text-gray-800" href="<?= url('admin/inicio.php') ?>">city <strong class="font-extrabold text-green-700">farmac</strong> <span class="text-sm font-medium text-gray-500">Panel</span></a>
        <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('index.php') ?>">Ver sitio</a>
    </div>
</header>
<div class="mx-auto grid w-full max-w-[100rem] flex-1 gap-6 px-6 py-6 lg:grid-cols-4">
    <aside>
        <nav class="rounded-xl border border-gray-200 bg-white p-3">
            <p class="px-3 py-2 text-xs font-bold uppercase text-gray-500">Administración</p>
            <div class="space-y-1">
                <?php foreach ($adminSections as $sectionKey => [$sectionName, $sectionPath]): ?>
                    <a class="block rounded-lg px-3 py-2 text-sm font-semibold <?= $activeAdminPage === $sectionKey ? 'bg-green-50 text-green-800' : 'text-gray-700 hover:bg-gray-50' ?>" href="<?= url($sectionPath) ?>"><?= $sectionName ?></a>
                <?php endforeach; ?>
            </div>
        </nav>
    </aside>
    <main class="min-w-0 lg:col-span-3">
