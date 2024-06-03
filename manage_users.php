<?php
session_start();

if ($_SESSION['role'] !== 'Admin') {
    header('Location: unauthorized.php'); 
    exit();
}

include 'DB.php';

$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление Пользователями</title>
    <link rel="icon" href="favicon.png">
</head>
<body>
    <h1>Управление Пользователями</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>FIO</th>
            <th>email</th>
            <th>Role</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['FIO'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
