<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once dirname(__DIR__) . '/config/seats.php';

function seatTrackFromRequest(string $track): string
{
    $track = strtolower(trim($track));
    if (!isset(seatTracks()[$track])) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'error' => 'Unknown course.']);
        exit;
    }
    return $track;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $track = seatTrackFromRequest((string) ($_GET['track'] ?? ''));
    echo json_encode(seatSnapshot($track, readSeatStore()));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed.']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid JSON payload.']);
    exit;
}

$track = seatTrackFromRequest((string) ($data['track'] ?? ''));
if (($data['action'] ?? '') !== 'book') {
    echo json_encode(seatSnapshot($track, readSeatStore()));
    exit;
}

$result = bookInPersonSeat($track);
if (empty($result['ok'])) {
    http_response_code(409);
}
echo json_encode($result);
