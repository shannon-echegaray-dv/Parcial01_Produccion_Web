<?php

function profileSectionNames(): array {
    return [
        'home' => 'Inicio',
        'products' => 'Productos',
        'categories' => 'Categorías',
        'brands' => 'Marcas',
        'comments' => 'Comentarios',
        'users' => 'Usuarios',
        'profiles' => 'Perfiles',
    ];
}

function allProfiles(): array {
    return [
        [
            'name' => 'Administrador',
            'sections' => ['home', 'products', 'categories', 'brands', 'comments', 'users', 'profiles'],
            'active' => true,
        ],
        [
            'name' => 'Operador',
            'sections' => ['products', 'categories', 'brands', 'comments'],
            'active' => true,
        ],
    ];
}

function profileNames(): array {
    $names = [];

    foreach (allProfiles() as $profile) {
        $names[] = $profile['name'];
    }

    return $names;
}
