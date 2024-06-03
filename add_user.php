<?php
include 'DB.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newRole = $_POST['role'];

    $stmt = $db->prepare("INSERT INTO users (username, password,  role_id) VALUES (:username, :password, :role_id)");
    $stmt->bindParam(':username', $newUsername);
    $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
    $stmt->bindParam(':role_id', $newRole);
    $stmt->execute();

    header('Location: admin_panel.php');
    exit();
}
?>

