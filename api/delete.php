<?php
require_once __DIR__ . "/../db.php";
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  http_response_code(405);
  echo json_encode(["error" => "Method not allowed"]);
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$type = $data["type"] ?? "";
$id = (int)($data["id"] ?? 0);

$map = [
  "email" => "email_logs",
  "sms" => "sms_logs",
  "whatsapp" => "whatsapp_logs",
];

if (!isset($map[$type]) || $id <= 0) {
  http_response_code(400);
  echo json_encode(["error" => "Valid type and id are required"]);
  exit;
}

$table = $map[$type];

$stmt = $pdo->prepare("DELETE FROM `$table` WHERE id = ?");
$stmt->execute([$id]);

echo json_encode([
  "ok" => true,
  "deleted" => $stmt->rowCount()
]);