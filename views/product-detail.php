<?php require __DIR__ . '/partials/header.php'; ?>
<?php if ($product === null): ?>
    <?php
    $notFoundTitle = 'Producto no encontrado';
    $notFoundMessage = 'No encontramos el producto o no se encuentra disponible. Volvé al catálogo para ver los productos disponibles.';
    $notFoundLink = url('productos.php');
    $notFoundLinkText = 'Volver a productos';
    require __DIR__ . '/partials/404.php';
    ?>
<?php else: ?>
    <section class="py-10 sm:py-14">
        <div class="mx-auto grid w-full max-w-6xl gap-8 px-6 lg:grid-cols-2 lg:gap-12">
            <div class="flex items-center justify-center rounded-2xl border border-gray-200 bg-white p-6 sm:p-10">
                <img class="h-80 w-full object-contain" src="<?= url($product['image']) ?>" alt="<?= $product['name'] ?>">
            </div>
            <div class="flex flex-col items-start">
                <p class="mb-2 text-sm font-bold uppercase text-green-700"><?= $product['brand'] ?></p>
                <h1 class="font-sans text-3xl font-bold leading-tight text-gray-900 sm:text-4xl"><?= $product['name'] ?></h1>
                <div class="mt-4 flex items-center gap-3">
                    <span class="flex items-center gap-1">
                        <?php for ($star = 1; $star <= 5; $star++): ?>
                            <svg class="h-5 w-5 <?= $star <= round($averageRating) ? 'text-amber-500' : 'text-gray-200' ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.25a.75.75 0 0 1 .68.43l2.78 5.63 6.21.9a.75.75 0 0 1 .42 1.28l-4.5 4.38 1.06 6.18a.75.75 0 0 1-1.09.79L12 18.92l-5.56 2.92a.75.75 0 0 1-1.09-.79l1.06-6.18-4.5-4.38a.75.75 0 0 1 .42-1.28l6.21-.9 2.78-5.63a.75.75 0 0 1 .68-.43Z" />
                            </svg>
                        <?php endfor; ?>
                    </span>
                    <span class="text-sm font-semibold text-gray-600"><?= number_format($averageRating, 1, ',', '.') ?> de 5 · <?= count($comments) ?> comentarios</span>
                </div>
                <p class="mt-6 text-3xl font-bold text-gray-900">$<?= number_format((float) $product['price'], 0, ',', '.') ?></p>
                <p class="mt-5 text-base leading-7 text-gray-600"><?= $product['description'] ?></p>

                <dl class="mt-7 grid w-full gap-4 border-t border-gray-200 pt-5 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase text-gray-500">Marca</dt>
                        <dd class="mt-1 font-semibold text-gray-800"><?= $product['brand'] ?></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase text-gray-500">Modelo</dt>
                        <dd class="mt-1 font-semibold text-gray-800"><?= $product['model'] ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-12 sm:py-16">
        <div class="mx-auto grid w-full max-w-6xl gap-10 px-6 lg:grid-cols-2">
            <div>
                <h2 class="font-sans text-2xl font-bold text-gray-900">Comentarios</h2>
                <?php if ($comments === []): ?>
                    <p class="mt-6 rounded-xl border border-gray-200 bg-white p-5 text-sm text-gray-600">Todavía no hay comentarios aprobados para este producto.</p>
                <?php else: ?>
                    <div class="mt-6 space-y-4">
                        <?php foreach ($comments as $comment): ?>
                            <article class="rounded-xl border border-gray-200 bg-white p-5">
                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <h3 class="font-semibold text-gray-900"><?= $comment['author'] ?></h3>
                                    <time class="text-sm text-gray-500" datetime="<?= $comment['date'] ?>"><?= date('d/m/Y', strtotime($comment['date'])) ?></time>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-700"><?= $comment['comment'] ?></p>
                                <p class="mt-3 text-sm font-semibold text-amber-600">Calificación: <?= $comment['rating'] ?> de 5</p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div>
                <h2 class="font-sans text-2xl font-bold text-gray-900">Dejá tu comentario</h2>
                <form class="mt-6 space-y-4 rounded-xl border border-gray-200 bg-white p-5 sm:p-6" action="<?= url('producto.php?id=' . $product['id']) ?>" method="post">
                    <label class="block text-sm font-semibold text-gray-700">
                        Email
                        <input class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" type="email" name="email" required>
                    </label>
                    <label class="block text-sm font-semibold text-gray-700">
                        Comentario
                        <textarea class="mt-2 block w-full rounded-lg border border-gray-300 p-2 font-normal text-gray-800" name="comentario" rows="4" required></textarea>
                    </label>
                    <label class="block text-sm font-semibold text-gray-700">
                        Calificación
                        <select class="mt-2 block w-full rounded-lg border border-gray-300 bg-white p-2 font-normal text-gray-800" name="calificacion" required>
                            <option value="" selected disabled>Seleccioná una calificación</option>
                            <option value="1">1 - Muy mala</option>
                            <option value="2">2 - Mala</option>
                            <option value="3">3 - Regular</option>
                            <option value="4">4 - Buena</option>
                            <option value="5">5 - Excelente</option>
                        </select>
                    </label>
                    <button class="rounded-lg bg-green-700 p-2 text-sm font-bold text-white hover:bg-green-800" type="submit">Enviar comentario</button>
                </form>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require __DIR__ . '/partials/footer.php'; ?>
