<?php
session_start();
include 'DB.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$date = $_POST['date'];
$time = $_POST['time'];
$license = $_POST['license'];
$phone = $_POST['phone'];
$model = $_POST['model'];
$fio = $_POST['fio'];

$datetime = $date . ' ' . $time . ':00';

$stmt = $db->prepare("INSERT INTO zakaz (FIO, car, license, datetime, number, status, user_id) VALUES (?, ?, ?, ?, ?, 'В ожидании', ?)");
$stmt->execute([$fio, $model, $license, $datetime, $phone, $user_id]);

header('Location: track_orders.php');
exit();
?>
