<?php
require_once __DIR__ . '/../src/Scraper.php';
$url = 'https://pontlabbe.cineville.fr/programmes/pontlabbe';

$scraper = new Scraper($url);
$movies = $scraper->getMovies();

header('Content-Type: application/json');
echo json_encode([
    'status' => 'success',
    'data' => $movies
]);
?>
