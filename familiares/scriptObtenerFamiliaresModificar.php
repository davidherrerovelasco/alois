<?php
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

    $sql = "SELECT * FROM familiares where idPaciente='".$_COOKIE["id"]."'";
    $result = mysqli_query($conn, $sql);

    if($result == FALSE) {
        echo "ha ocurrido un error ".$sql;
        mysqli_close($conn);
    }else{
        $tabla = '<table class="table">
                <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido 1</th>
                  <th scope="col">Apellido 2</th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>';
        
            while ($fila = $result->fetch_assoc()) {
                $tabla=$tabla.'<tr><td>'.$fila["nombre"].'</td><td>'.$fila["ape1"].'</td><td>'.$fila["ape2"].'</td><td>'.$fila["email"].'</td><td><a class="btn btn-primary" href="scriptObtenerFamiliares.php?id='.$fila["id"].'" role="button">Modificar</a></td></tr>';
            }
            $tabla=$tabla.'</tbody></table>';
            echo $tabla;
            mysqli_close($conn);
    }
?>