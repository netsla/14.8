<?php
// users.php

// Массив с данными пользователей
$users = [
    ['username' => 'Владимир', 'password' => 'pass1'],
    ['username' => 'Светлана', 'password' => 'pass2'],
    ['username' => 'Игорь', 'password' => 'pass3'],
    ['username' => 'Елена', 'password' => 'pass4']
];

// Функция для проверки пользователя
function checkUser($username, $password, $users) {
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            return true;
        }
    }
    return false;
}
?>