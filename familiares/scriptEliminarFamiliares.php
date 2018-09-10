<?php
    $id=$_GET["id"];

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

    $sql = "DELETE FROM familiares where id='".$id."'";
    $result = mysqli_query($conn, $sql);

     if($result == FALSE) {
         echo "Ha habido un error";
         mysqli_close($conn);
     }else{
         mysqli_close($conn);
         die(header("location:viewEliminarFamiliares.php"));
     }

?>