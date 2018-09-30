<?php 
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        mysqli_close($conn);
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql1="select * from familiares where idPaciente='".$_COOKIE["id"]."' and email='".$_GET["email"]."'";
    $result1=mysqli_query($conn, $sql1);

    if($result1 == FALSE) {
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?failed=true"));
    }

    $row1 = mysqli_fetch_assoc($result1);

    $nombre=$row1["nombre"];
    $ape1=$row1["ape1"];
    $ape2=$row1["ape2"];
    $sexo=$row1["sexo"];
    $edad=$row1["edad"];
    $ciudad=$row1["ciudad"];
    $direccion=$row1["direccion"];
    $provincia=$row1["provincia"];
    $id =$row1["id"];

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
    if(isset($_POST['direccionModificado']) && $_POST['direccionModificado']!=""){
        $direccion = $_POST["direccionModificado"];
    }
    if(isset($_POST['provinciaModificado']) && $_POST['provinciaModificado']!=""){
        $provincia = $_POST["provinciaModificado"]; 
    }

    
    $sql="UPDATE familiares SET nombre ='".$nombre."', ape1 ='".$ape1."', ape2 ='".$ape2."', edad =".$edad.", ciudad ='".$ciudad."', direccion ='".$direccion."', provincia ='".$provincia."' where id='".$id."'";
    $result=mysqli_query($conn, $sql);
    

    if($result == FALSE) {  
        mysqli_close($conn);
        echo $sql;
        die(header("location:viewGestionarFamiliares.php?failed=true"));
    }else{
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php?done=true"));
    }

?>