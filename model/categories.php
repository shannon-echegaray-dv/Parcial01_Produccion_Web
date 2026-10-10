<?php

function productCategoryTree(): array {
    return [
        'Cuidado de la piel' => [
            'Hidratación facial' => [1, 19, 20],
            'Dermocosmética' => [4],
        ],
        'Maquillaje' => [
            'Ojos' => [2],
        ],
        'Cuidado capilar' => [
            'Shampoo' => [3, 12, 13, 14, 16, 17],
            'Acondicionador' => [18],
        ],
        'Suplementos' => [
            'Nutrición deportiva' => [5],
        ],
        'Solares' => [
            'Protección facial' => [6, 7, 8, 9, 10],
            'Protección corporal' => [11],
        ],
        'Cuidado personal' => [
            'Cuidado de manos' => [15],
        ],
    ];
}

function findProductCategory(int $productId): array {
    foreach (productCategoryTree() as $category => $subcategories) {
        foreach ($subcategories as $subcategory => $productIds) {
            if (in_array($productId, $productIds, true)) {
                return [
                    'category' => $category,
                    'subcategory' => $subcategory,
                ];
            }
        }
    }

    return [
        'category' => '',
        'subcategory' => '',
    ];
}
