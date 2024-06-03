<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    include 'DB.php';

  
    $FIO = $_POST['name'];
    $phone = $_POST['phone'];
    $car = $_POST['motorcycle'];
    $datetime = $_POST['datetime'];
    $license = $_POST['license'];

  
    $sql = "INSERT INTO zakaz (FIO, number, car, datetime, license) VALUES (:FIO, :phone, :car, :datetime, :license)";


    $stmt = $db->prepare($sql);
    $stmt->bindParam(':FIO', $FIO);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':car', $car);
    $stmt->bindParam(':datetime', $datetime);
    $stmt->bindParam(':license', $license);

    if ($stmt->execute()) {
      
        header("Location: success.php");
        exit(); 
    } else {
        echo "Ошибка при сохранении данных!";
    }
}
?>
