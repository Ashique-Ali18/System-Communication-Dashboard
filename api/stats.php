<?php
require_once __DIR__ . "/../db.php";
header("Content-Type: application/json");

$emails = (int)$pdo->query("SELECT COUNT(*) c FROM email_logs")->fetch()["c"];
$sms = (int)$pdo->query("SELECT COUNT(*) c FROM sms_logs")->fetch()["c"];
$whatsapp = (int)$pdo->query("SELECT COUNT(*) c FROM whatsapp_logs")->fetch()["c"];

echo json_encode([
  "emails" => $emails,
  "sms" => $sms,
  "whatsapp" => $whatsapp
]);