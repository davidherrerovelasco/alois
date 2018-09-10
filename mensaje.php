<?php
    session_start();
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
        header('Location: index.php/#contact');
    }
?>