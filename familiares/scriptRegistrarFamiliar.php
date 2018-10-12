<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    $idPaciente=$_COOKIE["id"];
    $nombre = $_POST['nombreFamiliar'];
    $ape1 = $_POST['ape1Familiar'];
    $ape2 = $_POST['ape2Familiar'];    
    $email = $_POST["emailFamiliar"];  
    $edad = $_POST['edadFamiliar'];     
    $telefono = $_POST['telefonoFamiliar'];   
    $ciudad = $_POST['ciudadFamiliar'];   
    $direccion = $_POST["direccionFamiliar"];
    $provincia = $_POST["provinciaFamiliar"];  

    //Recogemos los datos de la imagen para poder insertarla en el servidor:
    $dir='../Imagenes/Familiares/';
    $expensions= array("jpeg","jpg");
    /*$file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
    if(in_array($file_ext,$expensions) == false){
        die(header("location:viewGestionarFamiliares.php"));
    }*/
    
    // Creamos la conexion
    $conn = mysqli_connect($servername, $username,$password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
         
    $sql = "INSERT INTO familiares (nombre,ape1,ape2,email,edad,telefono,ciudad,direccion,provincia,idPaciente) VALUES ('".$nombre."','".$ape1."','".$ape2."','".$email."',".$edad.",'".$telefono."','".$ciudad."','".$direccion."','".$provincia."','".$idPaciente."');";

    $result = mysqli_query($conn, $sql);

    if($result == FALSE) {
        echo "ha ocurrido un error ".$sql;
        mysqli_close($conn);
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
        
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
        
        $sql = "UPDATE familiares set imagen='".$imagen."' where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        if($result == FALSE){
             echo "ha ocurrido un error ".$sql;
            mysqli_close($conn);
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
