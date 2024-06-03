<?php
include 'DB.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 1) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $newBrand = $_POST['brand'];
    $newDescription = $_POST['description'];
    $newYear = $_POST['year'];
    $newPrice = $_POST['price'];
    $newImage = $_POST['image']; 

    $stmt = $db->prepare("UPDATE car SET brand = :brand, description = :description, year = :year, price = :price, image = :image WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':brand', $newBrand);
    $stmt->bindParam(':description', $newDescription);
    $stmt->bindParam(':year', $newYear);
    $stmt->bindParam(':price', $newPrice);
    $stmt->bindParam(':image', $newImage);
    $stmt->execute();

    header('Location: admin_panel.php'); 
    exit();
}

$product = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM car WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Редактирование товара</title>
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
    <form action="edit_product.php" method="post" class="form-cont">
        <h1>Редактирование товара</h1>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        Название: <input type="name" name="brand" value="<?php echo $product['brand']; ?>"><br>
        Описание: <input type="name" name="description" value="<?php echo $product['description']; ?>"><br>
        Год: <input type="number" name="year" value="<?php echo $product['year']; ?>"><br>
        Цена: <input type="number" name="price" value="<?php echo $product['price']; ?>"><br>
        Изображение: <input type="name" name="image" value="<?php echo $product['image']; ?>"><br>
        <input type="submit" value="Применить">
    </form>
</body>
</html>
