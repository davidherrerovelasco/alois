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
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $hora = $_POST["hora"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $idPaciente = $_COOKIE["id"];
    $flag=0;

    if(strcmp($periodico,"No")==0){
        $flag=0;
    }else if (strcmp($periodico,"Todos los dias")==0){
        $flag=1;
    }else if (strcmp($periodico,"Una vez a la semana")==0){
        $flag=2;
    }else if (strcmp($periodico,"Una vez al mes")==0){
        $flag=3;
    }

    // Creamos la conexion
    $conn = mysqli_connect($servername, $username,$password,$dbname);    
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptAñadirRecordatorio.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewAñadirRecordatorios.php"));
    }
         
    $sql = "INSERT INTO recordatorios (idPaciente,periodico,fechaInicio,fechaFin,hora,nombre,descripcion) VALUES ('".$idPaciente."',".$flag.",'".$fechaInicio."','".$fechaFin."','".$hora."','".$nombre."','".$descripcion."');";

    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptAñadirRecordatorio.php - Error INSERT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewAñadirRecordatorios.php"));
    }else{
        mysqli_close($conn);
        die(header("location:viewAñadirRecordatorios.php?success=true"));
    }   
?>