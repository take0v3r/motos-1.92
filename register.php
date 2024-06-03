<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'DB.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Пароли не совпадают.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $role_id = 2;
        $stmt = $db->prepare("INSERT INTO users (username, password, role_id) VALUES (:username, :password, :role_id)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);

        $stmt->execute();
        header('Location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bellota:wght@300&family=Montserrat:wght@300&display=swap');
        .et-hero-tabs-container {
            display: flex;
            align-items: center;
        }
        .et-hero-tab img {
            vertical-align: middle;
            margin-right: 10px; 
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .container {
            margin-top: 20px;
        }
        .button__text {
            display: inline-block;
            margin-right: 10px;
            font-size: 14px; 
            padding: 8px 15px; 
            background-color: white; 
            color: black; 
            border: 2px solid black; 
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s; 
        }
        .button__text:hover {
            background-color: black; 
            color: white; 
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
    <h1>Регистрация</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<p>Вы уже зарегистрированы. Если нужно, вы можете <a href="login.php">войти</a>.</p>';
    } else {
        echo '<form action="register.php" method="post">
                <div class="form-group">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Подтвердите пароль:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit">Зарегистрироваться</button>
             </form>';
    }
    ?>
    <div class="container">
        <a class="button__text" href="login.php">Есть аккаунт? Войти.</a>
        <a class="button__text" href="logout.php">Выйти из аккаунта.</a>
    </div>
</div>
</body>
</html>