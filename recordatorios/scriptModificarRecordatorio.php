<?php 
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);     
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptModificarRecordatorio.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php?failed=true"));
    }

    $sql1="select * from recordatorios where idPaciente='".$_COOKIE["id"]."' and id='".$_GET["id"]."'";
    $result1=mysqli_query($conn, $sql1);
    if($result1 == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptModificarRecordatorio.php - Error SELECT: ".$sql1." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php?failed=true"));
    }

    $row = mysqli_fetch_assoc($result1);
    $nombre=$row["nombre"];
    $periodico=$row["periodico"];
    $fechaInicio=$row["fechaInicio"];
    $fechaFin=$row["fechaFin"];
    $hora=$row["hora"];
    $descripcion=$row["descripcion"];
    $id =$row["id"];

    if(isset($_POST['nombreModificado']) && $_POST['nombreModificado']!=""){
        $nombre = $_POST['nombreModificado'];
    }
    if(isset($_POST['fechaIncioModificado']) && $_POST['fechaIncioModificado']!=""){
        $fechaInicio = $_POST['fechaIncioModificado'];
    }
    if(isset($_POST['fechaFinModificado']) && $_POST['fechaFinModificado']!=""){
         $fechaFin = $_POST['fechaFinModificado'];
    }
    if(isset($_POST['horaModificado']) && $_POST['horaModificado']!=""){
        $hora = $_POST['horaModificado'];
    }
    if(isset($_POST['descripcionModificado']) && $_POST['descripcionModificado']!=""){
        $descripcion = $_POST['descripcionModificado'];
    }
   

    
    $sql="UPDATE recordatorios SET nombre ='".$nombre."', fechaInicio ='".$fechaInicio."', fechaFin ='".$fechaFin."', periodico =".$periodico.", hora ='".$hora."', descripcion ='".$descripcion."' where id='".$id."'";
    $result=mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptModificarRecordatorio.php - Error UPDATE: ".$sql1." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php?failed=true"));
    }else{
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php?done=true"));
    }

?>