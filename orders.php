<?php
session_start();
include 'DB.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    $sql = "UPDATE zakaz SET status = :status, comments = :comments WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':comments', $comments);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Получение всех заявок
$sql = "SELECT * FROM zakaz";
$stmt = $db->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MotoMania</title>
    <link rel="icon" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap');
    </style>
    <style>
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
<div class=admin-text>
    <h1>Управление заявками</h1>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Мотоцикл</th>
        <th>Дата и время</th>
        <th>Номер В/У</th>
        <th>Телефон</th>
        <th>Статус</th>
        <th>Комментарий администратора</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr <?php if ($order['status'] == 'отклонена') echo 'style="background-color: rgba(255, 0, 0, 0.5);"'; ?>>
            <td><?php echo htmlspecialchars($order['id']); ?></td>
            <td><?php echo htmlspecialchars($order['FIO']); ?></td>
            <td><?php echo htmlspecialchars($order['car']); ?></td>
            <td><?php echo date('Y-m-d H:i:s', strtotime($order['datetime'])); ?></td>
            <td><?php echo htmlspecialchars($order['license']); ?></td>
            <td><?php echo htmlspecialchars($order['number']); ?></td>
            <td><?php echo htmlspecialchars($order['status']); ?></td>
            <td><?php echo htmlspecialchars($order['comments']); ?></td>
            <td>
                <div class="button-container">
                    <form action="orders.php" method="post" class="action-form">
                        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                        <select name="status">
                            <option value="ожидание" <?php if ($order['status'] == 'Ожидание') echo 'selected'; ?>>Ожидание</option>
                            <option value="принята" <?php if ($order['status'] == 'Одобрена') echo 'selected'; ?>>Одобрена</option>
                            <option value="отклонена" <?php if ($order['status'] == 'Отклонена') echo 'selected'; ?>>Отклонена</option>
                        </select>
                        <input type="text" name="comments" value="<?php echo htmlspecialchars($order['comments']); ?>" placeholder="Комментарий">
                        <button type="submit">Обновить</button>
                    </form>
                    <form action="delete_order.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                        <button type="submit" class="delete-button">Удалить</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
