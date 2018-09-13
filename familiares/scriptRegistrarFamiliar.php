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
        //Mandamos email:
        $mensaje= "Bienvenido a nuestro servicio de atencion y seguimiento de personas con Alzheimer su correo de acceso al sistema es ".$email." Ha sido asignado al paciente: ".$_COOKIE["email"];
        $resultado=mail($email, "Servidor Alois", $mensaje);
        if(!$resultado){
            echo "No se ha podido enviar el mensaje";
        }
        mysqli_close($conn);
        header ("location: ../principal"); 
    }
?>
