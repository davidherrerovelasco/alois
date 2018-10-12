<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <style>
        footer {
            position: fixed;
            height: 40px;
            bottom: 0;
            width: 100%;
        }
    </style>
    <body onload="inicio()">
        <div>
            <div class="row" style="height:100%;width:100%;margin:0px;">
                <!--Parte izquierda de la pantalla-->
                <div class="col-2" style="padding:0px;border-right:1px solid">
                    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
                        <a class="navbar-brand text-white">Alois - Inicio</a>
                    </nav>
                    <div id="cabecera" style="height:220px">
                        <img class="rounded mx-auto d-block" style="width:150px;height:100px;margin:30px 0" src="<?php echo $_COOKIE["imagen"];?>">
                        <h4 class="text-center"><?php echo $_COOKIE["nombre"]." ".$_COOKIE["ape1"];?></h4>
                    </div>
                    <div id="menu">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">Inicio</a>                            
                            <a href="#horario" class="list-group-item list-group-item-action ">Horario del Paciente</a>
                            <div class="btn-group dropright">
                                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestión Rutina</a>
                                <div class="dropdown-menu">
                                    <a href="../rutina/viewAñadirMedicamentos.php" class="list-group-item list-group-item-action ">Añadir Medicamentos</a>
                                    <a href="../rutina/viewAñadirHabito.php" class="list-group-item list-group-item-action ">Añadir Hábito</a>
                                    <a href="../rutina/viewGestionarRutina.php" class="list-group-item list-group-item-action ">Gestionar Rutina</a>
                                </div>
                            </div>
                            <div class="btn-group dropright">
                                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestión Recordatorios</a>
                                <div class="dropdown-menu">
                                    <a href="../recordatorios/viewAñadirRecordatorios.php" class="list-group-item list-group-item-action ">Añadir Recordatorio</a>
                                    <a href="../recordatorios/viewGestionarRecordatorios.php" class="list-group-item list-group-item-action ">Gestionar Recordatorios</a>
                                </div>
                            </div>
                            <div class="btn-group dropright">
                                <a href="#" class="list-group-item list-group-item-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Familiares</a>
                                <div class="dropdown-menu">
                                    <a href="../familiares/viewAñadirFamiliar.php" class="list-group-item list-group-item-action">Añadir Familiares</a>
                                    <a href="../familiares/viewGestionarFamiliares.php" class="list-group-item list-group-item-action ">Gestionar Familiares</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Pagina Principal-->
                <div class="col-10" style="padding-left:0px;padding-right:0px">
                    <!--Navbar-->
                    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
                            <ul class="navbar-nav ml-auto" style="margin-right: 10px">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gear"></span> Configuración</a>
                                <div class="dropdown-menu" style="color: white">
                                    <a class="dropdown-item" href="#">Opciones</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#help" style="color:black">Ayuda</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="scriptLogOut.php">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!--Parte Principal-->
                    <div style="heigth:100%;padding: 20px 30px 20px 10px;background-color:#F7F7F7">
                        <div style="padding: 20px 30px 20px 10px;background-color:#ffffff;border-radius:5px">
                            <h5>Ubicación del Paciente en tiempo Real:</h5>

                            <!--Div para mostrar el mapa donde se encuentra el paciente-->
                            <div  id="map" style="height:400px;width:100%">
                            
                            </div>
                        </div>
                        <div style="padding: 20px 30px 20px 10px;background-color:#ffffff;border-radius:5px; margin-top:20px">
                            <h5>Horario del Paciente:</h5>

                            <!--Div para mostrar el horario configurado por el paciente-->
                            <div class="table-responsive" id="horario" style="width:100%">
                            
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        <!-- Modal para el registro de un familiar -->
        <div class="modal fade bd-example-modal-lg" id="registroFamiliar" tabindex="-1" role="dialog" aria-labelledby="registroFamiliar" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro Familiar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <small>No hay ningun familiar registrado para este paciente. Por favor registre uno.</small>
                       <form action="../familiares/scriptRegistrarFamiliar.php" method="post" enctype="multipart/form-data">
                           <div class="form-row">
                               <div class="form-group col-md-6" style="padding-left: 0px">
                                   <label for="emailFamiliar">Email</label>
                                   <input type="email" class="form-control" name="emailFamiliar" placeholder="Email" required>
                               </div>
                           </div>
                           <div class="form-row">
                               <div class="form-group col-md-4" style="padding-left: 0px">
                                   <label for="nombreFamiliar">Nombre</label>
                                   <input type="text" class="form-control" name="nombreFamiliar" placeholder="Nombre" required>
                               </div>
                               <div class="form-group col-md-4" >
                                   <label for="ape1Familiar">Apellido 1</label>
                                   <input type="text" class="form-control" name="ape1Familiar" placeholder="Primer Apellido">
                               </div>
                               <div class="form-group col-md-4" style="padding-right: 0px">
                                   <label for="ape2Familiar">Apellido 2</label>
                                   <input type="text" class="form-control" name="ape2Familiar" placeholder="Segundo Apellido" required>
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="direccionFamiliar">Dirección</label>
                               <input type="text" class="form-control" name="direccionFamiliar" placeholder="Calle, número">
                           </div>

                           <div class="form-row">
                               <div class="form-group col-md-3" >
                                   <label for="edadFamiliar">Edad</label>
                                   <input type="number" class="form-control" name="edadFamiliar" placeholder="Edad">
                               </div>
                               <div class="form-group col-md-6" style="padding-right: 0px">
                                   <label for="telefonoFamiliar">Teléfono</label>
                                   <input type="tel" class="form-control" name="telefonoFamiliar" placeholder="" required>
                               </div>
                           </div>

                           <div class="form-row">
                               <div class="form-group col-md-6" style="padding-left: 0px">
                                   <label for="ciudadFamiliar">Ciudad</label>
                                   <input type="text" class="form-control" name="ciudadFamiliar">
                               </div>
                               <div class="form-group col-md-6" style="padding-right: 0px">
                                   <label for="provinciaFamiliar">Provincia</label>
                                   <select name="provinciaFamiliar" class="form-control">
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
                           <div class="form-group">
                                <label>Añada una foto del familiar</label>
                                <input type="file" class="form-control-file" name="imagen">
                           </div>
                           <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Añadir</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para la presentacion de la Ayuda -->
        <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ayuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
            function initMap() {
              var uluru = {lat: -25.344, lng: 131.036};
              var map = new google.maps.Map(document.getElementById('map'), {zoom: 4, center: uluru});
            }
            
            function inicio(){
                //funcion de inicio, saca por pantalla el modal de registro de un familiar si detecta que el paciente no tiene familiar asociado.
                $.ajax({
                    url: "scriptInicioPrincipal.php",
                    success: function(data) {
                        if(data==0){
                            $("#registroFamiliar").modal({backdrop: "static"});
                        }
                    }
                });
                
                $.ajax({
                    url: "scriptHorario.php",
                    success: function(data) {
                         document.getElementById("horario").innerHTML = data;
                    }
                });
            }
        </script>            
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnZJp9QqlNIgSOHCsYlw_3USh6fXffFsk&callback=initMap"></script>
    </body>
</html>