<?php 

require_once __DIR__ . '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['localhost'];
$db = $_ENV['cafe_db'];
$user = $_ENV['root'];
$pass = $_ENV[''];
$apiKey = $_ENV['API_KEY'];

try {
    $conn = new PDO("mysql:host=$host;cafe_db=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    error_log($e->getMessage()); // Log the error message
    http_response_code(500);
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

?>