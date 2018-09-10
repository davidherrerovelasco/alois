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
             $("#modificarFamiliares").modal("show");
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
    <body onload="obtenerFamiliares()">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white" href="principalView.php"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Modificar Familiares</a>
            <ul class="navbar-nav ml-auto" style="margin-right: 10px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gear"></span> Configuración</a>
                    <div class="dropdown-menu" style="color: white">
                        <a class="dropdown-item" href="#">Opciones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <?php
            if ($_GET["failed"]){
                 echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">Ha habido un error al modificar el familiar</div>';
            }
            if ($_GET["done"]){
                 echo'<div class="alert alert-success" style="margin-top: 10px;" role="alert">El familiar ha sido modificado correctamente</div>';
            } 
        ?>
    
        <div id="tablaFamiliares">
            
        </div>
        <?php 
            if ($_GET["modificar"]) 
            echo'<!--Modal para la modificacion de los familiares-->
            <div id="modificarFamiliares" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar Paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form style="margin-top: 15px" action="scriptModificarFamiliares.php?email='.$_GET["email"].'" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-4" style="padding-left: 0px">
                                        <label for="nombreModificado">Nombre</label>
                                        <input type="text" class="form-control" name="nombreModificado" value="'.$_GET["nombre"].'">
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label for="ape1Modificar">Apellido 1</label>
                                        <input type="text" class="form-control" name="ape1Modificado" value="'.$_GET["ape1"].'">
                                    </div>
                                    <div class="form-group col-md-4" style="padding-right: 0px">
                                        <label for="ape2Modificado">Apellido 2</label>
                                        <input type="text" class="form-control" name="ape2Modificado" value="'.$_GET["ape2"].'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="direccionModificado">Dirección</label>
                                    <input type="text" class="form-control" name="direccionModificado" id="direccionModificado" value="'.$_GET["direccion"].'">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3" >
                                        <label for="edadModificado">Edad</label>
                                        <input type="number" class="form-control" name="edadModificado">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6" style="padding-left: 0px">
                                        <label for="ciudadModificado">Ciudad</label>
                                        <input type="text" class="form-control" name="ciudadModificado" id="ciudadModificado">
                                    </div>
                                    <div class="form-group col-md-6" style="padding-right: 0px">
                                        <label for="provinciaModificado">Provincia</label>
                                        <select name="provinciaModificado" class="form-control">
                                            <option selected> </option>
                                            <option>Salamanca</option>
                                            <option>León</option>
                                            <option>Zamora</option>
                                            <option>Palencia</option>
                                            <option>Valladolid</option>
                                            <option>Ávila</option>
                                            <option>Burgos</option>
                                            <option>Soria</option>
                                            <option>Segovia</option>
                                        </select>
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
        function obtenerFamiliares(){
                $.ajax({
                    url: "scriptObtenerFamiliaresModificar.php",
                    success: function(data) {
                         document.getElementById("tablaFamiliares").innerHTML = data;
                    }
                });
            }
    </script>
    </body>
</html>