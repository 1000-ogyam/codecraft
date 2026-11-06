<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed.']);
    exit;
}

require_once dirname(__DIR__) . '/config/mail.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid JSON payload.']);
    exit;
}

// Honeypot: bots often fill hidden "website" field
if (!empty($data['website'])) {
    echo json_encode(['ok' => true]);
    exit;
}

try {
    sendFormEmail($data);
    echo json_encode(['ok' => true]);
} catch (InvalidArgumentException $e) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
} catch (Throwable $e) {
    error_log('send-form.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'ok'    => false,
        'error' => 'We could not send your message. Please try again or email hello@codecraftgh.com directly.',
    ]);
}
