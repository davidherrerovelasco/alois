<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/
    $idPaciente = $_COOKIE["id"];

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);     
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }


    //Eliminamos Familiares:
    $sql = "SELECT imagen FROM familiares where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    while($row = $result->fetch_array()){
        //Borrar imagen del familiar
        unlink ($row["imagen"]);
    }

    $sql = "DELETE FROM familiares where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    //Eliminamos Rutina
    $sql = "DELETE FROM habitos where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    $sql = "DELETE FROM medicamentos where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    //Eliminamos Recordatorios
    $sql = "DELETE FROM recordatorios where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    //Eliminamos Localizacion
    $sql = "DELETE FROM localizacion where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    //Eliminamos al paciente
    $sql = "SELECT imagenPaciente FROM pacientes where id='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    $row = $result->fetch_array();
    unlink ($row["imagenPaciente"]);

    $sql = "DELETE FROM pacientes where id='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptEliminarPaciente.php - Error DELETE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    mysqli_close($conn);

    //Ponemos todas las cookies que usamos a null y volvemos a la pantalla principal de la aplicacion
    setcookie("id",null,time()-1,'/');
    setcookie("imagen",null,time()-1,'/');
    setcookie("email",null,time()-1,'/');
    setcookie("nombre",null,time()+43200,'/');
    setcookie("ape1",null,time()+43200,'/');

    die(header("location:../"));
?>