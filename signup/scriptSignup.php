<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    $nombre = $_POST['nombre'];
    $ape1 = $_POST['ape1'];
    $ape2 = $_POST['ape2'];
    $sexo = $_POST['sexo'];
    $email = $_POST["email"];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $provincia = $_POST['provincia']; 
    $pass = $_POST['password']; 

    //Encriptamos la contraseña para almacenarla:
    $passEncripted=password_hash($pass,PASSWORD_DEFAULT);

    //Recogemos los datos de la imagen para poder insertarla en el servidor:
    $dir='../Imagenes/Pacientes/';
    $expensions= array("jpeg");
    $file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
    if(in_array($file_ext,$expensions) == false){
        die(header("location:index.php?ImageNotSupported=true"));
    }
    
      
    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        mysqli_close($conn);
        die("Connection failed: " . mysqli_connect_error());
    } 

    //Primero hay que ver si el usuario existe en el sistema.
    $sql = "SELECT * FROM pacientes where email='".$email."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)!=0){//Si existe devolvemos error
        die(header("location:index.php?signupFailed=true"));
    }
         
    //Si no existe introducimos al paciente en la base de datos:
    $sql = "INSERT INTO pacientes (nombre,ape1,ape2,sexo,email,edad,telefono,ciudad,direccion,provincia,contrasena) VALUES ('".$nombre."','".$ape1."','".$ape2."','".$sexo."','".$email."',".
        $edad.",'".$telefono."','".$ciudad."','".$direccion."','".$provincia."','".$passEncripted."');";

    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        //ha habido un error en el intento de registro
        echo "Ha habido un error al insertar\n";
        echo "Error : " . mysqli_error($conn);
        //Cerramos conexion
        mysqli_close($conn);
        die(header("location:index.php?signupFailed=true"));
    }else{
        //No ha habido ningun error
        //Establecemos las cookies:
        $sql = "SELECT * FROM pacientes where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
        $imagen = $dir . $row["id"].".jpeg";
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            echo "El fichero es válido y se subió con éxito.\n";
        } else {
            echo "¡Posible ataque de subida de ficheros!\n";
        }
        
        $sql = "UPDATE pacientes set imagenPaciente='".$imagen."' where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        
        setcookie("id",$row["id"],time()+43200,'/');
        setcookie("email",$email,time()+43200,'/');
        setcookie("imagen",$imagen,time()+43200,'/');
        
        
        
        //Mandamos email:
        $mensaje= "Bienvenido a nuestro servicio de atencion y seguimiento de personas con Alzheimer su correo de acceso al sistema es ".$email;
        $resultado=mail($email, "Servidor Alois", $mensaje);
        if(!$resultado){
            echo "No se ha podido enviar el mensaje";
        }
        //Cerramos conexion
        mysqli_close($conn);
        header("location:/principal");
    }

    
?>