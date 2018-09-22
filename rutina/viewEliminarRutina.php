<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Alois - Rutina</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    
    <style>
        html,body{
            margin:0px;
            height: 100%;
            width: 100%;
        }
        #sidebar{
            background-color: #F7F7F7;
            margin: 0;
            padding: 0;
        }
    </style>
    <body onload="obtenerRecordatorios()">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white" href="../principal/"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Eliminar Rutina</a>
            <ul class="navbar-nav ml-auto" style="margin-right: 10px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gear"></span> Configuración</a>
                    <div class="dropdown-menu" style="color: white">
                        <a class="dropdown-item" href="#">Opciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../principal/scriptLogOut.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
    
        <div id="tablaHabitos">
            
        </div>
    
    <script>
        function obtenerRecordatorios(){
                $.ajax({
                    url: "scriptObtenerHabitosEliminar.php",
                    success: function(data) {
                         document.getElementById("tablaHabitos").innerHTML = data;
                    }
                });
            }
    </script>
    </body>
</html>