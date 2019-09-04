<?php

require 'config.php'

if (is_logged()) {
    header('location: home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
</head>
<body>
    <form action="login.php" class="login" method="POST">
        <fieldset>
            <legend>Login</legend>
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="password" placeholder="Password">
            <input type="submit">
        </fieldset>
    </form>
</body>
</html>