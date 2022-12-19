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

    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <title>Game Over</title>
</head>
<body>
    <header>
        <h1>GAME OVER!</h1>
        
        <nav>
            <ul>
                <li><a href="inicio">Inicio</a></li>
                <li><a href="juegos">Juegos</a></li>
                <li><a href="contacto">Contacto</a></li>
                <li><a href="iniciar">Iniciar</a></li>
            </ul>
        </nav>

    </header>
    <div class="cuerpo">
       
    <div class="formulario" style="display: flex; justify-content: center; align-items: center;">

        <form method="post" action="register.php" name="register" style="height:490px">
            <h3>Registrar</h3>
            <input type="text" name="nombre" pattern="[a-zA-Z0-9]+" class="nes-input" style="width: 350px;" required>
            <input type="text" name="apellido" pattern="[a-zA-Z0-9]+" class="nes-input" style="width: 350px;" required>
            <input type="text" name="email" class="nes-input" style="width: 350px;" required>
            <input type="password" name="contrasena" class="nes-input" style="width: 350px;" required>
            <button type="submit" name="enviar" value="enviar" class="nes-btn">Registrar</button>
            <a href="login.php" style="font-size: 13px;">Ya tengo una cuenta</a>
        </form>
    </div>
      
    </div>
    <footer>
        <h3>Hecho por Oriana Olaia</h3>
        <div class="icon-list">
            <i class="nes-icon twitter is-medium"></i>
            <i class="nes-icon instagram is-medium"></i>
            <i class="nes-icon github is-medium"></i>
            <i class="nes-icon gmail is-medium"></i>
            <i class="nes-icon linkedin is-medium"></i>
            <i class="nes-icon twitch is-medium"></i>

        </div>
    </footer>
</body>
</html>