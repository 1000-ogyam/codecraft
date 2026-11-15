<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed.']);
    exit;
}

require_once dirname(__DIR__) . '/config/paystack.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);
$reference = is_array($data) ? trim((string) ($data['reference'] ?? '')) : '';
if (!preg_match('/^CCG-OWN-[A-Za-z0-9]+$/', $reference)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Payment reference is not valid.']);
    exit;
}

$secret = paystackSecretKey(loadPaystackConfig());
if ($secret === '') {
    http_response_code(503);
    echo json_encode(['ok' => false, 'error' => 'Online payment is not configured yet.']);
    exit;
}

$ch = curl_init('https://api.paystack.co/transaction/verify/' . rawurlencode($reference));
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $secret, 'Accept: application/json'],
    CURLOPT_TIMEOUT => 20,
]);
$body = curl_exec($ch);
$code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$payload = json_decode(is_string($body) ? $body : '', true);
$tx = is_array($payload) ? ($payload['data'] ?? null) : null;
$paid = is_array($tx)
    && ($tx['status'] ?? '') === 'success'
    && ($tx['currency'] ?? '') === 'GHS'
    && (int) ($tx['amount'] ?? 0) === 100000;

if ($code !== 200 || !$paid) {
    http_response_code(402);
    echo json_encode(['ok' => false, 'error' => 'Payment was not confirmed.']);
    exit;
}

echo json_encode([
    'ok' => true,
    'reference' => $reference,
    'amount' => 1000,
    'currency' => 'GHS',
]);
