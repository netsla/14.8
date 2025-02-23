<?php
session_start(); // Начинаем сессию

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подключаем файл с пользователями
    require_once 'users.php';

    // Проверяем пользователя
    if (checkUser($username, $password, $users)) {
        // Если пользователь успешно аутентифицирован, сохраняем его в сессии
        $_SESSION['username'] = $username;
        header('Location: lk.php'); // Перенаправляем на главную страницу или другую страницу
        exit;
    } else {
        $error = 'Неверный логин или пароль';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход на сайт</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

<div class="header">
    <h1>Авторизация</h1>
</div>

<div class="content">
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Логин:</label>
        <input type="text" name="username" placeholder="Введите Ваш логин" required><br>
        <label>Пароль:</label>
        <input type="password" name="password" placeholder="Введите Ваш пароль" required><br>
        <button type="submit" class="btn">Войти</button>
    </form>
</div>

</body>