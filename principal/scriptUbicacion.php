<?php
$servername = "localhost";
$username = "root";
$password = "tomate";
$dbname = "tfg";

/*$servername = 'db755746108.db.1and1.com';
$username = 'dbo755746108';
$password = "Salamanca_00";
$dbname = 'db755746108';*/
$idPaciente = $_COOKIE["id"];

//Creamos la conexion con el servidor mysql:
$conn = mysqli_connect($servername, $username, $password,$dbname);
//Comprobamos la conexion:
if (!$conn) {
    $date = getdate();
    $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
    error_log("ERROR [".$fecha."] scriptUbicacion.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
    mysqli_close($conn);
    die(header("location:index.php"));
}

//Obtenemos la ubicacion:
$sql = "SELECT * FROM localizacion where idPaciente='".$idPaciente."'";
$result = mysqli_query($conn, $sql);
if($result == FALSE) {
    $date = getdate();
    $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
    error_log("ERROR [".$fecha."] scriptUbicacion.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
    mysqli_close($conn);
    die(header("location:index.php"));
}else{
    $row = $result->fetch_array();
    $myObj->lat = $row["latitud"];
    $myObj->lon = $row["longitud"];

    $myJSON = json_encode($myObj);
    mysqli_close($conn);
    echo $myJSON;
}
?>