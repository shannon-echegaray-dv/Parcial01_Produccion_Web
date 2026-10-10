<?php require dirname(__DIR__) . '/views/partials/header.php'; ?>
<section class="bg-green-50">
    <div class="mx-auto flex min-h-80 w-full max-w-6xl items-center px-6 py-16 max-sm:min-h-72 max-sm:py-12">
        <div class="max-w-2xl">
            <h1 class="mb-4 max-w-xl font-sans text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">Bienestar y cuidado, <span class="text-green-700">más cerca.</span></h1>
            <p class="mb-7 max-w-lg text-base leading-7 text-gray-600">Encontrá productos de farmacia, perfumería y cuidado personal para acompañarte todos los días.</p>
            <div class="flex flex-wrap items-center gap-6">
                <a class="inline-flex items-center gap-4 rounded-lg bg-green-700 p-2 text-sm font-bold text-white shadow-lg shadow-green-900/15 transition hover:bg-green-800" href="<?= url('productos.php') ?>">Explorar productos</a>
                <a class="text-sm font-bold text-green-800 hover:underline" href="<?= url('contactanos.php') ?>">Contactanos</a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 max-sm:py-12">
    <div class="mx-auto w-full max-w-6xl px-6">
        <div class="mb-6 flex items-end justify-between gap-5 max-sm:flex-col max-sm:items-start">
            <div><p class="mb-1.5 text-xs font-bold uppercase text-green-700">Una selección para vos</p><h2 id="featured-title" class="font-sans text-2xl font-bold text-gray-900">Productos destacados</h2></div>
            <a class="pb-1 text-sm font-bold text-green-800 hover:underline" href="<?= url('productos.php') ?>">Ver todos los productos</a>
        </div>
        <div class="grid grid-flow-row grid-cols-[repeat(auto-fill,minmax(16rem,1fr))] gap-5 max-sm:gap-3">
            <?php foreach ($products as $product): ?>
                <?php require dirname(__DIR__) . '/views/partials/product-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require dirname(__DIR__) . '/views/partials/footer.php'; ?>

