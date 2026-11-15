<?php
/**
 * Contact form handler — validates input and sends email via PHP mail().
 */
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

require_once dirname(__DIR__) . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);

if (!is_array($data)) {
    $data = $_POST;
}

// Honeypot — bots fill this; humans should leave it empty
if (!empty($data['website'] ?? '')) {
    echo json_encode(['ok' => true, 'message' => 'Message sent. Thank you!']);
    exit;
}

$csrf = (string) ($data['csrf_token'] ?? '');
if ($csrf === '' || !hash_equals($_SESSION['csrf_token'] ?? '', $csrf)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'message' => 'Invalid security token. Refresh and try again.']);
    exit;
}

$name = trim((string) ($data['name'] ?? ''));
$email = trim((string) ($data['email'] ?? ''));
$subject = trim((string) ($data['subject'] ?? ''));
$message = trim((string) ($data['message'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors[] = 'Please enter your name.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email.';
}
if ($subject === '' || mb_strlen($subject) < 3) {
    $errors[] = 'Please enter a subject.';
}
if ($message === '' || mb_strlen($message) < 10) {
    $errors[] = 'Please enter a message (at least 10 characters).';
}
if (mb_strlen($message) > 5000) {
    $errors[] = 'Message is too long.';
}

if ($errors) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => implode(' ', $errors)]);
    exit;
}

$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
$safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

$mailSubject = '[Portfolio] ' . $subject;
$body = "New message from your portfolio contact form\n\n"
    . "Name: {$name}\n"
    . "Email: {$email}\n"
    . "Subject: {$subject}\n\n"
    . "Message:\n{$message}\n";

$headers = [
    'From: Portfolio <noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '>',
    'Reply-To: ' . $safeName . ' <' . $safeEmail . '>',
    'X-Mailer: PHP/' . PHP_VERSION,
    'Content-Type: text/plain; charset=UTF-8',
];

$sent = @mail(SITE_EMAIL, $mailSubject, $body, implode("\r\n", $headers));

// Persist a local copy so messages are never lost if mail() is disabled
$logDir = dirname(__DIR__) . '/storage';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0755, true);
}
$logEntry = [
    'time' => date('c'),
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'mailed' => (bool) $sent,
];
@file_put_contents(
    $logDir . '/messages.jsonl',
    json_encode($logEntry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
    FILE_APPEND | LOCK_EX
);

if (!$sent) {
    // Still success if logged — local/dev servers often block mail()
    echo json_encode([
        'ok' => true,
        'message' => 'Message received. Thank you — I will get back to you soon.',
    ]);
    exit;
}

echo json_encode([
    'ok' => true,
    'message' => 'Message sent. Thank you!',
]);
