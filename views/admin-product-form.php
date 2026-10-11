<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6">
        <h1 class="mt-3 font-sans text-3xl font-bold text-gray-900"><?= $isEditingProduct ? 'Modificar producto' : 'Nuevo producto' ?></h1>
        <p class="mt-3 text-gray-600">Completá los datos del producto.</p>
    </div>

    <section class="rounded-xl border border-gray-200 bg-white p-5 sm:p-6">
        <form class="grid gap-5 sm:grid-cols-2" method="post" enctype="multipart/form-data">
            <label class="block text-sm font-semibold text-gray-700 sm:col-span-2">
                Nombre
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" value="<?= $formProduct['name'] ?>" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700 sm:col-span-2">
                Descripción
                <textarea class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" name="descripcion" rows="4" required><?= $formProduct['description'] ?></textarea>
            </label>
            <label class="block text-sm font-semibold text-gray-700 sm:col-span-2">
                Precio
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="number" name="precio" min="0" step="0.01" value="<?= $formProduct['price'] ?>" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Categoría
                <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="categoria" id="category-select" required>
                    <option value="" disabled <?= $formCategory === '' ? 'selected' : '' ?>>Seleccioná una categoría</option>
                    <?php foreach ($categoryTree as $category => $categoryChildren): ?>
                        <option value="<?= $category ?>" <?= $formCategory === $category ? 'selected' : '' ?>><?= $category ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Subcategoría
                <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="subcategoria" id="subcategory-select" required <?= $formCategory === '' ? 'disabled' : '' ?>>
                    <option value="" disabled <?= $formSubcategory === '' ? 'selected' : '' ?>>Seleccioná una subcategoría</option>
                    <?php foreach ($categoryTree as $category => $categoryChildren): ?>
                        <?php foreach ($categoryChildren as $subcategory => $productIds): ?>
                            <option value="<?= $subcategory ?>" data-parent-category="<?= $category ?>" <?= $formSubcategory === $subcategory ? 'selected' : '' ?>><?= $subcategory ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Marca
                <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="marca" required>
                    <option value="" disabled <?= $formProduct['brand'] === '' ? 'selected' : '' ?>>Seleccioná una marca</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value="<?= $brand ?>" <?= $formProduct['brand'] === $brand ? 'selected' : '' ?>><?= $brand ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Modelo
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="modelo" value="<?= $formProduct['model'] ?>" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700 sm:col-span-2">
                Imagen
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="file" name="imagen" accept="image/*">
            </label>
            <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 sm:col-span-2">
                <input class="accent-green-700" type="checkbox" name="destacado" <?= $isEditingProduct && $formProduct['id'] <= 6 ? 'checked' : '' ?>>
                Producto destacado
            </label>
            <div class="flex flex-wrap items-center gap-3 sm:col-span-2">
                <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit"><?= $isEditingProduct ? 'Guardar cambios' : 'Guardar producto' ?></button>
                <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/productos.php') ?>">Cancelar</a>
            </div>
        </form>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
