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
    while($row = $result1->fetch_array()){
        $habitos[] = $row;
    }

    $consulta_medicamentos = "SELECT * FROM medicamentos where idPaciente='".$idPaciente."' order by hora";
    $result2 = mysqli_query($conn, $consulta_medicamentos);
    while($row2 = $result2->fetch_array()){
        $medicinas[] = $row2;
        if($row2["periodico"]==1){//periodicidad todos los dias
            for($i=0;$i<7;$i++){
                if($row2["dia"]!=$i){
                    $row2["dia"]=$i;
                    $medicinas[] = $row2;
                }
            }
        }
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
            //En la base de datos las horas menores que 10 se almacenan 09 por tanto para que la
            //comprobacion se haga correctamente para estos casos hay que añadir un 0 delante.
            if($horaTemp<10){
                $horaTemp="0".$horaTemp;
            }
            
            $tabla=$tabla.'<tr><th scope="row">'.$horaTemp.':00</th>';
            
            for($j=0;$j<7;$j++){
                $tabla=$tabla.'<td>';
                //Hábitos
                foreach($habitos as $habito){
                    //Separamos la hora del formato que nos llega desde la base de datos
                    list($hora, $minutos, $segundos) = explode(":",$habito["hora"]);
                    if($hora == $horaTemp){
                        if($j == $habito["dia"]){
                            $tabla=$tabla.$habito["nombre"]."</br>";
                        }
                    }
                }
                //Medicinas
                foreach($medicinas as $medicina){
                    //Separamos la hora del formato que nos llega desde la base de datos
                    list($hora2, $minutos2, $segundos2) = explode(":",$medicina["hora"]);                    
                    if($hora2 == $horaTemp){
                        if($j == $medicina["dia"]){
                            $tabla=$tabla.$medicina["nombre"]."</br>";
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