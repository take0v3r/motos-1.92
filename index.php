<?php
include 'DB.php';
session_start();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM car";

if (!empty($keyword)) {
    $sql .= " WHERE brand LIKE :keyword OR description LIKE :keyword";
}

if ($sort === 'price_asc') {
    $sql .= " ORDER BY CAST(price AS DECIMAL(10,2)) ASC";
} elseif ($sort === 'price_desc') {
    $sql .= " ORDER BY CAST(price AS DECIMAL(10,2)) DESC";
}

$stmt = $db->prepare($sql);

if (!empty($keyword)) {
    $stmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
}

$stmt->execute();
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
        .et-hero-tabs-container {
            display: flex;
            align-items: center;
        }
        .et-hero-tab img {
            vertical-align: middle;
            margin-right:
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

<div class="search">
    <form action="index.php" method="get">
        <input type="text" name="keyword" placeholder="Поиск..." value="<?php echo htmlspecialchars($keyword); ?>">
        <select name="sort" class="sort-button">
            <option value="">Сортировать по</option>
            <option value="price_asc" <?php if ($sort === 'price_asc') echo 'selected'; ?>>Цена: по возрастанию</option>
            <option value="price_desc" <?php if ($sort === 'price_desc') echo 'selected'; ?>>Цена: по убыванию</option>
        </select>
        <button type="submit">Поиск</button>
        <?php if (!empty($keyword)): ?>
            <button type="button" class="reset-button" onclick="window.location.href='index.php'">Сбросить</button>
        <?php endif; ?>
    </form>
</div>

<div class="card-container">
    <div class="content">
        <div class="card-container">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $price = floatval(str_replace(' ', '', $row['price']));
                $formatted_price = number_format($price, 0, ',', ' ') . ' ₽';
                echo '<div class="card">
                    <div class="card-image-container">
                        <a href="product_detail.php?id=' . $row['id'] . '">
                            <img src="' . $row['image'] . '" alt="' . $row['brand'] . '">
                        </a>
                    </div>
                    <a href="product_detail.php?id=' . $row['id'] . '">
                        <h3>' . $row['brand'] . '</h3>
                    </a>
                    <p>' . $formatted_price . '</p>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
