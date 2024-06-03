<?php
session_start();
include 'DB.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $db->prepare("SELECT * FROM zakaz WHERE user_id = ?");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MotoMania - Ваши заявки на тест-драйв</title>
    <link rel="icon" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap');
        table {
            font-family: 'Calibri', sans-serif;
            font-size: 18px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .rejected {
            background-color: rgba(255, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<div class="header">
<section class="et-hero-tabs">
        <div class="et-hero-tabs-container">
            <a class="et-hero-tab" href="index.php">Каталог</a>
            <a class="et-hero-tab" href="about.php">О компании</a>
            <a class="et-hero-tab" href="testdrive.php">Тест-драйв</a>
            <a class="et-hero-tab" href="register.php">Аккаунт</a>

            <?php if (isset($_SESSION['role'])): ?>
                <?php if ($_SESSION['role'] === 1): ?>
                    <a class="et-hero-tab" href="admin_panel.php">Админ</a>
                    <a class="et-hero-tab" href="orders.php">Заявки</a>
                <?php elseif ($_SESSION['role'] === 2): ?>
                    <a class="et-hero-tab" href="track_orders.php">Отслеживание заявок</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</div>
<div class="dtext">
    <h1>Ваши заявки на тест-драйв.</h1>
    <?php if (count($orders) > 0): ?>
        <table>
            <tr>
                <th>ФИО</th>
                <th>Мотоцикл</th>
                <th>Дата и время</th>
                <th>Номер В/У</th>
                <th>Номер телефона</th>
                <th>Статус заявки</th>
                <th>Действие</th>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr <?php if ($order['status'] == 'отклонена') echo 'class="rejected"'; ?>>
                    <td><?= htmlspecialchars($order['FIO'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($order['car'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= date("Y-m-d H:i", strtotime($order['datetime'])) ?></td>
                    <td><?= htmlspecialchars($order['license'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($order['number'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($order['status'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <?php if ($order['status'] !== 'Отменен пользователем'): ?>
                            <form id="cancelForm<?= $order['id'] ?>" method="post" action="cancel_order.php">
                                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                <button type="button" onclick="confirmCancellation(<?= $order['id'] ?>)">Отменить</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>У вас нет активных заявок.</p>
    <?php endif; ?>
</div>
<script>
    function confirmCancellation(orderId) {
        var confirmation = confirm("Вы уверены, что хотите отменить этот заказ?");
        if (confirmation) {
            document.getElementById("cancelForm" + orderId).submit();
        }
    }
</script>
</body>
</html>
