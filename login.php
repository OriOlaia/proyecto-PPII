<?php
    
    //Almaceno la conexión en una variable para usarla luego
    $conexion=mysqli_connect('localhost','root','','gameover');
    
    //Realizo la consulta almacenada en $query sobre la conexion almacenada en conexion
    $consulta= "SELECT * FROM register";

    //Realizo la consulta almacenada en $query sobre la conexion almacenada en $conexion
    $resultado=mysqli_query($conexion,$consulta);

    include('config.php');

    session_start();
   
    if (isset($_POST['login'])) {
                
        $email = $_POST['email'];
        $password = $_POST['contraseña'];
    
        $query = $connection->prepare("SELECT * FROM register WHERE EMAIL=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
    
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
        if (!$result) {
            echo '<p class="error">Correo o contraseña incorrecta!</p>';
        } else {
            if (password_verify($password, $result['PASSWORD'])) {
                $_SESSION['id'] = $result['ID'];
                echo '<p class="success">Felicidades, has inicado correctamente!</p>';
            } else {
                echo '<p class="error">Correo o contraseña incorrecta!</p>';
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
        
        <form method="post" action="login.php" name="login">
               
            <h3>Iniciar Sesion</h3>
            <input type="text" name="email" class="nes-input" style="width: 350px;" required>
            <input type="password" name="contraseña" class="nes-input" style="width: 350px;" required>
            <button type="submit" name="login" value="login" class="nes-btn">Iniciar Sesion</button>
            <a href="register.php" style="font-size: 13px;">No tengo cuenta</a>
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