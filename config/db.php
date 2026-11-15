<?php

declare(strict_types=1);

function loadDbConfig(): array
{
    $local = __DIR__ . '/db.local.php';
    if (is_file($local)) {
        $cfg = require $local;
        return is_array($cfg) ? $cfg : [];
    }
    $example = __DIR__ . '/db.local.php.example';
    $cfg = is_file($example) ? require $example : [];
    return is_array($cfg) ? $cfg : [];
}

function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $cfg = loadDbConfig();
    $host = (string) ($cfg['host'] ?? '127.0.0.1');
    $port = (int) ($cfg['port'] ?? 3306);
    $name = (string) ($cfg['name'] ?? 'codecraft');
    $user = (string) ($cfg['user'] ?? 'root');
    $pass = (string) ($cfg['pass'] ?? '');

    $server = new PDO(
        "mysql:host={$host};port={$port};charset=utf8mb4",
        $user,
        $pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $server->exec(
        'CREATE DATABASE IF NOT EXISTS `' . str_replace('`', '', $name) . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci'
    );

    $pdo = new PDO(
        "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS bookings (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            created_at DATETIME NOT NULL,
            name VARCHAR(160) NOT NULL,
            email VARCHAR(190) NOT NULL,
            phone VARCHAR(40) NOT NULL DEFAULT \'\',
            track VARCHAR(80) NOT NULL DEFAULT \'\',
            offer VARCHAR(190) NOT NULL DEFAULT \'\',
            school VARCHAR(190) NULL,
            role_title VARCHAR(190) NULL,
            business VARCHAR(190) NULL,
            note TEXT NULL,
            period_label VARCHAR(80) NULL,
            amount VARCHAR(40) NULL,
            payment VARCHAR(40) NULL,
            payment_reference VARCHAR(80) NULL,
            seats_left VARCHAR(40) NULL,
            sms_status VARCHAR(40) NOT NULL DEFAULT \'pending\',
            sms_detail VARCHAR(255) NULL,
            INDEX idx_created (created_at),
            INDEX idx_track (track)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    return $pdo;
}
