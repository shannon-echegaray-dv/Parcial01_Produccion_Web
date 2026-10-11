<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6">
        <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/categorias.php' . ($categoryParentContext !== '' ? '?' . http_build_query(['padre' => $categoryParentContext]) : '')) ?>">Volver al listado de categorías</a>
        <h1 class="mt-3 font-sans text-3xl font-bold text-gray-900"><?= $isEditingCategory ? 'Modificar categoría' : 'Nueva categoría' ?></h1>
        <p class="mt-3 text-gray-600">Completá los datos de la categoría.</p>
    </div>

    <section class="max-w-2xl rounded-xl border border-gray-200 bg-white p-5 sm:p-6">
        <form class="space-y-5" method="post">
            <input type="hidden" name="id" value="<?= $formCategoryId ?>">
            <input type="hidden" name="padre" value="<?= $formParentCategory ?>">
            <label class="block text-sm font-semibold text-gray-700">
                Nombre
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" value="<?= $formCategory ?>" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Categoría padre
                <select disabled class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800 disabled:bg-gray-100 disabled:text-gray-500" name="padre">
                    <option value="">Categoría principal</option>
                    <?php foreach ($categoryTree as $category => $subcategories): ?>
                        <option value="<?= $category ?>" <?= $formParentCategory === $category ? 'selected' : '' ?>><?= $category ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <div class="flex flex-wrap items-center gap-3">
                <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit"><?= $isEditingCategory ? 'Guardar cambios' : 'Guardar categoría' ?></button>
                <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/categorias.php' . ($categoryParentContext !== '' ? '?' . http_build_query(['padre' => $categoryParentContext]) : '')) ?>">Cancelar</a>
            </div>
        </form>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
