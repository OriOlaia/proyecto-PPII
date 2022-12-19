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
            <form method="post" action="contact.php">
                <label for="nombre">Nombre</label>
                <input required type="text" id="nombre" name="nombre" class="nes-input" placeholder="Nombre completo"style="width: 350px;">
                <label for="email">Correo</label>
                <input required type="email" id="email" name="email" placeholder="ejemplo@email.com" class="nes-input"style="width: 350px;">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" required placeholder="Danos tu mensaje" class="nes-textarea" style="width: 350px;"></textarea>
                <button name="submit" type="submit" value="Enviar" class="nes-btn" style="color:black;">Enviar</button> 
            </form>
        </div>
        <?php
                
                if (empty($_POST["nombre"])) {
                    exit("Falta el nombre");
                }

                if (empty($_POST["correo"])) {
                    exit("Falta el correo");
                }

                if (empty($_POST["mensaje"])) {
                    exit("Falta el mensaje");
                }

                $nombre = $_POST["nombre"];
                $correo = $_POST["correo"];
                $mensaje = $_POST["mensaje"];

                $correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
                if (!$correo) {
                    echo "Correo inválido. Intenta con otro correo.";
                    exit;
                }

                $asunto = "Nuevo mensaje de sitio web";

                $datos = "De: $nombre\nCorreo: $correo\nMensaje: $mensaje";
                $mensaje = "Has recibido un mensaje desde el formulario de contacto de tu sitio web. Aquí están los detalles:\n$datos";
                $destinatario = "olaoriana@gmail.com"; # aquí la persona que recibirá los mensajes
                $encabezados = "Sender: correo@gmail.com\r\n"; # El remitente, debe ser un correo de tu dominio de servidor
                $encabezados .= "From: $nombre <" . $correo . ">\r\n";
                $encabezados .= "Reply-To: $nombre <$correo>\r\n";
                $resultado = mail($destinatario, $asunto, $mensaje, $encabezados);
                if ($resultado) {
                    echo "<h1>Mensaje enviado, ¡Gracias por contactarme!</h1>";
                    echo "<p>Tu mensaje se ha enviado correctamente.</p><h2>Importante</h2><p>Revisa tu bandeja de SPAM, en ocasiones mis respuestas quedan ahí. </p>";
                } else {
                    echo "Tu mensaje no se ha enviado. Intenta de nuevo.";
                }            
                ?>
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