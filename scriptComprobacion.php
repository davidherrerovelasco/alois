<?php
    /*Script que se ejecuta al inicio para comprobar que existen cookies del usuario para entrar en la aplicacion
    en el caso de que no hubiera cookies manda al intruso a la pagina principal */
    if(is_null($_COOKIE["id"]) and is_null($_COOKIE["email"]) and is_null($_COOKIE["pass"])){
        die(header("location:/login"));
    }else{
        die(header("location:/principal/index.php?idPaciente=".$_COOKIE["id"]));
    }
?>