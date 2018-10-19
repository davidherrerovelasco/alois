<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

    $email = $_POST["email"];
    $pass = $_POST["password"]; 

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptLogin.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    $sql = "SELECT * FROM pacientes where email='".$email."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptLogin.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:index.php"));
    }

    if(mysqli_num_rows($result)==0) {
        //No se ha encontrado el usuario con el email.
        mysqli_close($conn);
        die(header("location:index.php?loginFailed=true"));
    }else{
        $row = $result->fetch_assoc();
        $hash=$row["contrasena"];
        if (password_verify($pass, $hash)){
            //Establecemos las cookies:
            setcookie("id",$row["id"],time()+43200,'/');
            setcookie("nombre",$row["nombre"],time()+43200,'/');
            setcookie("ape1",$row["ape1"],time()+43200,'/');
            setcookie("email",$email,time()+43200,'/');
            setcookie("imagen",$row["imagenPaciente"],time()+43200,'/');
            
            mysqli_close($conn);
            header("location:/principal/index.php?id=".$row["id"]);
        }else{
            //enviamos un mensaje de error a login.html
            mysqli_close($conn);
            die(header("location:index.php?loginFailed=true"));
        }
    }
?>