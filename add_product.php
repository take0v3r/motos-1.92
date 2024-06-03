<?php
include 'DB.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("INSERT INTO car (brand, year, price, description, image) VALUES (:brand, :year, :price, :description, :image)");
    $stmt->execute([
        ':brand' => $_POST['brand'],
        ':year' => $_POST['year'],
        ':price' => $_POST['price'],
        ':description' => $_POST['description'],
        ':image' => $_POST['image']
    ]);

    header('Location: admin_panel.php');
    exit();
}
?>
