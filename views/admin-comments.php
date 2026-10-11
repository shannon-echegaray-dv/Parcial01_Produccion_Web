<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6">
        <h1 class="font-sans text-3xl font-bold text-gray-900">Comentarios</h1>
        <p class="mt-3 text-gray-600">Administrá los comentarios de los productos.</p>
    </div>

    <section class="rounded-xl border border-gray-200 bg-white">
        <form id="admin-filter-form" class="flex flex-wrap items-end gap-3 border-b border-gray-200 px-5 py-4 sm:px-6" method="get">
            <label class="block text-sm font-semibold text-gray-700">
                Filtrar por producto
                <select class="mt-2 block min-w-64 rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="producto">
                    <option value="" <?= $selectedProductId === '' ? 'selected' : '' ?>>Todos los productos</option>
                    <?php foreach ($allProducts as $product): ?>
                        <option value="<?= $product['id'] ?>" <?= $selectedProductId === (string) $product['id'] ? 'selected' : '' ?>><?= $product['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Filtrar por estado
                <select class="mt-2 block min-w-64 rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="estado">
                    <option value="" <?= $selectedStatus === '' ? 'selected' : '' ?>>Todos los estados</option>
                    <option value="activos" <?= $selectedStatus === 'activos' ? 'selected' : '' ?>>Activos</option>
                    <option value="inactivos" <?= $selectedStatus === 'inactivos' ? 'selected' : '' ?>>Inactivos</option>
                </select>
            </label>
        </form>

        <div class="flex items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 sm:px-6">
            <h2 class="font-sans text-lg font-bold text-gray-900">Listado de comentarios</h2>
            <p class="text-sm text-gray-500"><?= count($commentRows) ?> comentarios</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[60rem] text-left text-sm">
                <thead class="bg-gray-50 text-xs font-bold uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Comentario</th>
                        <th class="px-4 py-3">Ranking</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Producto</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($commentRows as $comment): ?>
                        <tr>
                            <td class="max-w-md px-4 py-4">
                                <p class="font-semibold text-gray-900"><?= $comment['author'] ?></p>
                                <p class="mt-1 whitespace-normal text-gray-600"><?= $comment['comment'] ?></p>
                            </td>
                            <td class="px-4 py-4 font-semibold text-gray-700"><?= $comment['rating'] ?> / 5</td>
                            <td class="px-4 py-4 whitespace-nowrap text-gray-700"><?= date('d/m/Y', strtotime($comment['date'])) ?></td>
                            <td class="max-w-xs px-4 py-4 whitespace-normal text-gray-700"><?= $comment['productName'] ?></td>
                            <td class="px-4 py-4"><span class="rounded-full <?= $comment['approved'] ? 'bg-green-50 text-green-800' : 'bg-gray-100 text-gray-700' ?> px-3 py-1 text-xs font-semibold"><?= $comment['approved'] ? 'Activo' : 'Inactivo' ?></span></td>
                            <td class="px-4 py-4">
                                <button class="inline-flex items-center gap-2 rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50" type="button" title="<?= $comment['approved'] ? 'Desaprobar comentario' : 'Aprobar comentario' ?>">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <?php if ($comment['approved']): ?>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12M18 6 6 18" />
                                        <?php else: ?>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                                        <?php endif; ?>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($commentRows === []): ?>
                        <tr><td class="px-4 py-10 text-center text-gray-600" colspan="6">No hay comentarios para mostrar.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
