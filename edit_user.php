<?php
include 'DB.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit();
}
$user = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $newUsername = $_POST['username'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newRole = $_POST['role'];

    $stmt = $db->prepare("UPDATE users SET username = :username, password = :password, role_id = :role_id WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
    $stmt->bindParam(':role_id', $newRole);
    $stmt->execute();

    header('Location: admin_panel.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Редактирование пользователя</title>
</head>
<body>
<div class="navbar">
        <?php
            echo '<a href="index.php">Главная</a>';
            
            if(isset($_SESSION['username'])){
                if($_SESSION['role'] === 1){
                    echo '<a href="admin_panel.php">Админ-панель</a>';
                }
                echo '<span>' . $_SESSION['fullname'] . '</span>';
                echo '<a href="logout.php">Выйти</a>';
            }else{
                echo '<a href="login.php">Авторизация</a>';
            }
        ?>
    </div>
<h1>Редактирование пользователя</h1>
<form action="edit_user.php" method="post" class="form-cont">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    Логин: <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
    Пароль: <input type="password" name="password" value="<?php echo $user['password']; ?>"><br>
    Роль: <input type="text" name="role" value="<?php echo $user['role_id']; ?>"><br>
    <input type="submit" value="Применить">
</form>
</body>
</html>
