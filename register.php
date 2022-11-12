<?php

//Almaceno la conexión en una variable para usarla luego
$conexion = mysqli_connect('localhost', 'root', '', 'gameover');


//Realizo la consulta almacenada en$query sobre la conexion almacenada en conexion
$consulta = "SELECT * FROM register";

//Realizo la consulta almacenada en $query sobre la conexion almacenada en $conexion
$resultado = mysqli_query($conexion, $consulta);


require 'config.php';
session_start();
if (isset($_POST['enviar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['contraseña'];
    $reppassword = $_POST['repcontra'];

    $query = $connection->prepare("SELECT * FROM register WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }

    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO register (nombre,apellido,email,contraseña,repcontra) VALUES (:nombre,:apellido,:email,:contraseña, :repcontra)");
        $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->bindParam(":contraseña", $password, PDO::PARAM_STR);
        $query->bindParam(":repcontra", $reppassword, PDO::PARAM_STR);

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
            <input type="password" name="contraseña" required>
            <input type="password" name="repcontra" required>
            <button type="submit" acname="enviar" value="enviar">Registrar</button>
        </form>
    </div>
    <footer>

    </footer>
</body>

</html>