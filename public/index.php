<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, OPTIONS, PATCH, DELETE, POST, PUT");
header('Access-Control-Allow-Headers: X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

require_once __DIR__ . '/../vendor/autoload.php';

use Scraper\Scraper;

try {
    $url = 'https://pontlabbe.cineville.fr/programmes/pontlabbe';
    $scraper = new Scraper($url);
    $movies = $scraper->getMovies();

    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'data' => $movies
    ]);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>