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

    $sql = "SELECT * FROM habitos where id='".$id."'";
    $result = mysqli_query($conn, $sql);

     if($result == FALSE) {
         echo "Ha habido un error";
         mysqli_close($conn);
     }else{
         $row = mysqli_fetch_assoc($result);
         mysqli_close($conn);
         die(header("location:viewModificarRutina.php?modificarHabitos=true&nombre=".$row["nombre"]."&descripcion=".$row["descripcion"]."&id=".$row["id"]));
     }
?>