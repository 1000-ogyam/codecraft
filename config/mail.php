<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once dirname(__DIR__) . '/vendor/autoload.php';

function loadMailConfig(): array
{
    $local = __DIR__ . '/mail.local.php';
    if (is_file($local)) {
        return require $local;
    }

    return require __DIR__ . '/mail.local.php.example';
}

function mailConfigReady(array $cfg): bool
{
    $pass = (string) ($cfg['smtp_pass'] ?? '');
    if ($pass === '' || $pass === 'YOUR_SMTP_PASSWORD') {
        return false;
    }

    return !empty($cfg['smtp_host']) && !empty($cfg['to_email']);
}

function createMailer(array $cfg): PHPMailer
{
    $mail = new PHPMailer(true);
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->isSMTP();
    $mail->Host       = (string) $cfg['smtp_host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = (string) ($cfg['smtp_user'] ?? '');
    $mail->Password   = (string) ($cfg['smtp_pass'] ?? '');
    $mail->Port       = (int) ($cfg['smtp_port'] ?? 587);
    $mail->Timeout    = (int) ($cfg['smtp_timeout'] ?? 20);

    $secure = strtolower((string) ($cfg['smtp_secure'] ?? 'tls'));
    if ($secure === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($secure === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } else {
        $mail->SMTPSecure = '';
        $mail->SMTPAutoTLS = false;
    }

    // XAMPP/local Windows often lacks CA bundle — avoids hanging SSL handshake
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ],
    ];

    $mail->setFrom(
        (string) ($cfg['from_email'] ?? $cfg['to_email']),
        (string) ($cfg['from_name'] ?? 'CodeCraft Ghana')
    );

    return $mail;
}

function esc(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function buildFieldsTable(array $data, array $skip = []): string
{
    $skip = array_flip(array_merge(['form_type', '_subject', 'website'], $skip));
    $rows = '';

    foreach ($data as $key => $value) {
        if (isset($skip[$key]) || $value === '' || $value === null) {
            continue;
        }
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        $label = ucwords(str_replace('_', ' ', (string) $key));
        $rows .= '<tr><td style="padding:8px 12px;border:1px solid #e2e8f0;font-weight:600;background:#f7fafc;width:180px;">'
            . esc($label)
            . '</td><td style="padding:8px 12px;border:1px solid #e2e8f0;">'
            . nl2br(esc((string) $value))
            . '</td></tr>';
    }

    return $rows === ''
        ? '<tr><td colspan="2" style="padding:12px;">No details provided.</td></tr>'
        : $rows;
}

function subjectForFormType(string $formType, array $data): string
{
    if (!empty($data['_subject'])) {
        return (string) $data['_subject'];
    }

    $name = trim((string) ($data['name'] ?? ''));
    if ($name === '' && !empty($data['firstName'])) {
        $name = trim(($data['firstName'] ?? '') . ' ' . ($data['lastName'] ?? ''));
    }

    return match ($formType) {
        'consultation_booking'   => 'Consultation booking' . ($name !== '' ? " — {$name}" : ''),
        'partnership_application'=> 'Partnership application' . ($name !== '' ? " — {$name}" : ''),
        'contract_request'       => 'Contract request' . ($name !== '' ? " — {$name}" : ''),
        default                  => 'Website contact' . ($name !== '' ? " — {$name}" : ''),
    };
}

function sendFormEmail(array $data): void
{
    $cfg = loadMailConfig();
    if (!mailConfigReady($cfg)) {
        throw new RuntimeException(
            'Mail is not configured. Copy config/mail.local.php.example to config/mail.local.php and set SMTP credentials.'
        );
    }

    $formType = (string) ($data['form_type'] ?? 'contact');
    $allowed = ['contact', 'consultation_booking', 'partnership_application', 'contract_request'];
    if (!in_array($formType, $allowed, true)) {
        throw new InvalidArgumentException('Invalid form type.');
    }

    $email = filter_var(trim((string) ($data['email'] ?? '')), FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        throw new InvalidArgumentException('A valid email address is required.');
    }

    $subject = subjectForFormType($formType, $data);
    $body = '<div style="font-family:Segoe UI,Arial,sans-serif;color:#1a202c;max-width:640px;">'
        . '<h2 style="margin:0 0 16px;color:#2d3748;">' . esc($subject) . '</h2>'
        . '<p style="margin:0 0 16px;color:#4a5568;">Submitted from the CodeCraft Ghana website.</p>'
        . '<table style="border-collapse:collapse;width:100%;font-size:14px;">'
        . buildFieldsTable($data)
        . '</table></div>';

    $mail = createMailer($cfg);
    $mail->addAddress((string) $cfg['to_email'], (string) ($cfg['to_name'] ?? ''));
    $mail->addReplyTo($email, (string) ($data['name'] ?? $email));
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $body));

    $mail->send();
}
