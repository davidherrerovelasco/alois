<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";

    /*$servername = 'db755746108.db.1and1.com';
    $username = 'dbo755746108';
    $password = "Salamanca_00";
    $dbname = 'db755746108';*/

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);    
    //Comprobamos la conexion:
    if (!$conn) {
        date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptObtenerRecordatoriosGestion.php - Error al conectarse a la base de datos: ".mysqli_connect_error()."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php"));
    }

    $sql = "SELECT * FROM recordatorios where idPaciente='".$_COOKIE["id"]."'";
    $result = mysqli_query($conn, $sql);
    if($result == FALSE) {
        $date = getdate();
        $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        error_log("ERROR [".$fecha."] scriptObtenerRecordatoriosGestion.php - Error SELECT: ".$sql." ".mysqli_error($conn)."\n", 3, "../error.log");
        mysqli_close($conn);
        die(header("location:viewGestionarRecordatorios.php"));
    }else{
        $tabla = '<table class="table">
                <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Fecha Inicio</th>
                  <th scope="col">Fecha Fin</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>';
        
            while ($fila = $result->fetch_assoc()) {
                $tabla=$tabla.'<tr>
                <td>'.$fila["nombre"].'</td>
                <td>'.$fila["fechaInicio"].'</td>
                <td>'.$fila["fechaFin"].'</td>
                <td>'.$fila["descripcion"].'</td>
                <td><a class="btn btn-primary" href="scriptObtenerRecordatorios.php?id='.$fila["id"].'" role="button">Modificar</a></td>
                <td><a class="btn btn-primary" href="scriptEliminarRecordatorios.php?id='.$fila["id"].'" role="button">Eliminar</a></td>
                </tr>';
            }
            $tabla=$tabla.'</tbody></table>';
            echo $tabla;
            mysqli_close($conn);
    }
?>