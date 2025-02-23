<?php
session_start(); // Начинаем сессию

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Перенаправляем на страницу входа, если пользователь не авторизован
    exit;
}

// Сохраняем время входа пользователя
if (!isset($_SESSION['login_time'])) {
    $_SESSION['login_time'] = time();
}

// Рассчитываем оставшееся время до истечения персональной скидки
$remaining_time = 24 * 60 * 60 - (time() - $_SESSION['login_time']);
$hours = floor($remaining_time / 3600);
$minutes = floor(($remaining_time % 3600) / 60);
$seconds = $remaining_time % 60;

// Спрашиваем дату рождения пользователя, если она не была задана ранее
if (!isset($_SESSION['birthday'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['birthday'] = $_POST['birthday'];
        // Обновляем страницу после сохранения даты рождения
        header('Location: lk.php');
        exit;
    } else {
        $birthday_form = true;
    }
} else {
    // Создаём объект DateTime из даты рождения
    $birthday = DateTime::createFromFormat('Y-m-d', $_SESSION['birthday']);

    // Проверяем, успешно ли создан объект DateTime
    if ($birthday) {
        // Рассчитываем количество дней до дня рождения
        $today = new DateTime();
        $interval = $birthday->diff($today);
        $days_until_birthday = $interval->days;

        // Поздравляем пользователя с днём рождения, если сегодня его день рождения
        if ($interval->invert == 0 && $interval->days == 0) {
            $congratulations = true;
            $discount = 5; // Персональная скидка 5%
        }
    } else {
        // Если дата рождения некорректна, выводим сообщение об ошибке
        echo 'Ошибка: некорректная дата рождения';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="/css/lk.css">
</head>
<body>

<div class="header">
    <h1>Добро пожаловать в личный кабинет, <?= $_SESSION['username'] ?>!</h1>
</div>

<div class="content">
    <div class="card">
        <?php if ($congratulations ?? false): ?>
            <p>Поздравляем с днём рождения! Ваша персональная скидка 5% на все услуги салона.</p>
        <?php endif; ?>

        <?php if (isset($days_until_birthday)): ?>
            <p>До вашего дня рождения осталось <?= $days_until_birthday ?> дней.</p>
        <?php endif; ?>

        <p>Ваша персональная скидка действует ещё <span class="timer"><?= $hours ?> часов, <?= $minutes ?> минут, <?= $seconds ?> секунд.</span></p>

        <?php if ($birthday_form ?? false): ?>
            <form method="post">
                <label>Введите дату вашего рождения (YYYY-MM-DD):</label>
                <input type="text" name="birthday" required><br>
                <button type="submit" class="btn">Сохранить</button>
            </form>
        <?php endif; ?>
    </div>

    <a href="logout.php" class="btn">Выйти</a>
</div>

</body>
</html>