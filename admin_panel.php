<?php
include 'DB.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];

    $stmt = $db->prepare("DELETE FROM car WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: admin_panel.php');
        exit();
    } else {
        $error_delete = "Ошибка при удалении товара.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: admin_panel.php');
        exit();
    } else {
        $error_edit = "Ошибка при изменении пользователя.";
    }
}

$users_stmt = $db->query("SELECT * FROM users");
$users = $users_stmt->fetchAll(PDO::FETCH_ASSOC);

$products_stmt = $db->query("SELECT * FROM car");
$products = $products_stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h2>Добавить товар</h2> </div>
    <form action="add_product.php" method="post" class="form-cont">
        <input type="text" name="brand" placeholder="Бренд" required><br>
        <input type="number" name="year" placeholder="Год" required><br>
        <input type="number" name="price" placeholder="Цена" required><br>
        <input type="text" name="description" placeholder="Описание" required><br>
        <input type="text" name="image" placeholder="Ссылка на изображение" required><br>
        <button type="submit" name="add_product" class="">Добавить товар</button>
    </form>

    <?php if(isset($error_add)): ?>
        <div class="error"><?php echo $error_add; ?></div>
    <?php endif; ?>

    <div class=admin-text> <h2>Товары</h2> </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Бренд</th>
            <th>Описание</th>
            <th>Год</th>
            <th>Цена</th>
            <th>Изображение</th>
            <th>Действия</th>
        </tr>
        <?php foreach($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['brand']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['year']; ?></td>
                <td><?php echo $product['price']; ?> руб.</td>
                <td><?php echo $product['image']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $product['id']; ?>">Редактировать</a>
                    <a href="delete_product.php?id=<?php echo $product['id']; ?>">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class=admin-text> <h2>Добавить пользователя</h2></div>
    <form action="add_user.php" method="post" class="form-cont">
        <input type="text" name="username" placeholder="Логин" required><br>
        <input type="text" name="password" placeholder="Пароль" required><br>
        <input type="text" name="role" placeholder="Роль" required><br>
        <button type="submit" name="add_user" class="">Добавить пользователя</button>
    </form>

    <div class=admin-text>   <h2>Пользователи</h2></div>
    <table>
        <tr>
            <th>ID</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['role_id']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Редактировать</a>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
