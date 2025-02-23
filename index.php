<?php
session_start(); // Начинаем сессию

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    //header('Location: login.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    //exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Услуги SPA-салона</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>

<div class="header">
    <h1>Добро пожаловать в SPA-салон</h1>
    <a href="login.php" class="btn">Авторизация</a>
</div>

<div class="content">
    <h2>Наши услуги</h2>

    <div class="service">
        <h3>Массаж</h3>
        <p>Расслабляющий и терапевтический массаж для снятия напряжения и улучшения общего состояния.</p>
        <img src="images/massage.jpg" alt="Массаж" width="200">
    </div>

    <div class="service">
        <h3>Уход за кожей</h3>
        <p>Профессиональные процедуры по уходу за кожей лица и тела, направленные на улучшение её состояния и внешнего вида.</p>
        <img src="images/skin_care.jpg" alt="Уход за кожей" width="200">
    </div>

    <div class="service">
        <h3>Спа-процедуры</h3>
        <p>Комплексные спа-программы для полного расслабления и восстановления сил.</p>
        <img src="images/spa.jpg" alt="Спа-процедуры" width="200">
    </div>

    <h2>Акции салона</h2>
    <div class="service">
        <h3>Скидка 15% на первый визит</h3>
        <p>При первом посещении салона вы получите скидку 15% на любую услугу.</p>
    </div>
    <div class="service">
        <h3>Бесплатная консультация специалиста</h3>
        <p>Получите бесплатную консультацию нашего специалиста по уходу за кожей.</p>
    </div>
</div>

</body>
</html>