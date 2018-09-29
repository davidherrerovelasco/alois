<?php
    $servername = "localhost";
    $username = "root";
    $password = "tomate";
    $dbname = "tfg";
    $idPaciente = $_COOKIE["id"];

    //Creamos la conexion con el servidor mysql:
    $conn = mysqli_connect($servername, $username, $password,$dbname);
            
    //Comprobamos la conexion:
    if (!$conn) {
        mysqli_close($conn);
        die("Connection failed: " . mysqli_connect_error());
    }

    $consulta_habitos = "SELECT * FROM habitos where idPaciente='".$idPaciente."' order by hora";
    $result1 = mysqli_query($conn, $consulta_habitos);
    while($row = $result1->fetch_array())
    {
        $rows[] = $row;
    }

    $consulta_medicamentos = "SELECT * FROM medicamentos where idPaciente='".$idPaciente."' order by hora";
    $result2 = mysqli_query($conn, $consulta_medicamentos);
    while($row2 = $result2->fetch_array())
    {
        $rows2[] = $row2;
    }

    if($result1 == FALSE and $result2==FALSE) {
        echo "Ha ocurrido un error";
        mysqli_close($conn);
    }else{
        $tabla = '<table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Lunes</th>
                  <th scope="col">Martes</th>
                  <th scope="col">Miercoles</th>
                  <th scope="col">Jueves</th>
                  <th scope="col">Viernes</th>
                  <th scope="col">Sábado</th>
                  <th scope="col">Domingo</th>
                </tr>
              </thead>
              <tbody>';

        //Representamos horas desde las 8 hasta las 23
        for($i=0;$i<16;$i++){
            $horaTemp=$i+8;
            $tabla=$tabla.'<tr><th scope="row">'.$horaTemp.':00</th>';
            for($j=0;$j<7;$j++){
                $tabla=$tabla.'<td>';
                foreach($rows as $row){
                    list($hora, $minutos, $segundos) = explode(":",$row["hora"]);
                    if($hora == $horaTemp){
                        if($j == $row["dia"]){
                            $tabla=$tabla.$row["nombre"]."</br>";
                        }
                    }
                }
                foreach($rows2 as $row2){
                    list($hora2, $minutos2, $segundos2) = explode(":",$row2["hora"]);
                    
                    $caracteres2 = preg_split('//', $hora2, -1, PREG_SPLIT_NO_EMPTY);
                    if($caracteres2[0] == 0){
                        $horaTemp="0".$horaTemp;
                    }
                    
                    if($hora2 == $horaTemp){
                        if($j == $row2["dia"]){
                            $tabla=$tabla.$row2["nombre"]."</br>";
                            $tabla=$tabla.$hora2."</br>";
                        }
                    }
                }
                $tabla=$tabla.'</td>';
            }
            $tabla=$tabla.'</tr>';
        } 
        $tabla=$tabla.'</tbody></table>';
        mysqli_close($conn);
        echo $tabla;
    }
?>