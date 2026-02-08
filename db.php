<?php
$host = "127.0.0.1";
$port = 3307; // <-- change this to your XAMPP MySQL port (maybe 3307)
$db   = "comms_dashboard";
$user = "root";
$pass = "";

try {
  $pdo = new PDO(
    "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
    $user,
    $pass,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );
} catch (Exception $e) {
  http_response_code(500);
  die("DB connection failed: " . $e->getMessage());
}