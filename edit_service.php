<?php

require 'config.php'

if (!is_logged()) {
    header('location: index.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id = $_GET['id']

$stmt = $pdo->prepare('
    SELECT  services.*,
            clients.id as client_id
    FROM    services
            LEFT JOIN clients ON clients.id = services.client_id
    WHERE services.id = ?
');
$stmt->execute(array($id));

$res = $stmt->fetchAll();
if (sizeof($res) == 0) {
    header('location: home.php');
    exit();
}
$service = $res[0];

$stmt = $pdo->query('SELECT * FROM clients ORDER BY name');
$clients = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
</head>
<body>
    <?php require 'nav.php'; ?>
    <form action="update_service.php?id=<?= $id ?>" method="POST">
        <fieldset>
            <legend>Editar serviço</legend>
            <select name="client-id" required>
                <option value="">Escolha</option>
                <option value="" disabled>--</option>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['id'] ?>" <?php if ($client['id'] == $service['client_id']) echo 'selected'; ?>><?= $client['name'] ?></option>
                <?php endforeach ?>
            </select>
            <input type="text" name="equip" placeholder="Equipamento" value="<?= $service['equip'] ?>">
            <textarea name="problem" rows="10" placeholder="Descrição do problema"><?= $service['problem'] ?></textarea>
            <input type="submit" value="Alterar">
        </fieldset>
        <h3><a href="home.php">Cancelar e voltar</a></h3>
    </form>
</body>
</html>