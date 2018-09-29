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

    $sql1="select * from medicamentos where idPaciente='".$_COOKIE["id"]."' and id='".$_GET["id"]."'";
    $result1=mysqli_query($conn, $sql1);

    if($result1 == FALSE) {
        mysqli_close($conn);
        die(header("location:viewModificarRutina.php?failed=true"));
    }

    $row = mysqli_fetch_assoc($result1);

    $nombre=$row["nombre"];
    $periodico=$row["periodico"];
    $dia=$row["dia"];
    $frecuencia=$row["frecuencia"];
    $hora=$row["hora"];
    $descripcion=$row["descripcion"];
    $id =$row["id"];

    if(isset($_POST['nombreModificado']) && $_POST['nombreModificado']!=""){
        $nombre = $_POST['nombreModificado'];
    }
    if(isset($_POST['periodicoModificado']) && $_POST['periodicoModificado']!=""){
        if(strcmp($_POST['periodicoModificado'],"No")==0){
            $periodico=0;
        }else if (strcmp($_POST['periodicoModificado'],"Todos los dias")==0){
            $periodico=1;
        }else if (strcmp($_POST['periodicoModificado'],"Una vez a la semana")==0){
            $periodico=2;
        }
    }
    if(isset($_POST['diaModificado']) && $_POST['diaModificado']!=""){
        if(strcmp($_POST['diaModificado'],"Lunes")==0){
            $dia=0;
        }else if(strcmp($_POST['diaModificado'],"Martes")==0){
            $dia=1;
        }else if(strcmp($_POST['diaModificado'],"Miercoles")==0){
            $dia=2;
        }else if(strcmp($_POST['diaModificado'],"Jueves")==0){
            $dia=3;
        }else if(strcmp($_POST['diaModificado'],"Viernes")==0){
            $dia=4;
        }else if(strcmp($_POST['diaModificado'],"Sabado")==0){
            $dia=5;
        }else if(strcmp($_POST['diaModificado'],"Domingo")==0){
            $dia=6;
        }
    }
    if(isset($_POST['frecuenciaModificado']) && $_POST['frecuenciaModificado']!=""){
        if(strcmp($_POST['frecuenciaModificado'],"No")==0){
            $frecuencia=0;
        }else if (strcmp($_POST['frecuenciaModificado'],"Cada 8 horas")==0){
            $frecuencia=1;
        }else if (strcmp($_POST['frecuenciaModificado'],"Cada 12 horas")==0){
            $frecuencia=2;
        }
    }
    if(isset($_POST['horaModificado']) && $_POST['horaModificado']!=""){
        $hora = $_POST['horaModificado'];
    }
    if(isset($_POST['descripcionModificado']) && $_POST['descripcionModificado']!=""){
        $descripcion = $_POST['descripcionModificado'];
    }   

    
    $sql="UPDATE medicamentos SET nombre ='".$nombre."', periodico ='".$periodico."', dia ='".$dia."', frecuencia =".$frecuencia.", hora ='".$hora."', descripcion ='".$descripcion."' where id='".$id."'";
    $result=mysqli_query($conn, $sql);
    

    if($result == FALSE) {  
        mysqli_close($conn);
        echo $sql;
    }else{
        mysqli_close($conn);
        die(header("location:viewModificarRutina.php?done=true"));
    }

?>