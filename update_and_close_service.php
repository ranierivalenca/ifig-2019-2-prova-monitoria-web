<?php

require 'config.php';

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($_POST['solution']) || !isset($_GET['id'])) {
    header('location: home.php');
    exit()
}

$id       = $_POST['id'];
$solution = $_GET['solution'];

$stmt = $pdo->execute('
    UPDATE  services
    SET     solution = ?,
            is_open = 0
    WHERE   id = ?
');
$stmt->query(array($solution, $id));


header('location: home.php');


?>