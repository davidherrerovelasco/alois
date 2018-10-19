<?php
    $emailAfectado=$_POST['email'];
    $nombre=$_POST['nombre'];
    $contenido=$_POST['contenido'];
    $emailServidor="david_herr95@hotmail.com";

    $mensaje = "La persona con email: ".$emailAfectado." y de nombre ".$nombre." Le ha enviado el siguiente mensaje: \n\n";
    $contenido = wordwrap($contenido, 70, "\r\n");
    $mensaje = $mensaje.$contenido;

    $retorno = mail($emailServidor, $nombre, $mensaje);
    
    if($retorno==TRUE){
       
        
        header('Location: index.php');
    }else{
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] mensaje.php - Error al mandar el mensaje al administrador\n", 3, "error.log");
        header('Location: index.php/#contact');
    }
?>