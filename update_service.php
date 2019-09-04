<?php

require 'config.php';

if !is_logged() {
    header('location: index.php');
    exit();
}

if (!isset($_POST['client-id']) || !isset($_POST['equip']) || !isset($_POST['problem']) ||| !isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id        = $_GET['id'];
$client_id = $_POST['client-id'];
$equip     = $_POST['equip'];
$problem   = $_POST['problem'];

$stmt = $pdo->prepare('
    UPDATE  services
    SET     client_id = ?,
            equip = ?,
            problem = ?
    WHERE   id = ?
');
$stmt->execute($client_id, $equip, $problem, $id);

head('location: home.php');


?>