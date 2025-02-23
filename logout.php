<?php
session_start(); // Начинаем сессию

// Удаляем данные пользователя из сессии
unset($_SESSION['username']);
unset($_SESSION['login_time']);
unset($_SESSION['birthday']);

// Разрушаем сессию
session_destroy();

// Перенаправляем пользователя на главную страницу
header('Location: index.php');
exit;
?>