<?php

declare(strict_types=1);

const SEAT_CAPACITY = 4;

function seatStorePath(): string
{
    return dirname(__DIR__) . '/data/seats.json';
}

function seatNow(): DateTimeImmutable
{
    return new DateTimeImmutable('now', new DateTimeZone('Africa/Accra'));
}

function seatTracks(): array
{
    return [
        'students' => 'week',
        'it' => 'week',
        'business' => 'weekend',
    ];
}

function seatPeriodStart(string $track, DateTimeImmutable $now): DateTimeImmutable
{
    $day = $now->setTime(0, 0);
    $weekday = (int) $day->format('N');
    if (seatTracks()[$track] === 'weekend') {
        if ($weekday === 7) {
            return $day->modify('-1 day');
        }
        if ($weekday < 6) {
            return $day->modify('+' . (6 - $weekday) . ' days');
        }
        return $day;
    }

    if ($weekday === 7) {
        return $day->modify('+1 day');
    }
    return $weekday === 1 ? $day : $day->modify('-' . ($weekday - 1) . ' days');
}

function seatPeriodLabel(string $track, DateTimeImmutable $start): string
{
    $when = $start->format('j M Y');
    return seatTracks()[$track] === 'weekend' ? "weekend of {$when}" : "week of {$when}";
}

function seatSnapshot(string $track, array $store, ?DateTimeImmutable $now = null): array
{
    $now = $now ?? seatNow();
    $start = seatPeriodStart($track, $now);
    $next = $start->modify('+7 days');
    $key = $start->format('Y-m-d');
    $booked = (int) ($store[$track][$key]['inPerson'] ?? 0);
    if ($booked < 0) {
        $booked = 0;
    }
    $left = max(0, SEAT_CAPACITY - $booked);

    return [
        'ok' => true,
        'track' => $track,
        'unit' => seatTracks()[$track],
        'period' => $key,
        'periodLabel' => seatPeriodLabel($track, $start),
        'nextPeriod' => $next->format('Y-m-d'),
        'nextPeriodLabel' => seatPeriodLabel($track, $next),
        'capacity' => SEAT_CAPACITY,
        'booked' => $booked,
        'left' => $left,
        'full' => $left === 0,
    ];
}

function seatFullMessage(array $snapshot): string
{
    $unit = $snapshot['unit'] === 'weekend' ? 'weekend' : 'week';

    return "In-person seats for this {$unit} are full. Wait for the {$snapshot['nextPeriodLabel']}.";
}

function withSeatStore(callable $change): array
{
    $dir = dirname(seatStorePath());
    if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
        throw new RuntimeException('Seat count could not be saved.');
    }

    $fp = fopen(seatStorePath(), 'c+');
    if ($fp === false) {
        throw new RuntimeException('Seat count could not be saved.');
    }

    try {
        if (!flock($fp, LOCK_EX)) {
            throw new RuntimeException('Seat count could not be saved.');
        }
        $raw = stream_get_contents($fp);
        $store = json_decode(is_string($raw) ? $raw : '', true);
        if (!is_array($store)) {
            $store = [];
        }
        $result = $change($store);
        rewind($fp);
        ftruncate($fp, 0);
        fwrite($fp, json_encode($store, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        fflush($fp);
        return $result;
    } finally {
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}

function readSeatStore(): array
{
    $raw = @file_get_contents(seatStorePath());
    $store = json_decode(is_string($raw) ? $raw : '', true);
    return is_array($store) ? $store : [];
}

function bookInPersonSeat(string $track): array
{
    return withSeatStore(static function (array &$store) use ($track): array {
        $snapshot = seatSnapshot($track, $store);
        if ($snapshot['full']) {
            $snapshot['ok'] = false;
            $snapshot['error'] = seatFullMessage($snapshot);
            return $snapshot;
        }
        $store[$track][$snapshot['period']]['inPerson'] = $snapshot['booked'] + 1;
        $snapshot = seatSnapshot($track, $store);
        $snapshot['held'] = true;
        return $snapshot;
    });
}
