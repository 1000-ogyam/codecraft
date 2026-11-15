<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/sms.php';

function bookingOfferKind(string $offer): string
{
    if (str_starts_with($offer, 'In person')) {
        return 'in_person';
    }
    if (str_starts_with($offer, 'Online')) {
        return 'online';
    }
    return '';
}

function saveBooking(array $data): int
{
    $stmt = db()->prepare(
        'INSERT INTO bookings
        (created_at, name, email, phone, track, offer, school, role_title, business, note, period_label, amount, payment, payment_reference, seats_left, sms_status)
        VALUES (NOW(), :name, :email, :phone, :track, :offer, :school, :role_title, :business, :note, :period_label, :amount, :payment, :payment_reference, :seats_left, :sms_status)'
    );
    $stmt->execute([
        'name' => trim((string) ($data['name'] ?? '')),
        'email' => trim((string) ($data['email'] ?? '')),
        'phone' => trim((string) ($data['phone'] ?? '')),
        'track' => trim((string) ($data['track'] ?? '')),
        'offer' => trim((string) ($data['offer'] ?? '')),
        'school' => trim((string) ($data['school'] ?? '')) ?: null,
        'role_title' => trim((string) ($data['role'] ?? '')) ?: null,
        'business' => trim((string) ($data['business'] ?? '')) ?: null,
        'note' => trim((string) ($data['note'] ?? '')) ?: null,
        'period_label' => trim((string) ($data['period'] ?? '')) ?: null,
        'amount' => trim((string) ($data['amount'] ?? '')) ?: null,
        'payment' => trim((string) ($data['payment'] ?? '')) ?: null,
        'payment_reference' => trim((string) ($data['payment_reference'] ?? '')) ?: null,
        'seats_left' => trim((string) ($data['seats_left'] ?? '')) ?: null,
        'sms_status' => 'pending',
    ]);

    return (int) db()->lastInsertId();
}

function markBookingSms(int $id, array $result): void
{
    $stmt = db()->prepare('UPDATE bookings SET sms_status = :status, sms_detail = :detail WHERE id = :id');
    $stmt->execute([
        'status' => !empty($result['ok']) ? 'sent' : 'failed',
        'detail' => (string) ($result['detail'] ?? ''),
        'id' => $id,
    ]);
}

function recordBookedSeat(array $data): void
{
    if (bookingOfferKind((string) ($data['offer'] ?? '')) === '') {
        return;
    }
    $id = saveBooking($data);
    $result = sendArkeselSms((string) ($data['phone'] ?? ''), bookingSmsMessage($data));
    markBookingSms($id, $result);
}
