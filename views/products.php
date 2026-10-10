<?php require __DIR__ . '/partials/header.php'; ?>
<section class="py-12 sm:py-16">
    <div class="mx-auto grid w-full max-w-6xl gap-8 px-6 lg:grid-cols-4">
        <aside class="lg:col-span-1">
            <h2 class="mb-4 font-sans text-lg font-bold text-gray-900">Filtros</h2>
            <form class="space-y-4" action="<?= url('productos.php') ?>" method="get">
                <?php if ($selectedCategory !== ''): ?>
                    <input type="hidden" name="categoria" value="<?= $selectedCategory ?>">
                <?php endif; ?>
                <?php if ($selectedSubcategory !== ''): ?>
                    <input type="hidden" name="subcategoria" value="<?= $selectedSubcategory ?>">
                <?php endif; ?>
                <section class="h-64 overflow-y-auto rounded-xl border border-gray-200 bg-white p-4">
                    <h3 class="mb-3 font-sans text-base font-bold text-gray-900">Categorías</h3>
                    <nav class="space-y-2">
                        <a class="block rounded-lg px-3 py-2 text-sm font-semibold <?= $selectedCategory === '' ? 'bg-green-50 text-green-800' : 'text-gray-700 hover:bg-gray-50' ?>" href="<?= url('productos.php') ?>">Todas las categorías</a>
                        <?php foreach ($categories as $category): ?>
                            <?php $categoryIds = array_merge(...array_values($categoryTree[$category])); ?>
                            <div>
                                <a class="flex items-center justify-between rounded-lg px-3 py-2 text-sm font-semibold <?= $selectedCategory === $category && $selectedSubcategory === '' ? 'bg-green-50 text-green-800' : 'text-gray-700 hover:bg-gray-50' ?>" href="<?= url('productos.php?' . http_build_query(['categoria' => $category, 'marca' => $selectedBrand, 'orden' => $selectedSort])) ?>">
                                    <span><?= $category ?></span><span class="font-normal text-gray-500">(<?= count($categoryIds) ?>)</span>
                                </a>
                                <div class="ml-3 border-l border-gray-200 pl-3">
                                    <?php foreach ($categoryTree[$category] as $subcategory => $productIds): ?>
                                        <a class="flex items-center justify-between rounded-lg px-3 py-2 text-sm <?= $selectedSubcategory === $subcategory ? 'bg-green-50 font-semibold text-green-800' : 'text-gray-600 hover:bg-gray-50' ?>" href="<?= url('productos.php?' . http_build_query(['categoria' => $category, 'subcategoria' => $subcategory, 'marca' => $selectedBrand, 'orden' => $selectedSort])) ?>">
                                            <span><?= $subcategory ?></span><span class="text-gray-500">(<?= count($productIds) ?>)</span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </nav>
                </section>

                <section class="h-64 overflow-y-auto rounded-xl border border-gray-200 bg-white p-4">
                    <h3 class="mb-3 font-sans text-base font-bold text-gray-900">Marcas</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="marca" value="" <?= $selectedBrand === '' ? 'checked' : '' ?>>Todas las marcas</label>
                        <?php foreach ($brands as $brand): ?>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="marca" value="<?= $brand ?>" <?= $selectedBrand === $brand ? 'checked' : '' ?>><?= $brand ?></label>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="h-64 overflow-y-auto rounded-xl border border-gray-200 bg-white p-4">
                    <h3 class="mb-3 font-sans text-base font-bold text-gray-900">Ordenar</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="orden" value="destacados" <?= $selectedSort === 'destacados' ? 'checked' : '' ?>>Destacados</label>
                        <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="orden" value="ranking" <?= $selectedSort === 'ranking' ? 'checked' : '' ?>>Mejor puntuados</label>
                        <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="orden" value="nombre-asc" <?= $selectedSort === 'nombre-asc' ? 'checked' : '' ?>>Nombre A-Z</label>
                        <label class="flex items-center gap-2 text-sm text-gray-700"><input class="accent-green-700" type="radio" name="orden" value="nombre-desc" <?= $selectedSort === 'nombre-desc' ? 'checked' : '' ?>>Nombre Z-A</label>
                    </div>
                </section>

                <div class="flex flex-wrap items-center gap-3">
                    <button class="rounded-lg bg-green-700 px-4 py-2.5 text-sm font-bold text-white hover:bg-green-800" type="submit">Aplicar filtros</button>
                    <a class="text-sm font-semibold text-green-800 hover:underline" href="<?= url('productos.php') ?>">Limpiar</a>
                </div>
            </form>
        </aside>

        <div class="lg:col-span-3">
            <div class="mb-5 flex items-center justify-between gap-4">
                <h2 class="font-sans text-xl font-bold text-gray-900"><?= $selectedSubcategory !== '' ? $selectedSubcategory : ($selectedCategory !== '' ? $selectedCategory : 'Todos los productos') ?></h2>
                <p class="text-sm text-gray-500"><?= count($filteredProducts) ?> productos</p>
            </div>

            <?php if ($filteredProducts === []): ?>
                <div class="rounded-xl border border-gray-200 bg-gray-50 px-6 py-12 text-center">
                    <p class="font-semibold text-gray-700">No hay productos para mostrar</p>
                    <a class="mt-3 inline-block text-sm font-bold text-green-800 hover:underline" href="<?= url('productos.php') ?>">Limpiar filtros</a>
                </div>
            <?php else: ?>
                <div class="grid grid-flow-row grid-cols-[repeat(auto-fill,minmax(20rem,1fr))] gap-5 max-sm:gap-3">
                    <?php foreach ($filteredProducts as $product): ?>
                        <?php require __DIR__ . '/partials/product-card.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/partials/footer.php'; ?>
