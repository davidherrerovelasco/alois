<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alois - Familiares</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script>
          $(document).ready(function()
          {
             $("#modificarRecordatorios").modal("show");
          });
        </script>
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
            <a class="navbar-brand text-white" href="../principal/"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Modificar Recordatorios</a>
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
        <?php
            if ($_GET["failed"]){
                 echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">Ha habido un error al modificar el recordatorio</div>';
            }
            if ($_GET["done"]){
                 echo'<div class="alert alert-success" style="margin-top: 10px;" role="alert">El recordatorio ha sido modificado correctamente</div>';
            } 
        ?>
    
        <div id="tablaRecordatorios">
            
        </div>
        <?php 
            if ($_GET["modificar"]) 
            echo'<!--Modal para la modificacion de los Recordatorios-->
                <div id="modificarRecordatorios" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificar Paciente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="scriptModificarRecordatorio.php?id='.$_GET["id"].'" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label>Nombre</label>
                                            <input type="text" name="nombreModificado" class="form-control" placeholder="Nombre" value="'.$_GET["nombre"].'" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">   
                                            <label>Fecha Inicio</label>
                                            <input type="date" name="fechaInicioModificado" class="form-control" value="'.$_GET["fInicio"].'" required>
                                        </div>
                                        <div class="form-group">   
                                            <label>Fecha Fin</label>
                                            <input type="date" name="fechaFinModificado" class="form-control" value="'.$_GET["fFin"].'" required>
                                        </div>
                                        <div class="form-group">   
                                            <label>Hora</label>
                                            <input type="time" name="horaModificado" class="form-control" value="'.$_GET["hora"].'" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                          <label for="comment">Descripción:</label>
                                          <textarea class="form-control" rows="5" name="descripcionModificado" value="'.$_GET["descripcion"].'"></textarea>
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
        ?>
    <script>
        function obtenerRecordatorios(){
                $.ajax({
                    url: "scriptObtenerRecordatoriosGestion.php",
                    success: function(data) {
                         document.getElementById("tablaRecordatorios").innerHTML = data;
                    }
                });
            }
    </script>
    </body>
</html>