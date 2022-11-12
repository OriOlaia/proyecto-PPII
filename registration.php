<?php
    
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
