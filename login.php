<?php
session_start();
include 'DB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password, role_id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role_id']; 
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
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
    <h1>Вход</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<p>Вы уже вошли в систему. Если нужно, вы можете <a href="logout.php">выйти</a>.</p>';
    } else {
        echo '<form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Войти</button>
             </form>';
        if (isset($error)) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }
    }
    ?>
    <div class="container">
        <a class="button__text" href="register.php">Нет аккаунта? Зарегистрируйтесь.</a>
    </div>
</div>
</body>
</html>
