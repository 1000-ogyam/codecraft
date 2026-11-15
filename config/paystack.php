<?php

declare(strict_types=1);

function loadPaystackConfig(): array
{
    $local = __DIR__ . '/paystack.local.php';
    if (is_file($local)) {
        $cfg = require $local;
        return is_array($cfg) ? $cfg : [];
    }

    $example = __DIR__ . '/paystack.local.php.example';
    if (is_file($example)) {
        $cfg = require $example;
        return is_array($cfg) ? $cfg : [];
    }

    return [];
}

function paystackPublicKey(array $cfg): string
{
    $key = trim((string) ($cfg['public_key'] ?? ''));
    if ($key === '' || str_contains($key, 'YOUR_PAYSTACK')) {
        return '';
    }

    return $key;
}

function paystackSecretKey(array $cfg): string
{
    $key = trim((string) ($cfg['secret_key'] ?? ''));
    if ($key === '' || str_contains($key, 'YOUR_PAYSTACK')) {
        return '';
    }

    return $key;
}
