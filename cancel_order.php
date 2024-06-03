<?php
include 'DB.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $db->prepare("UPDATE zakaz SET status = 'Отменен пользователем' WHERE id = ? AND user_id = ?");
    $stmt->execute([$order_id, $user_id]);


    if ($stmt->rowCount() > 0) {

        header('Location: track_orders.php');
        exit();
    } else {

        echo "Ошибка: Заказ не найден или не может быть отменен.";
        exit();
    }
} else {
    echo "Ошибка: Некорректный запрос.";
    exit();
}
?>
