<?php

declare(strict_types=1);

function loadSmsConfig(): array
{
    $local = __DIR__ . '/sms.local.php';
    if (is_file($local)) {
        $cfg = require $local;
        return is_array($cfg) ? $cfg : [];
    }
    $example = __DIR__ . '/sms.local.php.example';
    $cfg = is_file($example) ? require $example : [];
    return is_array($cfg) ? $cfg : [];
}

function smsApiKey(array $cfg): string
{
    $key = trim((string) ($cfg['api_key'] ?? ''));
    if ($key === '' || str_contains($key, 'YOUR_ARKESEL')) {
        return '';
    }
    return $key;
}

function smsRecipient(string $phone): string
{
    $digits = preg_replace('/\D+/', '', $phone) ?? '';
    if (str_starts_with($digits, '233') && strlen($digits) >= 12) {
        return substr($digits, 0, 12);
    }
    if (str_starts_with($digits, '0') && strlen($digits) === 10) {
        return '233' . substr($digits, 1);
    }
    if (strlen($digits) === 9) {
        return '233' . $digits;
    }
    return '';
}

function bookingSmsMessage(array $data): string
{
    $track = trim((string) ($data['track'] ?? 'course'));
    $offer = trim((string) ($data['offer'] ?? ''));
    if (str_starts_with($offer, 'Online')) {
        $ref = trim((string) ($data['payment_reference'] ?? ''));
        $paid = $ref !== '' ? " Payment {$ref}." : '';
        return "CodeCraft: Your online {$track} seat is booked.{$paid} Details are in your email.";
    }
    $period = trim((string) ($data['period'] ?? ''));
    $when = $period !== '' ? " for the {$period}" : '';
    return "CodeCraft: Your in-person {$track} seat is held{$when}. Pay at GM-108 Adam Street, Accra.";
}

function sendArkeselSms(string $phone, string $message): array
{
    $cfg = loadSmsConfig();
    $key = smsApiKey($cfg);
    $to = smsRecipient($phone);
    if ($key === '') {
        return ['ok' => false, 'detail' => 'SMS is not configured.'];
    }
    if ($to === '') {
        return ['ok' => false, 'detail' => 'Phone number is not a Ghana mobile number.'];
    }

    $payload = json_encode([
        'sender' => (string) ($cfg['sender'] ?? 'Codecraft'),
        'message' => $message,
        'recipients' => [$to],
    ]);

    $ch = curl_init('https://sms.arkesel.com/api/v2/sms/send');
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'api-key: ' . $key,
            'Content-Type: application/json',
            'Accept: application/json',
        ],
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => 20,
    ]);
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $decoded = json_decode(is_string($body) ? $body : '', true);
    $status = is_array($decoded) ? strtolower((string) ($decoded['status'] ?? '')) : '';
    $ok = $code >= 200 && $code < 300 && ($status === '' || $status === 'success');
    $detail = is_array($decoded)
        ? (string) ($decoded['message'] ?? $decoded['status'] ?? ('HTTP ' . $code))
        : ('HTTP ' . $code);

    return ['ok' => $ok, 'detail' => substr($detail, 0, 250)];
}
