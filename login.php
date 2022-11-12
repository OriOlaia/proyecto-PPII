<?php
    
    //Almaceno la conexión en una variable para usarla luego
    $conexion=mysqli_connect('localhost','root','','gameover');
    
    //Realizo la consulta almacenada en $query sobre la conexion almacenada en conexion
    $consulta= "SELECT * FROM login";

    //Realizo la consulta almacenada en $query sobre la conexion almacenada en $conexion
    $resultado=mysqli_query($conexion,$consulta);

    session_start();
    /* 
    if(!isset($_SESSION['id'])){
        header('Location: login.php');
        exit;
        } else {
        // Show users the page!
    }
    */
    include('config.php');

    if (isset($_POST['login'])) {
                
        $email = $_POST['email'];
        $password = $_POST['contraseña'];
    
        $query = $connection->prepare("SELECT * FROM email WHERE USERNAME=:email");
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

    <link rel="stylesheet" href="style.css">


    <title>Game Over</title>
</head>
<body>
    <header>
        <h1>GAME OVER</h1>
    </header>
    <div class="cuerpo">
        
        <form method="post" action="registration.php" name="login">
            <input type="text" name="email" required>
            <input type="password" name="contraseña" required>
            <button type="submit" name="login" value="login">Iniciar Sesion</button>
        </form>
    </div>
    <footer>

    </footer>
</body>
</html>