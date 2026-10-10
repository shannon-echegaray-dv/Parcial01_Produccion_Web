<?php require __DIR__ . '/partials/header.php'; ?>
<section class="py-12 sm:py-16">
    <div class="mx-auto w-full max-w-md px-6">
        <div class="mb-8 text-center">
            <h1 class="font-sans text-3xl font-bold text-gray-900">Crear una cuenta</h1>
            <p class="mt-3 text-gray-600">Completá tus datos para registrarte.</p>
        </div>

        <form class="space-y-5 rounded-xl border border-gray-200 bg-white p-5 sm:p-6" method="post">
            <label class="block text-sm font-semibold text-gray-700">
                Nombre
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="text" name="nombre" autocomplete="name" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Email
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="email" name="email" autocomplete="email" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Contraseña
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="password" name="contrasena" autocomplete="new-password" minlength="8" required>
            </label>
            <label class="block text-sm font-semibold text-gray-700">
                Confirmación de contraseña
                <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="password" name="confirmar-contrasena" autocomplete="new-password" minlength="8" required>
            </label>
            <button class="w-full rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit">Registrarme</button>
            <p class="text-center text-sm text-gray-600">¿Ya tenés una cuenta? <a class="font-semibold text-green-800 hover:underline" href="<?= url('inicio-sesion.php') ?>">Iniciá sesión</a></p>
        </form>
    </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
