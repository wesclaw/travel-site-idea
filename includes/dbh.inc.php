<?php 

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$servername = $_ENV['DB_SERVER'];  
$username = $_ENV['DB_USERNAME'];  
$password = $_ENV['DB_PASSWORD'];  
$dbname = $_ENV['DB_NAME'];

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



