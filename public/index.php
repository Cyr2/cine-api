<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

require_once __DIR__ . '/../vendor/autoload.php';

use Scraper\Scraper;

$url = 'https://pontlabbe.cineville.fr/programmes/pontlabbe';
$scraper = new Scraper($url);
$movies = $scraper->getMovies();

header('Content-Type: application/json');
echo json_encode([
    'status' => 'success',
    'data' => $movies
]);
?>