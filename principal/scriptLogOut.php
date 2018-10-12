<?php
    //Ponemos todas las cookies que usamos a null y volvemos a la pantalla principal de la aplicacion
    setcookie("id",null,time()-1,'/');
    setcookie("imagen",null,time()-1,'/');
    setcookie("email",null,time()-1,'/');
    setcookie("nombre",null,time()+43200,'/');
    setcookie("ape1",null,time()+43200,'/');

    die(header("location: ../"));
?>