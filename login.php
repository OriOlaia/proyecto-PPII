<?php
    
    //Almaceno la conexión en una variable para usarla luego
    $conexion=mysqli_connect('localhost','root','','gameover');
    
    //Realizo la consulta almacenada en $query sobre la conexion almacenada en conexion
    $consulta= "SELECT * FROM register";

    //Realizo la consulta almacenada en $query sobre la conexion almacenada en $conexion
    $resultado=mysqli_query($conexion,$consulta);

    include('config.php');

    session_start();
   
    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: inicioAdmin.html');
            break;

            case 2:
                header('location: inicio.html');
            break;
            
            default:
        }
    }
    if(isset($_POST['email']) && isset($_POST['contrasena'])){
        $username = $_POST['email'];
        $password = $_POST['contrasena'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM register WHERE email = :email AND contrasena = :contrasena');
        $query->execute(['email' => $email, 'contrasena' => $contrasena]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: Proyecto-PPII/admin/inicioAdmin.php');
                break;

                case 2:
                header('location: Proyecto-PPII/usuario/inicio.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
    }
    /*
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
  */ 
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
        
        <form method="post" action="login.php" name="login">
            <input type="text" name="email" required>
            <input type="password" name="contraseña" required>
            <button type="submit" name="login" value="login">Iniciar Sesion</button>
        </form>
    </div>
    <footer>

    </footer>
</body>
</html>