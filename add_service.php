<?php

require 'config.php';

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($_POST['client-id']) || !isset($_POST['equip']) || !isset($_POST['problem'])) {
    header('location: home.php')
    exit();
}

$client_id = $_GET['client-id'];
$equip     = $_GET['equip'];
$problem   = $_GET['problem'];

$stmt = $pdo->prepare('INSERT INTO services (client_id, equip, problem, is_open) VALUES (?, ?, ?, ?)');
$stmt->query(array($client_id, $equip, $problem, '1'));

header('location: home.php');


?>