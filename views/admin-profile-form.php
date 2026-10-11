<?php require __DIR__ . '/partials/admin-header.php'; ?>
<section>
    <div class="mb-6">
        <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/perfiles.php') ?>">Volver al listado de perfiles</a>
        <h1 class="mt-3 font-sans text-3xl font-bold text-gray-900"><?= $isEditingProfile ? 'Modificar perfil' : 'Nuevo perfil' ?></h1>
        <p class="mt-3 text-gray-600">Indicá el nombre y las secciones del panel para este perfil.</p>
    </div>

    <section class="max-w-2xl rounded-xl border border-gray-200 bg-white p-5 sm:p-6">
        <form class="space-y-5" method="post">
            <label class="block text-sm font-semibold text-gray-700">
                Nombre del perfil
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" value="<?= $formProfile['name'] ?>" required>
            </label>
            <fieldset class="space-y-3">
                <legend class="text-sm font-semibold text-gray-700">Secciones del panel</legend>
                <?php foreach ($profileSections as $sectionKey => $sectionName): ?>
                    <label class="flex items-center gap-3 text-sm text-gray-700">
                        <input class="accent-green-700" type="checkbox" name="secciones[]" value="<?= $sectionKey ?>" <?= in_array($sectionKey, $formProfile['sections'], true) ? 'checked' : '' ?>>
                        <?= $sectionName ?>
                    </label>
                <?php endforeach; ?>
            </fieldset>
            <div class="flex flex-wrap items-center gap-3">
                <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit"><?= $isEditingProfile ? 'Guardar cambios' : 'Guardar perfil' ?></button>
                <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('admin/perfiles.php') ?>">Cancelar</a>
            </div>
        </form>
    </section>
</section>
<?php require __DIR__ . '/partials/admin-footer.php'; ?>
