<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once dirname(__DIR__) . '/config/paystack.php';

$key = paystackPublicKey(loadPaystackConfig());
if ($key === '') {
    http_response_code(503);
    echo json_encode(['ok' => false, 'error' => 'Online payment is not configured yet.']);
    exit;
}

echo json_encode(['ok' => true, 'publicKey' => $key]);
