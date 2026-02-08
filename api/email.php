<?php
require_once __DIR__ . "/../db.php";
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
  $stmt = $pdo->query("SELECT id, email_to, created_at FROM email_logs ORDER BY created_at DESC");
  echo json_encode($stmt->fetchAll());
  exit;
}

if ($method === "POST") {
  $data = json_decode(file_get_contents("php://input"), true);

  $email_to = trim($data["email_to"] ?? "");

  if (!$email_to || !filter_var($email_to, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["error" => "Valid email_to is required"]);
    exit;
  }

  $stmt = $pdo->prepare("INSERT INTO email_logs (email_to) VALUES (?)");
  $stmt->execute([$email_to]);

  echo json_encode(["ok" => true]);
  exit;
}

http_response_code(405);
echo json_encode(["error" => "Method not allowed"]);