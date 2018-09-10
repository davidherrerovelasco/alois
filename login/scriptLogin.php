<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    $email = $_POST["email"];
    $pass = $_POST["password"]; 

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        mysqli_close($conn);
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM pacientes where email='".$email."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0) {
        //No se ha encontrado el usuario con el email.
        mysqli_close($conn);
        die(header("location:loginView.php?loginFailed=true"));
    }else{
        $row = $result->fetch_assoc();
        $hash=$row["contrasena"];
        if (password_verify($pass, $hash)){
            //Establecemos las cookies:
            setcookie("id",$row["id"],time()+43200);
            setcookie("email",$email,time()+43200);
            setcookie("imagen",$row["imagenPaciente"],time()+43200);
            
            mysqli_close($conn);
            header("location:/principal/index.php?id=".$row["id"]);
        }else{
            //enviamos un mensaje de error a login.html
            mysqli_close($conn);
            die(header("location:index.php?loginFailed=true"));
        }
    }
?>