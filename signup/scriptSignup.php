<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

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
      
    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] signup/scriptSignup.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    } 

    //Primero hay que ver si el usuario existe en el sistema.
    $sql = "SELECT * FROM pacientes where email='".$email."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)!=0){//Si existe devolvemos error
        die(header("location:index.php?signupFailed=true"));
    }

    //Recogemos los datos de la imagen para poder insertarla en el servidor:
    $dir='../Imagenes/Pacientes/';
    $expensions= array("jpeg","jpg");
    $file_ext=strtolower(end(explode('.',$_FILES['imagen']['name'])));
    if(in_array($file_ext,$expensions) == false){
        die(header("location:index.php?ImageNotSupported=true"));
    }
         
    //Si no existe introducimos al paciente en la base de datos:
    $sql = "INSERT INTO pacientes (nombre,ape1,ape2,sexo,email,edad,telefono,ciudad,direccion,provincia,contrasena) VALUES ('".$nombre."','".$ape1."','".$ape2."','".$sexo."','".$email."','".
        $edad."','".$telefono."','".$ciudad."','".$direccion."','".$provincia."','".$passEncripted."');";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        //Error al insertar un paciente:
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] signup/scriptSignup.php -Error INSERT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php?signupFailed=true"));
    }else{
        //No ha habido ningun error
        $sql = "SELECT * FROM pacientes where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
        if(strcmp($file_ext,"jpg")==0){
            $imagen = $dir . $row["id"].".jpg";
        }else{
            $imagen = $dir . $row["id"].".jpeg";
        }
        
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
        
        $sql = "UPDATE pacientes set imagenPaciente='".$imagen."' where email='".$email."'";
        $result = mysqli_query($conn, $sql);
        if($result == FALSE) {
            $date = getdate();
            $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
            error_log("ERROR [".$fecha."] signup/scriptSignup.php - Error UPDATE: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        }
        //Establecemos las cookies:
        setcookie("id",$row["id"],time()+43200,'/');
        setcookie("email",$email,time()+43200,'/');
        setcookie("imagen",$imagen,time()+43200,'/');
        setcookie("nombre",$row["nombre"],time()+43200,'/');
        setcookie("ape1",$row["ape1"],time()+43200,'/');
        
        //Mandamos email:
        $mensaje= "Bienvenido a nuestro servicio de atencion y seguimiento de personas con Alzheimer su correo de acceso al sistema es ".$email;
        $resultado=mail($email, "Servidor Alois", $mensaje);
        if(!$resultado){
            $date = getdate();
            $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
            error_log("ERROR [".$fecha."] signup/scriptSignup.php - Error al enviar mensaje de registro\n", 3, "../error.log");
        }
        //Cerramos conexion
        mysqli_close($conn);
        header("location:/principal");
    } 
?>