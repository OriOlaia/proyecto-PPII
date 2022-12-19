<?php

    require 'config.php';
    session_start();
    if (isset($_POST['enviar'])) {
        var_dump($_POST);

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['contrasena'];

        $query = $connection->prepare("SELECT * FROM register WHERE EMAIL=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }

        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO register (nombre,apellido,email,contrasena) VALUES (:nombre,:apellido,:email,:contrasena)");
            $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
            $query->bindParam(":email", $email, PDO::PARAM_STR);
            $query->bindParam(":contrasena", $password, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">


    <title>Game Over</title>
</head>

<body>
    <header>
        <h1>GAME OVER</h1>
    </header>
    <div class="cuerpo">

        <form method="post" action="register.php" name="register">
            <input type="text" name="nombre" pattern="[a-zA-Z0-9]+" required>
            <input type="text" name="apellido" pattern="[a-zA-Z0-9]+" required>
            <input type="text" name="email" required>
            <input type="password" name="contrasena" required>
            <button type="submit" name="enviar" value="enviar">Registrar</button>
        
        </form>
    </div>
    <footer>

    </footer>
</body>

</html>