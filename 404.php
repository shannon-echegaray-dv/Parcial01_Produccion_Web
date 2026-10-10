<?php
require_once __DIR__ . '/config/app.php';

http_response_code(404);

$pageTitle = 'Página no encontrada';
$activePage = '';
$notFoundTitle = 'Página no encontrada';
$notFoundMessage = 'No encontramos la página que buscás. Revisá la dirección o volvé al inicio.';
$notFoundLink = url('index.php');
$notFoundLinkText = 'Volver al inicio';

require __DIR__ . '/views/partials/header.php';
require __DIR__ . '/views/partials/404.php';
require __DIR__ . '/views/partials/footer.php';
