<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <h1 class="font-sans text-3xl font-bold text-gray-900">Productos</h1>
            <p class="mt-3 text-gray-600">Consultá el catálogo y los datos de cada producto.</p>
        </div>
        <a class="inline-flex items-center gap-2 rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" href="<?= url('admin/producto-crear.php') ?>">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
            </svg>
            Nuevo producto
        </a>
    </div>

    <section class="rounded-xl border border-gray-200 bg-white">
        <form id="admin-filter-form" class="flex flex-wrap items-end gap-4 border-b border-gray-200 px-5 py-4 sm:px-6" action="<?= url('admin/productos.php') ?>" method="get">
            <label class="block min-w-64 flex-1 text-sm font-semibold text-gray-700">
                Categoría
                <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="categoria" id="category-select">
                    <option value="">Todas las categorías</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category ?>" <?= $selectedCategory === $category ? 'selected' : '' ?>><?= $category ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="block min-w-64 flex-1 text-sm font-semibold text-gray-700">
                Subcategoría
                <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="subcategoria" id="subcategory-select" <?= $selectedCategory === '' ? 'disabled' : '' ?>>
                    <option value="">Todas las subcategorías</option>
                    <?php foreach ($categoryTree as $category => $categoryChildren): ?>
                        <?php foreach ($categoryChildren as $subcategory => $productIds): ?>
                            <option value="<?= $subcategory ?>" data-parent-category="<?= $category ?>" <?= $selectedSubcategory === $subcategory ? 'selected' : '' ?>><?= $subcategory ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </label>
        </form>
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 sm:px-6">
            <h2 class="font-sans text-lg font-bold text-gray-900">Listado de productos</h2>
            <p class="text-sm text-gray-500"><?= count($filteredProducts) ?> productos</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[64rem] text-left text-sm">
                <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Categoría</th>
                        <th class="px-4 py-3">Marca</th>
                        <th class="px-4 py-3">Precio</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($filteredProducts as $product): ?>
                        <tr>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <img class="h-12 w-12 rounded-lg border border-gray-100 bg-white object-contain p-1" src="<?= url($product['image']) ?>" alt="<?= $product['name'] ?>">
                                    <div class="max-w-sm">
                                        <p class="font-semibold text-gray-900"><?= $product['name'] ?></p>
                                        <p class="mt-1 text-xs text-gray-500">Modelo: <?= $product['model'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-gray-700"><?= $product['category'] ?></td>
                            <td class="px-4 py-4 text-gray-700"><?= $product['brand'] ?></td>
                            <td class="px-4 py-4 font-semibold text-gray-900">$<?= number_format((float) $product['price'], 0, ',', '.') ?></td>
                            <td class="px-4 py-4"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-800">Activo</span></td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <a class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50" href="<?= url('admin/producto-editar.php?' . http_build_query(['id' => $product['id']])) ?>" title="Editar producto">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.1 2.1 0 0 1 2.97 2.97L8.25 19.036 4.5 19.5l.464-3.75L16.862 4.487Z" />
                                        </svg>
                                    </a>
                                    <button class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50" type="button" title="Desactivar producto">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <circle cx="12" cy="12" r="9" />
                                            <path stroke-linecap="round" d="M9 12h6" />
                                        </svg>
                                    </button>
                                    <a class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50" href="<?= url('admin/comentarios.php?' . http_build_query(['producto' => $product['id']])) ?>" title="Ver comentarios del producto">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3.75h6m-9.75 8.25 3.75-3h9a3 3 0 0 0 3-3v-7.5a3 3 0 0 0-3-3h-9a3 3 0 0 0-3 3v7.5c0 1.1.6 2.1 1.5 2.7l-1.25 3.3Z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($filteredProducts === []): ?>
                        <tr><td class="px-4 py-10 text-center text-gray-600" colspan="6">No hay productos para mostrar</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
