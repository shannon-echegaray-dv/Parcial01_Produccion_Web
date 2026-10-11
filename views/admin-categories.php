<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <?php if ($isViewingSubcategories): ?>
                <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/categorias.php') ?>">Volver a categorías</a>
                <h1 class="mt-3 font-sans text-3xl font-bold text-gray-900">Categorías <?php empty($parentCategory) ? 'Principales' : 'Subcategorías de ' . $parentCategory ?></h1>
            <?php else: ?>
                <h1 class="font-sans text-3xl font-bold text-gray-900">Categorías</h1>
                <p class="mt-3 text-gray-600">Consultá las categorías principales y sus subcategorías.</p>
            <?php endif; ?>
        </div>
        <a class="inline-flex items-center gap-2 rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" href="<?= url('admin/categoria-crear.php' . ($parentCategory !== '' ? '?' . http_build_query(['categoria_padre' => $parentCategory]) : '')) ?>">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14" />
            </svg>
            Nueva categoría
        </a>
    </div>

    <section class="rounded-xl border border-gray-200 bg-white">
        <form id="admin-filter-form" class="flex flex-wrap items-end gap-3 border-b border-gray-200 px-5 py-4 sm:px-6" method="get">
            <label class="block text-sm font-semibold text-gray-700">
                Filtrar por categoría
                <select class="mt-2 block min-w-64 rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="padre">
                    <option value="">Todas las categorías principales</option>
                    <?php foreach ($categoryTree as $category => $subcategories): ?>
                        <option value="<?= $category ?>" <?= $parentCategory === $category ? 'selected' : '' ?>><?= $category ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </form>
        <div class="flex items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 sm:px-6">
            <h2 class="font-sans text-lg font-bold text-gray-900">Listado de categorías</h2>
            <p class="text-sm text-gray-500"><?= count($categoryRows) ?> categorías</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[48rem] text-left text-sm">
                <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Categoría padre</th>
                        <th class="px-4 py-3">Productos</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($categoryRows as $category): ?>
                        <tr>
                            <td class="px-4 py-4 font-semibold text-gray-900"><?= $category['name'] ?></td>
                            <td class="px-4 py-4 text-gray-700"><?= $category['parent'] !== '' ? $category['parent'] : '—' ?></td>
                            <td class="px-4 py-4 text-gray-700"><?= $category['productCount'] ?></td>
                            <td class="px-4 py-4"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-800">Activa</span></td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <a class="inline-flex items-center rounded-lg border border-gray-200 p-2 text-gray-700 hover:bg-gray-50" href="<?= url('admin/categoria-editar.php?' . http_build_query(['nombre' => $category['name'], 'padre' => $category['parent'], 'categoria_padre' => $parentCategory !== '' ? $parentCategory : null])) ?>" title="Modificar categoría">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487a2.1 2.1 0 0 1 2.97 2.97L8.25 19.036 4.5 19.5l.464-3.75L16.862 4.487Z" />
                                        </svg>
                                    </a>
                                    <button class="inline-flex items-center rounded-lg border border-gray-200 p-2 text-gray-700 hover:bg-gray-50" type="button" title="Inactivar categoría">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                            <circle cx="12" cy="12" r="9" />
                                            <path stroke-linecap="round" d="M9 12h6" />
                                        </svg>
                                    </button>
                                    <?php if ($category['isParent']): ?>
                                        <a class="inline-flex items-center rounded-lg border border-gray-200 p-2 text-gray-700 hover:bg-gray-50" href="<?= url('admin/categorias.php?' . http_build_query(['padre' => $category['name']])) ?>" title="Ver subcategorías">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75h15m-15 5.25h10.5m-10.5 5.25h6" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($categoryRows === []): ?>
                        <tr><td class="px-4 py-10 text-center text-gray-600" colspan="5">No hay subcategorías para mostrar</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
