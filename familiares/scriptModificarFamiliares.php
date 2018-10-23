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
        error_log("ERROR [".$fecha."] scriptModificarFamiliares.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?failed=true"));
    }

    $sql1="select * from familiares where idPaciente='".$_COOKIE["id"]."' and email='".$_GET["email"]."'";
    $result1=mysqli_query($conn, $sql1);
    if($result1 == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptModificarFamiliares.php - Error SELECT: ".$sql1." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?failed=true"));
    }

    $row1 = mysqli_fetch_assoc($result1);

    $nombre=$row1["nombre"];
    $ape1=$row1["ape1"];
    $ape2=$row1["ape2"];
    $sexo=$row1["sexo"];
    $edad=$row1["edad"];
    $ciudad = $row1["ciudad"];
    $calle = $row1["calle"];
    $numero = $row1["numero"];
    $cp = $row1["cp"];
    $id =$row1["id"];
    $flag=0;

    if(isset($_POST['nombreModificado']) && $_POST['nombreModificado']!=""){
        $nombre = $_POST['nombreModificado'];
    }
    if(isset($_POST['ape1Modificado']) && $_POST['ape1Modificado']!=""){
        $ape1 = $_POST['ape1Modificado'];
    }
    if(isset($_POST['ape2Modificado']) && $_POST['ape2Modificado']!=""){
         $ape2 = $_POST['ape2Modificado'];
    }
    if(isset($_POST['edadModificado']) && $_POST['edadModificado']!=""){
        $edad = $_POST['edadModificado'];
    }
    if(isset($_POST['ciudadModificado']) && $_POST['ciudadModificado']!=""){
        $ciudad = $_POST['ciudadModificado'];
    }

    if(isset($_POST['calleModificado']) && $_POST['calleModificado']!=""){
        $calle = $_POST["calleModificado"];
        $flag = 1;
    }
    if($flag==1){//la calle ha sido modificada y puede haber numero nuevo
        $numero='';
    }
    if(isset($_POST['numeroModificado']) && $_POST['numeroModificado']!=""){
        $numero = $_POST["numeroModificado"];
    }
    if(isset($_POST['cpModificado']) && $_POST['cpModificado']!=""){
        $cp = $_POST["cpModificado"];
    }

    
    $sql="UPDATE familiares SET nombre ='".$nombre."', ape1 ='".$ape1."', ape2 ='".$ape2."', edad =".$edad.", ciudad ='".$ciudad."', calle ='".$calle."', numero ='".$numero."' , cp ='".$cp."' where id='".$id."'";
    $result=mysqli_query($conn, $sql);
    if($result == FALSE) {  
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptModificarFamiliares.php - Error UPDATE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?failed=true"));
    }else{
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?done=true"));
    }

?>