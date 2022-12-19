<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: Proyecto-PPII/login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: Proyecto-PPII/login.php');
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
        <!--
        <nav>
            <li>
                <ul>Iniciar Sesion</ul>
            </li>
        </nav>
    -->
    </header>
    <div class="cuerpo">
        <h2>¡Bienvenidos a GAME OVER!</h2>
        <p>Hola frikis, esta página van a encontrar información sobre videojuegos de todo tipo, contiene información sobre: descripción, requisitos, guías, trucos y donde conseguir el juego.</p>
        <a href="login.php" class="nes-btn">Iniciar Sesion</a>
        <a href="register.php" class="nes-btn">Registrar</a>
    </div>
    <footer>
        <h3>Hecho por Oriana Olaia</h3>
        <div class="icon-list">
            <i class="nes-icon twitter is-large"></i>
            <i class="nes-icon instagram is-large"></i>
            <i class="nes-icon github is-large"></i>
            <i class="nes-icon gmail is-large"></i>
            <i class="nes-icon linkedin is-large"></i>
            <i class="nes-icon twitch is-large"></i>

        </div>
    </footer>
</body>
</html>