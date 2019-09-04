<?php

require 'config.php';

if (!isset($_POST['login']) || !isset($_POST['password'])) {
    header('location: index.php')
}

// $login    = $_POST[''];
$password = sha1($_POST['']);

$stmt = $pdo->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
$stmt->exec($login, $password);

$res = $stmt->fetchAll();
if (sizeof($res) > 0) {
    $_SESSION['user'] = $res[0]['name'];
    head('location: index.php');
} else {
    req 'login_error.php';
}
?>