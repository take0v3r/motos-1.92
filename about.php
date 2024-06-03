
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
</style>
</head> <body>
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
<strong>О нас: </strong> <br> <br>
<strong>MotoMania</strong> - это бренд, который пропитан адреналином и духом свободы. Наша компания основана на страсти к мотоциклам и стремлении поделиться этой страстью с миром. Мы предлагаем широкий ассортимент мотоциклов, включая как новые модели современных брендов, так и качественные бывшие в употреблении мотоциклы, предоставляя всем возможность испытать непередаваемые ощущения свободы на двух колесах.
<br> <br>
<strong>Наши ценности:</strong>
<br> <br>
<strong>1. </strong>Страсть к мотоциклам: Мотоциклы - это не просто транспортные средства, это страсть, которую мы разделяем с нашими клиентами. Мы предоставляем не просто мотоциклы, но и опыт их вождения.
<br> <br>
<strong>2. </strong>Качество и надежность: Мы стремимся предоставлять только высококачественные мотоциклы, будь то новые или бывшие в употреблении. Каждый мотоцикл проходит тщательную проверку перед тем, как попасть на нашу продажу.
<br> <br>
<strong>3. </strong>Доступность: Мотоциклизм должен быть доступен каждому. Мы предлагаем разнообразные финансовые решения и гибкие условия покупки, чтобы сделать мотоциклы ближе к нашим клиентам.
<br> <br>
<strong>Что мы предлагаем:</strong>
<br> <br>
<strong>·</strong>Новые мотоциклы: Мы имеем в наличии последние модели от лучших производителей. Наши консультанты готовы помочь вам выбрать мотоцикл, который соответствует вашим потребностям и желаниям.
<br> <br>
<strong>·</strong> Б/У мотоциклы: Наши б/у мотоциклы прошли тщательную проверку и обслуживание, гарантируя, что они находятся в идеальном состоянии. Это отличный вариант для тех, кто ищет качественный мотоцикл по более доступной цене.
<br> <br>
<strong>·</strong> Сервис и ремонт: Наша команда экспертов по обслуживанию и ремонту готова помочь вам поддерживать ваш мотоцикл в отличном состоянии на протяжении всего его срока службы.
<br> <br>
Поднимись на Вершину Свободы с MotoMania: Независимо от того, являетесь ли вы опытным мотоциклистом или только начинаете свой путь, MotoMania - это место, где вы найдете мотоцикл, который подарит вам незабываемые моменты и приключения на дорогах. Поднимитесь на вершину свободы вместе с нами!
<br><br>
<strong>Мы на карте:</strong>
</p> 
<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af49a4eb1861204fd5dab3e90d25c4e130d2e20467cef13798e9062a1b87ba684&amp;source=constructor" width="1032" height="400" frameborder="0"></iframe>
</div>

  

</div>
  </body>