<?php

require 'config.php';

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare('
    SELECT  services.*,
            clients.name as client_name
    FROM    services
            LEFT JOIN clients ON clients.id = services.client_id
    WHERE services.id = ?
');
$stmt->execute($id)

$res = $stmt->fetchAll();
if (sizeof($res) == 0) {
    header('location: home.php');
    exit();
}
$service = $res[0]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
</head>
<body>
    <?php require 'nav.php'; ?>
    <form action="update_and_close_service.php?id=<?= $id ?>" method="POST">
        <fieldset>
            <legend>Fechar serviço</legend>
            <select name="client-id" disabled>
                <option value=""><?= $service['client_name'] ?></option>
            </select>
            <input type="text" disabled placeholder="Equipamento" value="<?= $service['equip'] ?>">
            <textarea name="problem" rows="10" disabled placeholder="Descrição do problema"><?= $service['problem'] ?></textarea>
            <textarea name="solution" rows="10" placeholder="Solução"></textarea>
            <input type="submit" value="Fechar serviço">
        </fieldset>
        <h3><a href="home.php">Cancelar e voltar</a></h3>
    </form>
</body>
</html>