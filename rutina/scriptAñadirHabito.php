<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

    $periodico = $_POST["periodicidad"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $idPaciente = $_COOKIE["id"];
    $diaTmp=0;

    if(strcmp($dia,"Lunes")==0){
        $diaTmp=0;
    }else if(strcmp($dia,"Martes")==0){
        $diaTmp=1;
    }else if(strcmp($dia,"Miercoles")==0){
        $diaTmp=2;
    }else if(strcmp($dia,"Jueves")==0){
        $diaTmp=3;
    }else if(strcmp($dia,"Viernes")==0){
        $diaTmp=4;
    }else if(strcmp($dia,"Sabado")==0){
        $diaTmp=5;
    }else if(strcmp($dia,"Domingo")==0){
        $diaTmp=6;
    }

    // Creamos la conexion
    $conn = mysqli_connect($servername, $username,$password,$dbname);       
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptAñadirHabito.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewAñadirHabito.php"));
    }
         
    $sql = "INSERT INTO habitos (idPaciente,dia,hora,nombre,descripcion) VALUES ('".$idPaciente."','".$diaTmp."','".$hora."','".$nombre."','".$descripcion."');";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptAñadirHabito.php - Error INSERT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewAñadirHabito.php"));
    }else{
        mysqli_close($conn);
        die(header("location:viewAñadirHabito.php?success=true"));
    }   
?>