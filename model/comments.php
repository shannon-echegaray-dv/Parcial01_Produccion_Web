<?php

function allComments(): array {
    return [
        [
            'author' => 'Lucía M.',
            'comment' => 'Me resultó muy cómodo para sumar a mi rutina diaria.',
            'rating' => 5,
            'date' => '2026-09-18',
            'productId' => 1,
            'approved' => true,
        ],
        [
            'author' => 'Carolina R.',
            'comment' => 'El producto llegó en buen estado y era lo que esperaba.',
            'rating' => 5,
            'date' => '2026-09-23',
            'productId' => 2,
            'approved' => true,
        ],
        [
            'author' => 'Daniela P.',
            'comment' => 'Tiene buena duración y es fácil de aplicar.',
            'rating' => 4,
            'date' => '2026-09-20',
            'productId' => 3,
            'approved' => true,
        ],
        [
            'author' => 'Camila G.',
            'comment' => 'Deja el pelo suave y con una sensación liviana.',
            'rating' => 4,
            'date' => '2026-09-25',
            'productId' => 4,
            'approved' => true,
        ],
        [
            'author' => 'Marina F.',
            'comment' => 'Lo incorporé a mi cuidado diario y me resultó práctico.',
            'rating' => 5,
            'date' => '2026-09-27',
            'productId' => 5,
            'approved' => true,
        ],
    ];
}

function approvedComments(?int $productId = null): array {
    $approved = [];

    foreach (allComments() as $comment) {
        if (!$comment['approved']) {
            continue;
        }

        if ($productId !== null && $comment['productId'] !== $productId) {
            continue;
        }

        $approved[] = $comment;
    }

    return $approved;
}
