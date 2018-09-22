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

    $sql = "SELECT * FROM habitos where idPaciente='".$_COOKIE["id"]."'";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM medicamentos where idPaciente='".$_COOKIE["id"]."'";
    $result1 = mysqli_query($conn, $sql1);

    if($result == FALSE && $result1==FALSE) {
        echo "ha ocurrido un error ".$sql;
        mysqli_close($conn);
    }else{
        $tabla = '<table class="table">
                <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Día</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Descripción</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>';
        
            while ($fila = $result->fetch_assoc()) {
                if($fila["dia"]==0){
                    $diaTemp="Lunes";
                }else if($fila["dia"]==1){
                    $diaTemp="Martes";
                }else if($fila["dia"]==2){
                    $diaTemp="Miércoles";
                }else if($fila["dia"]==3){
                    $diaTemp="Jueves";
                }else if($fila["dia"]==4){
                    $diaTemp="Viernes";
                }else if($fila["dia"]==5){
                    $diaTemp="Sábado";
                }else if($fila["dia"]==6){
                    $diaTemp="Domingo";
                }
                $tabla=$tabla.'<tr><td>'.$fila["nombre"].'</td><td>'.$diaTemp.'</td><td>'.$fila["hora"].'</td><td>'.$fila["descripcion"].'</td><td><a class="btn btn-primary" href="scriptEliminarHabitos.php?id='.$fila["id"].'" role="button">Eliminar</a></td></tr>';
            }
        
            while ($fila2 = $result1->fetch_assoc()) {
                if($fila2["dia"]==0){
                    $diaTemp2="Lunes";
                }else if($fila2["dia"]==1){
                    $diaTemp2="Martes";
                }else if($fila2["dia"]==2){
                    $diaTemp2="Miércoles";
                }else if($fila2["dia"]==3){
                    $diaTemp2="Jueves";
                }else if($fila2["dia"]==4){
                    $diaTemp2="Viernes";
                }else if($fila2["dia"]==5){
                    $diaTemp2="Sábado";
                }else if($fila2["dia"]==6){
                    $diaTemp2="Domingo";
                }
                $tabla=$tabla.'<tr class="table-danger"><td>'.$fila2["nombre"].'</td><td>'.$diaTemp2.'</td><td>'.$fila2["hora"].'</td><td>'.$fila2["descripcion"].'</td><td><a class="btn btn-primary" href="scriptEliminarMedicamentos.php?id='.$fila2["id"].'" role="button">Eliminar</a></td></tr>';
            }
        
            $tabla=$tabla.'</tbody></table>';
            echo $tabla;
            mysqli_close($conn);
    }
?>