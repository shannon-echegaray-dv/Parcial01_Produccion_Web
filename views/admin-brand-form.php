<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6">
        <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/marcas.php') ?>">Volver al listado de marcas</a>
        <h1 class="mt-3 font-sans text-3xl font-bold text-gray-900"><?= $isEditingBrand ? 'Modificar marca' : 'Nueva marca' ?></h1>
        <p class="mt-3 text-gray-600">Completá el nombre de la marca.</p>
    </div>

    <section class="max-w-2xl rounded-xl border border-gray-200 bg-white p-5 sm:p-6">
        <form class="space-y-5" method="post">
            <label class="block text-sm font-semibold text-gray-700">
                Nombre
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" value="<?= $brandName ?>" required>
            </label>
            <div class="flex flex-wrap items-center gap-3">
                <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit"><?= $isEditingBrand ? 'Guardar cambios' : 'Guardar marca' ?></button>
                <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/marcas.php') ?>">Cancelar</a>
            </div>
        </form>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
