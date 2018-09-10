<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    $idPaciente=$_COOKIE["id"];

    //Establecemos conexion con base de datos.
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    
    //Comprobamos la conexion:
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }    
    
    //Realizamos la consulta:
    $sql = "SELECT id FROM familiares where idPaciente='".$idPaciente."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0) {//No se han obtenido resultados
        mysqli_close($conn);
        echo 0;
    }else{//Hay un familiar asociado al paciente.
        mysqli_close($conn);
        echo 1;
    }   
?>