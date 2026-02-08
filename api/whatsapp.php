<?php
require_once __DIR__ . "/../db.php";
header("Content-Type: application/json");

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
  $stmt = $pdo->query("SELECT id, mobile_number, message, created_at FROM whatsapp_logs ORDER BY created_at DESC");
  echo json_encode($stmt->fetchAll());
  exit;
}

if ($method === "POST") {
  $data = json_decode(file_get_contents("php://input"), true);

  $mobile = trim($data["mobile_number"] ?? "");
  $message = trim($data["message"] ?? "");

  if ($mobile === "" || $message === "") {
    http_response_code(400);
    echo json_encode(["error" => "mobile_number and message are required"]);
    exit;
  }

  $stmt = $pdo->prepare("INSERT INTO whatsapp_logs (mobile_number, message) VALUES (?, ?)");
  $stmt->execute([$mobile, $message]);

  echo json_encode(["ok" => true]);
  exit;
}

http_response_code(405);
echo json_encode(["error" => "Method not allowed"]);