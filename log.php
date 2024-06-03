<?php
include 'DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id']; 
            $_SESSION['role'] = $row['role_id']; 
            $_SESSION['username'] = $row['username'];
            $_SESSION['fullname'] = $row['fullname'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Неверный логин или пароль.";
            header('Location: login.php?error=' . $error);
            exit();
        }
    } else {
        $error = "Неверный логин или пароль.";
        header('Location: login.php?error=' . $error);
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
