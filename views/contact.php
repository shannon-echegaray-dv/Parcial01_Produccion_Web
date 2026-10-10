<?php
$contactAreas = ['Atención al cliente', 'Administración', 'Compras', 'Recursos humanos', 'Ventas', 'Otro'];
require __DIR__ . '/partials/header.php'; ?>
<section class="py-12 sm:py-16">
    <div class="mx-auto w-full max-w-6xl px-6">
        <div class="mb-8 max-w-2xl">
            <h1 class="font-sans text-3xl font-bold text-gray-900">Contactanos</h1>
        </div>

        <form class="max-w-2xl space-y-5 rounded-xl border border-gray-200 bg-white p-5 sm:p-6" method="post">
            <div class="grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-semibold text-gray-700">
                    Nombre y apellido
                    <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" autocomplete="name" required>
                </label>
                <label class="block text-sm font-semibold text-gray-700">
                    Email
                    <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="email" name="email" autocomplete="email" required>
                </label>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <label class="block text-sm font-semibold text-gray-700">
                    Teléfono
                    <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="tel" name="telefono" autocomplete="tel" required>
                </label>
                <label class="block text-sm font-semibold text-gray-700">
                    Área de la empresa
                    <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="area" required>
                        <option value="" selected disabled>Seleccioná un área</option>
                        <?php foreach ($contactAreas as $area): ?>
                            <option value="<?= $area ?>"><?= $area ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <label class="block text-sm font-semibold text-gray-700">
                Comentario
                <textarea class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" name="comentario" rows="5" required></textarea>
            </label>
            <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit">Enviar consulta</button>
        </form>
    </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
