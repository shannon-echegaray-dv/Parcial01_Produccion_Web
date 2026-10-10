<?php
$rating = (int) ($product['rating'] ?? 0);
?>
<article class="overflow-hidden rounded-xl border border-gray-200 bg-white transition hover:-translate-y-1 hover:shadow-lg">
    <a class="relative block overflow-hidden bg-gray-50" href="<?= url('producto.php?id=' . (int) $product['id']) ?>">
        <img class="h-44 w-full bg-white object-contain p-4 transition duration-300 max-sm:h-36 max-sm:p-3" src="<?= url($product['image']) ?>" alt="<?= $product['name'] ?>" loading="lazy">
        <span class="absolute left-3 top-3 rounded-full border border-white bg-white/90 px-2.5 py-1 text-xs font-bold text-green-800"><?= $product['category'] ?></span>
    </a>
    <div class="p-4 max-sm:p-3">
        <p class="mb-1 text-xs font-bold uppercase text-gray-500"><?= $product['brand'] ?></p>
        <h3 class="mb-2 min-h-10 font-sans text-base font-semibold leading-relaxed"><a href="<?= url('producto.php?id=' . (int) $product['id']) ?>"><?= $product['name'] ?></a></h3>
        <p class="mb-3 flex items-center gap-2 text-sm">
            <span class="flex items-center gap-1">
                <?php for ($star = 1; $star <= 5; $star++): ?>
                    <svg class="h-4 w-4 <?= $star <= $rating ? 'text-amber-500' : 'text-gray-200' ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.25a.75.75 0 0 1 .68.43l2.78 5.63 6.21.9a.75.75 0 0 1 .42 1.28l-4.5 4.38 1.06 6.18a.75.75 0 0 1-1.09.79L12 18.92l-5.56 2.92a.75.75 0 0 1-1.09-.79l1.06-6.18-4.5-4.38a.75.75 0 0 1 .42-1.28l6.21-.9 2.78-5.63a.75.75 0 0 1 .68-.43Z" />
                    </svg>
                <?php endfor; ?>
            </span>
            <span class="text-xs font-semibold text-gray-500"><?= $rating ?>.0</span>
        </p>
        <div class="flex items-center justify-between border-t border-gray-100 pt-3">
            <p class="m-0 font-sans text-lg font-bold"> <span class="mb-0.5 block font-sans text-xs font-medium text-gray-500">Precio</span>$<?= number_format((float) $product['price'], 0, ',', '.') ?></p>
        </div>
    </div>
</article>
