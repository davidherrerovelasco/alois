<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

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
        mysqli_close($conn);
        die("Connection failed: " . mysqli_connect_error());
    }
         
    $sql = "INSERT INTO recordatorios (idPaciente,periodico,fechaInicio,fechaFin,hora,nombre,descripcion) VALUES ('".$idPaciente."',".$flag.",'".$fechaInicio."','".$fechaFin."','".$hora."','".$nombre."','".$descripcion."');";

    $result = mysqli_query($conn, $sql);

    if($result == FALSE) {
        echo "Ha habido un error al insertar\n";
        echo "Error : " . mysqli_error($conn);
        echo $sql;
        mysqli_close($conn);
    }else{
        mysqli_close($conn);
        die(header("location:viewAñadirRecordatorios.php?success=true"));
    }   
?>