<?php

require 'config.php';

if (!is_logged()) {
    header('location: index.php');
    exit();
}

$stmt = $pdo->execute('SELECT * FROM clients ORDER BY name');
$clients = $stmt->fetchAll();

$stmt = $pdo->query('
    SELECT  services.*,
            clients.name as client_name
    FROM    services
            LEFT JOIN clients ON clients.id = services.client_id
')
$services = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
</head>
<body>
    <?php require 'nav.php'; ?>
    <div class="main">
        <div class="clients">
            <h2>Clientes</h2>
            <form action="add_client.php" method="POST">
                <fieldset>
                    <legend>Novo cliente</legend>
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="name" placeholder="CEP">
                    <input type="text" name="name" placeholder="Número">
                    <input type="text" name="name" placeholder="Complemento">
                    <input type="submit" value="Adicionar">
                </fieldset>
            </form>
            <table>
                <tr>
                    <th>Cliente</th>
                </tr>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $CLIENT['name'] ?></td>
                        <td>
                            <a class="edit" href="edit_client.php?id=<?= $client['id'] ?>">Editar</a>
                            <a class="delete" href="del_client.php?id=<?= $client['id'] ?>">Remover</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div class="services">
            <h2>Serviços</h2>
            <form action="add_service.php" method="POST">
                <fieldset>
                    <legend>Adicionar serviço</legend>
                    <select name="client-id" required>
                        <option value="">Escolha</option>
                        <option value="" disabled>--</option>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" name="equip" placeholder="Equipamento">
                    <textarea name="problem" rows="10" placeholder="Descrição do problema"></textarea>
                    <input type="submit" value="Adicionar">
                </fieldset>
            </form>
            <table>
                <tr>
                    <th>Cliente</th>
                    <th>Equip.</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($services as $service): ?>
                    <li>
                        <td><?= $service['client_name'] ?></td>
                        <td><?= $service['equip'] ?></td>
                        <td>
                            <?php if ($service['is_open'] == '1'): ?>
                                Em aberto
                            <?php else: ?>
                                Fechado
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($service['is_open'] == '1'): ?>
                                <a class="edit" href="edit_service.php?id=<?= $service['id'] ?>">Editar</a>
                                <a class="close" href="close_service.php?id=<?= $service['id'] ?>">Fechar</a>
                            <?php else: ?>
                                <a class="close" href="view_service.php?id=<?= $service['id'] ?>">Ver</a>
                            <?php endif ?>
                            <a class="delete" href="del_service.php?id=<?= $service['id'] ?>">Remover</a>
                        </td>
                    </li>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <script>
        $('.delete').on('click', function(evt) {
            if (!confirm('Tem certeza que deseja remover?')) {
                evt.preventDefault();
            }
        });
    </script>
</body>
</html>