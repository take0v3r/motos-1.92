<?php
session_start();

if ($_SESSION['role'] !== 'Admin') {
    header('Location: unauthorized.php');
    exit();
}

include 'DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $stmt = $db->prepare("INSERT INTO car (id, name, year, price, description, image) VALUES (:id, :name, :year, :price, :description, :image)");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление Товарами</title>
    <link rel="icon" href="favicon.png">
</head>
<body>
    <h1>Управление Товарами</h1>

    <form method="post">
        <input type="text" name="name" placeholder="Название автомобиля" required><br>
        <input type="text" name="description" placeholder="Описание" required><br>
        <input type="number" name="price" placeholder="Цена" required><br>
        <input type="text" name="image" placeholder="Ссылка на изображение" required><br>
        <input type="submit" value="Добавить товар">
    </form>
</body>
</html>
