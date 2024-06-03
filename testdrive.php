<?php
session_start();
include 'DB.php';
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
        
        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label, input, select {
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
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
<div class = "dtext">
<p class="ptext">
<strong>Правила Тест-Драйва Мотоцикла</strong> <br>

<strong><br>1. Условия Тест-Драйва:</strong> <br>
<br><br>
Тест-драйв доступен только для совершеннолетних лиц, обладающих соответствующим мотоциклетным водительским удостоверением.<br><br>
<strong><br>2. Заполнение Заявки:</strong><br>
<br><br>
Заполните онлайн-форму для записи на тест-драйв.
Пожалуйста, укажите ваше имя, фамилию, номер телефона и адрес электронной почты в форме.<br><br>
<strong><br>3. Выбор Мотоцикла:</strong><br>
<br><br>
Выберите модель мотоцикла, который вы хотели бы протестировать.<br><br>
<strong><br>4. Условия Использования:</strong><br>
<br><br>
Перед началом тест-драйва ознакомьтесь с условиями и требованиями, включая правила безопасности и страховку.<br><br>
<strong><br>5. Подтверждение Записи:</strong><br>
<br><br>
После отправки вашей заявки, вы получите подтверждение на указанный адрес электронной почты с информацией о дате, времени и месте тест-драйва.<br><br>
<strong><br>6. Ответственность:</strong><br>
<br><br>
Пожалуйста, помните, что вы несете ответственность за сохранность мотоцикла во время тест-драйва, и в случае повреждения, вы можете быть обязаны возместить ущерб.<br><br>
<strong><br>7. Отказ от Ответственности:</strong><br>
<br><br>
Компания не несет ответственности за любые несчастные случаи или травмы, произошедшие во время тест-драйва.<br><br>
<strong><br>8. Отзывы и Рейтинги:</strong><br>
<br><br>
По окончании тест-драйва, мы будем рады, если вы оставите свой отзыв и рейтинг на нашем сайте или в социальных сетях.<br><br>
<strong><br>9. Контактная Информация:</strong><br>
<br><br>
Если у вас есть какие-либо вопросы или нужна дополнительная информация, пожалуйста, свяжитесь с нами по указанным контактным данным.<br><br>
<strong><br>10. Политика Конфиденциальности:</strong><br>
<br><br>
Ваши личные данные будут обработаны в соответствии с нашей политикой конфиденциальности.<br><br>
<strong><br>11. Правила Отмены:</strong><br>
<br><br>
Условия отмены и возможности переноса даты тест-драйва указаны в наших правилах.<br><br>
<strong><br>12. Проведение Тест-Драйва:</strong><br>
<br><br>
Мы организуем процесс тест-драйва, включая предоставление мотоцикла, инструктаж по безопасности и сопровождение.<br><br>
<strong><br>13. После Тест-Драйва:</strong><br>
<br><br>
После тест-драйва наш менеджер свяжется с вами, чтобы узнать ваши впечатления и предложить дополнительную информацию о нашей продукции.<br><br>
<strong><br>14. Сбор Обратной Связи:</strong><br>
<br><br>
Ваш отзыв о мотоцикле и опыте тест-драйва очень важен для нас и поможет нам улучшить наши услуги.<br><br>
<strong><br>15. Реклама и Маркетинг:</strong><br>
<br><br>
Мы активно продвигаем программу тест-драйва на нашем сайте и в социальных сетях, чтобы предоставить вам ещё больше возможностей.<br><br>
<strong><br>16. Предоставление экипировки:</strong><br>
<br><br>
Каждые клиент может использовать либо свою экипировку либо экипировку предоставленную мотосалоном.<br><br>
</p> 
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af49a4eb1861204fd5dab3e90d25c4e130d2e20467cef13798e9062a1b87ba684&amp;source=constructor" width="1032" height="400" frameborder="0"></iframe>
    <h1>Форма для Тест-драйва мотоцикла</h1>
    <form onsubmit="checkAuthorization(event)" action="submit_testdrive.php" method="POST">
        <label for="fio">ФИО:</label>
        <input type="text" id="fio" name="fio" required>

        <label for="date">Дата тест-драйва:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Выберите время тест-драйва (с 9:00 до 21:00 в Иркутском часовом поясе):</label>
        <input type="time" id="time" name="time" min="09:00" max="21:00" required>

        <label for="license">Номер водительского удостоверения:</label>
        <input type="text" id="license" name="license" required>

        <label for="phone">Номер телефона:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="model">Модель мотоцикла:</label>
        <select id="model" name="model" required>
            <?php

            $stmt = $db->query("SELECT * FROM car");
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($cars as $car) {
                echo '<option value="' . htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($car['brand'], ENT_QUOTES, 'UTF-8') . '</option>';
            }
            ?>
        </select>
        <button type="submit">Отправить заявку</button>
    </form>
</div>

<script>
    function checkAuthorization(event) {
        <?php if (!isset($_SESSION['username'])): ?>
        event.preventDefault();
        alert("Пожалуйста, авторизуйтесь или зарегистрируйтесь, чтобы оставить заявку на тест-драйв.");
        <?php endif; ?>
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        const selectedDate = new Date(document.getElementById('date').value);
        const selectedTime = document.getElementById('time').value;
        const currentTime = new Date();

        const currentHours = currentTime.getHours().toString().padStart(2, '0');
        const currentMinutes = currentTime.getMinutes().toString().padStart(2, '0');
        const currentTimeFormatted = `${currentHours}:${currentMinutes}`;

        if (selectedDate < currentTime) {
            event.preventDefault();
            alert('Выберите будущую дату для тест-драйва.');
        } else if (selectedDate.getTime() === currentTime.getTime() && selectedTime < currentTimeFormatted) {
            event.preventDefault();
            alert('Выберите будущее время для тест-драйва.');
        }
    });
</script>
</body>
</html>
