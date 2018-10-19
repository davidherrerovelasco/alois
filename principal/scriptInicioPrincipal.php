<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

    $idPaciente=$_COOKIE["id"];

    //Establecemos conexion con base de datos.
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptInicioPrincipal.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }    
    
    //Realizamos la consulta:
    $sql = "SELECT id FROM familiares where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {//ha ocurrido un error en la consulta
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptInicioPrincipal.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }else{
        if(mysqli_num_rows($result)==0) {//No se han obtenido resultados
            mysqli_close($conn);
            echo 0;
        }else{//Hay un familiar asociado al paciente.
            mysqli_close($conn);
            echo 1;
        }   
    }
?>