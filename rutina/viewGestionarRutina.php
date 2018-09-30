<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alois - Habitos</title>
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
              $("#modificarMedicamentos").modal("show");
              $("#modificarHabitos").modal("show");
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
    <body onload="obtenerHabitos()">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white" href="../principal/"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Modificar Hábitos</a>
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
                 echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">Ha habido un error al modificar el hábito</div>';
            }
            if ($_GET["done"]){
                 echo'<div class="alert alert-success" style="margin-top: 10px;" role="alert">El hábito ha sido modificado correctamente</div>';
            } 
        ?>
    
        <div id="tablaHabitos">
            
        </div>
        <?php 
            if ($_GET["modificarMedicamentos"]){
                echo'<div id="modificarMedicamentos" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificar Medicamentos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="scriptModificarMedicamentos.php?id='.$_GET["id"].'" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label>Nombre</label>
                                            <input type="text" name="nombreModificado" class="form-control" placeholder="Nombre" value="'.$_GET["nombre"].'">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-7">   
                                            <label>Día</label>
                                            <select name="diaModificado" class="form-control">
                                                <option selected></option>
                                                <option>Lunes</option>
                                                <option>Martes</option>
                                                <option>Miercoles</option>
                                                <option>Jueves</option>
                                                <option>Viernes</option>
                                                <option>Sabado</option>
                                                <option>Domingo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">   
                                            <label>Hora</label>
                                            <input type="time" name="horaModificado" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Periodicidad</label>
                                                <select name="periodicidadModificada" class="form-control">
                                                    <option selected>No</option>
                                                    <option>Todos los dias</option>
                                                    <option>Una vez a la semana</option>
                                                </select>
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
            } else if ($_GET["modificarHabitos"]){
                 echo'<div id="modificarHabitos" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificar Habitos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="scriptModificarHabito.php?id='.$_GET["id"].'" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label>Nombre</label>
                                            <input type="text" name="nombreModificado" class="form-control" placeholder="Nombre" value="'.$_GET["nombre"].'">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-7">   
                                            <label>Día</label>
                                            <select name="diaModificado" class="form-control">
                                                <option selected></option>
                                                <option>Lunes</option>
                                                <option>Martes</option>
                                                <option>Miercoles</option>
                                                <option>Jueves</option>
                                                <option>Viernes</option>
                                                <option>Sabado</option>
                                                <option>Domingo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">   
                                            <label>Hora</label>
                                            <input type="time" name="horaModificado" class="form-control">
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
            }
        ?>
    <script>
        function obtenerHabitos(){
                $.ajax({
                    url: "scriptObtenerHabitosGestion.php",
                    success: function(data) {
                         document.getElementById("tablaHabitos").innerHTML = data;
                    }
                });
            }
    </script>
    </body>
</html>