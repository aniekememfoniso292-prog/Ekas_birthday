<?php
// ===== SETTINGS =====
const NTFY_TOPIC   = 'ekas-birthday4u';
const NOTIFY_EMAIL = 'aniekememfoniso292@gmail.com';  

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
if (!empty($_POST['website'])) { exit('ok'); } 

$name = trim($_POST['name'] ?? '');
$wish = trim($_POST['wish'] ?? '');
if ($name === '' || $wish === '' || mb_strlen($name) > 60 || mb_strlen($wish) > 500) {
  http_response_code(400); exit('Invalid input');
}

$line = json_encode(['time' => date('c'), 'name' => $name, 'wish' => $wish], JSON_UNESCAPED_UNICODE) . PHP_EOL;
if (file_put_contents(__DIR__ . '/wishes.txt', $line, FILE_APPEND | LOCK_EX) === false) {
  http_response_code(500); exit('Could not save');
}

$msg = "New wish from $name:\n$wish";

if (NTFY_TOPIC !== '') {
  $ctx = stream_context_create(['http' => [
    'method'  => 'POST',
    'header'  => "Title: New birthday wish\r\nTags: crown\r\nContent-Type: text/plain; charset=utf-8\r\n",
    'content' => $msg,
    'timeout' => 4,
  ]]);
  @file_get_contents('https://ntfy.sh/' . rawurlencode(NTFY_TOPIC), false, $ctx);
}

if (NOTIFY_EMAIL !== '') {
  $subject = 'New birthday wish from ' . str_replace(["\r", "\n"], ' ', $name);
  @mail(NOTIFY_EMAIL, $subject, $msg, 'Content-Type: text/plain; charset=UTF-8');
}

echo 'ok';