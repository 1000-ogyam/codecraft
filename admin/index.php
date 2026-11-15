<?php

declare(strict_types=1);

session_start();

require_once dirname(__DIR__) . '/config/db.php';
require_once dirname(__DIR__) . '/config/seats.php';

function adminConfig(): array
{
    $local = dirname(__DIR__) . '/config/admin.local.php';
    $cfg = is_file($local) ? require $local : [];
    return is_array($cfg) ? $cfg : [];
}

function adminLoggedIn(): bool
{
    return !empty($_SESSION['codecraft_admin']);
}

$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
    $cfg = adminConfig();
    $user = (string) ($cfg['username'] ?? '');
    $pass = (string) ($cfg['password'] ?? '');
    $givenUser = (string) ($_POST['username'] ?? '');
    $givenPass = (string) ($_POST['password'] ?? '');
    $userOk = $user !== '' && strlen($givenUser) === strlen($user) && hash_equals($user, $givenUser);
    $passOk = $pass !== '' && strlen($givenPass) === strlen($pass) && hash_equals($pass, $givenPass);
    if ($userOk && $passOk) {
        session_regenerate_id(true);
        $_SESSION['codecraft_admin'] = $user;
        header('Location: index.php');
        exit;
    }
    $loginError = 'Those details do not match.';
}

$dbError = '';
$rows = [];
$summary = ['bookings' => 0, 'sms_sent' => 0, 'sms_failed' => 0];
$seatLines = [];
if (adminLoggedIn()) {
    try {
        $pdo = db();
        $summary['bookings'] = (int) $pdo->query('SELECT COUNT(*) FROM bookings')->fetchColumn();
        $summary['sms_sent'] = (int) $pdo->query("SELECT COUNT(*) FROM bookings WHERE sms_status = 'sent'")->fetchColumn();
        $summary['sms_failed'] = (int) $pdo->query("SELECT COUNT(*) FROM bookings WHERE sms_status = 'failed'")->fetchColumn();
        $rows = $pdo->query('SELECT * FROM bookings ORDER BY id DESC LIMIT 200')->fetchAll();
        $store = readSeatStore();
        foreach (seatTracks() as $track => $unit) {
            $snap = seatSnapshot($track, $store);
            $seatLines[] = $snap;
        }
    } catch (Throwable $e) {
        $dbError = 'The booking database is not reachable. Start MySQL in XAMPP, then reload this page.';
    }
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bookings | CodeCraft</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <link rel="icon" type="image/svg+xml" href="../favicon.svg">
  <link rel="stylesheet" href="../styles.css?v=11">
  <style>
    body { background: var(--offwhite); }
    .admin-wrap { max-width: 1180px; margin: 0 auto; padding: 2rem 1.2rem 4rem; }
    .admin-top { display: flex; justify-content: space-between; gap: 1rem; align-items: center; margin-bottom: 1.4rem; }
    .admin-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.8rem; margin-bottom: 1.2rem; }
    .admin-table-wrap { overflow-x: auto; background: #fff; border: 1px solid var(--gray-200); border-radius: 16px; }
    table.admin { width: 100%; border-collapse: collapse; font-size: 0.92rem; }
    table.admin th, table.admin td { text-align: left; padding: 0.75rem 0.8rem; border-bottom: 1px solid var(--gray-200); vertical-align: top; }
    table.admin th { font-size: 0.75rem; letter-spacing: 0.06em; text-transform: uppercase; color: var(--gray-600); }
    .sms-sent { color: #0d7a45; font-weight: 700; }
    .sms-failed, .sms-pending { color: #9a3412; font-weight: 700; }
    .login-card { max-width: 420px; margin: 8vh auto; }
    @media (max-width: 800px) { .admin-cards { grid-template-columns: 1fr; } }
  </style>
</head>
<body>
<?php if (!adminLoggedIn()): ?>
  <form class="mentor-form login-card" method="post">
    <h1>Booking desk</h1>
    <p class="note">CodeCraft staff only.</p>
    <?php if ($loginError !== ''): ?><p class="note"><?= h($loginError) ?></p><?php endif; ?>
    <input type="hidden" name="action" value="login">
    <input type="text" name="username" placeholder="Username" autocomplete="username" required>
    <input type="password" name="password" placeholder="Password" autocomplete="current-password" required>
    <button class="btn btn-primary" type="submit">Sign in</button>
  </form>
<?php else: ?>
  <div class="admin-wrap">
    <div class="admin-top">
      <div>
        <span class="section-label">Admin</span>
        <h1>Bookings</h1>
      </div>
      <a class="btn btn-outline btn-sm" href="logout.php">Sign out</a>
    </div>
    <?php if ($dbError !== ''): ?>
      <p class="note"><?= h($dbError) ?></p>
    <?php else: ?>
      <div class="admin-cards">
        <article class="mentor-fact"><span>Bookings</span><strong><?= (int) $summary['bookings'] ?></strong></article>
        <article class="mentor-fact"><span>SMS sent</span><strong><?= (int) $summary['sms_sent'] ?></strong></article>
        <article class="mentor-fact"><span>SMS failed</span><strong><?= (int) $summary['sms_failed'] ?></strong></article>
      </div>
      <div class="mentor-fees" style="margin-bottom:1.2rem">
        <?php foreach ($seatLines as $line): ?>
          <article class="mentor-fee">
            <span><?= h($line['track']) ?> · in person</span>
            <strong><?= (int) $line['left'] ?> left</strong>
            <p><?= (int) $line['booked'] ?> of <?= (int) $line['capacity'] ?> booked for the <?= h($line['periodLabel']) ?>.</p>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="admin-table-wrap">
        <table class="admin">
          <thead>
            <tr>
              <th>When</th>
              <th>Person</th>
              <th>Course</th>
              <th>Seat</th>
              <th>Payment</th>
              <th>SMS</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($rows === []): ?>
            <tr><td colspan="6">No online or in-person bookings yet.</td></tr>
          <?php endif; ?>
          <?php foreach ($rows as $row): ?>
            <tr>
              <td><?= h((string) $row['created_at']) ?></td>
              <td>
                <?= h((string) $row['name']) ?><br>
                <?= h((string) $row['phone']) ?><br>
                <?= h((string) $row['email']) ?>
                <?php if (!empty($row['school'])): ?><br><?= h((string) $row['school']) ?><?php endif; ?>
                <?php if (!empty($row['role_title'])): ?><br><?= h((string) $row['role_title']) ?><?php endif; ?>
                <?php if (!empty($row['business'])): ?><br><?= h((string) $row['business']) ?><?php endif; ?>
              </td>
              <td><?= h((string) $row['track']) ?></td>
              <td>
                <?= h((string) $row['offer']) ?>
                <?php if (!empty($row['period_label'])): ?><br><?= h((string) $row['period_label']) ?><?php endif; ?>
                <?php if (!empty($row['note'])): ?><br><?= h((string) $row['note']) ?><?php endif; ?>
              </td>
              <td>
                <?= h((string) ($row['payment'] ?? '')) ?>
                <?php if (!empty($row['amount'])): ?><br><?= h((string) $row['amount']) ?><?php endif; ?>
                <?php if (!empty($row['payment_reference'])): ?><br><?= h((string) $row['payment_reference']) ?><?php endif; ?>
              </td>
              <td class="sms-<?= h((string) $row['sms_status']) ?>">
                <?= h((string) $row['sms_status']) ?>
                <?php if (!empty($row['sms_detail'])): ?><br><span style="font-weight:400;color:var(--gray-600)"><?= h((string) $row['sms_detail']) ?></span><?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
</body>
</html>
