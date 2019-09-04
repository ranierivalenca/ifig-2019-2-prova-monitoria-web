<?php

session_start();

$db_user = 'root';
$db_pw = 'ranieri';
$db_dsn = 'mysql:host=localhost;dbname=web-2019-1;';

$pdo = new PDO($dsn, $db_user, $db_pw);

functino is_logged() {
    return isset($_SESSION['user']);
}

?>