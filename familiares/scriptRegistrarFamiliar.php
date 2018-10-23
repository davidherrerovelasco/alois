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
    $nombre = $_POST['nombreFamiliar'];
    $ape1 = $_POST['ape1Familiar'];
    $ape2 = $_POST['ape2Familiar'];    
    $email = $_POST["emailFamiliar"];  
    $edad = $_POST['edadFamiliar'];     
    $telefono = $_POST['telefonoFamiliar'];
    $ciudad = $_POST['ciudad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $cp = $_POST['cp'];

    //Recogemos los datos de la imagen para poder insertarla en el servidor:
    $dir='../Imagenes/Familiares/';
    $expensions= array("jpeg","jpg");
    $file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
    if(in_array($file_ext,$expensions) == false){
        die(header("location:viewGestionarFamiliares.php"));
    }
    
    // Creamos la conexion
    $conn = mysqli_connect($servername, $username,$password,$dbname);      
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptRegistrarFamiliar.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php"));
    }
         
    $sql = "INSERT INTO familiares (nombre,ape1,ape2,email,edad,telefono,ciudad,calle,numero,cp,idPaciente) VALUES ('".$nombre."','".$ape1."','".$ape2."','".$email."',".$edad.",'".$telefono."','".$ciudad."','".$calle."','".$numero."','".$cp."','".$idPaciente."');";
    $result = mysqli_query($conn, $sql);

    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptRegistrarFamiliar.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarFamiliares.php"));
    }else{
        //Ponemos la Imagen tanto en la base de datos como en el servidor le llamamos como el id del familiar
        $sql = "SELECT * FROM familiares where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
        if(strcmp($file_ext,"jpg")==0){
            $imagen = $dir . $row["id"].".jpg";
        }else{
            $imagen = $dir . $row["id"].".jpeg";
        }
        
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
        
        $sql = "UPDATE familiares set imagen='".$imagen."' where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        if($result == FALSE){
            $date = getdate();
            $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
            error_log("ERROR [".$fecha."] scriptRegistrarFamiliar.php - Error UPDATE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
            mysqli_close($conn);
            die(header("location:viewGestionarFamiliares.php"));
        }else{
            //Mandamos email:
            $mensaje= "Bienvenido a nuestro servicio de atencion y seguimiento de personas con Alzheimer su correo de acceso al sistema es ".$email." Ha sido asignado al paciente: ".$_COOKIE["email"];
            $resultado=mail($email, "Servidor Alois", $mensaje);
            if(!$resultado){
                echo "No se ha podido enviar el mensaje";
            }
            mysqli_close($conn);
            header ("location: ../principal"); 
        }
    }
?>
