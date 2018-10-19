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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <style>
        .sidenav {
            height: 100%;
            width: 230px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #FFFFFF;
            overflow-x: hidden;
            padding-top: 20px;
            border-right:1px solid
        }
        .sidenav a {
            padding: 10px 8px 6px 16px;
            display: block;
            font-size: 17px;
            text-decoration: none;
            color: black;
        }
        /* Style page content */
        .main {
            margin-left: 230px; /* Same as the width of the sidebar */
            padding: 0px 10px;
        }
        .accordion {
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            outline: none;
            font-size: 17px;
            transition: 0.4s;
        }
        .active, .accordion:hover {
            color: #737373;
        }
        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
        .accordion:after {
            font-family: FontAwesome;
            content: '\f067';
            font-size: 15px;
            color: gray;
            float: right;
            margin-left: 5px;
        }
        .active:after {
            font-family: FontAwesome;
            content: '\f068';
            color: gray;
        }
    </style>
    <body onload="inicio()">
        <!--SideNAV-->
        <div class="sidenav">
            <div id="cabecera" style="padding-top: 50px">
                <img class="rounded mx-auto d-block" style="width:150px;height:100px;margin:30px 0" src="<?php echo $_COOKIE["imagen"];?>">
                <h4 class="text-center"><?php echo $_COOKIE["nombre"]." ".$_COOKIE["ape1"];?></h4>
            </div>
            <div class="list-group list-group-flush" style="padding-top: 30px">
                <a href="#" class="list-group-item list-group-item-action">Inicio</a>                            
                <a href="#horarioPaciente" class="list-group-item list-group-item-action ">Horario del Paciente</a>
                <a class="accordion">Gestion Rutina</a>
                <div class="panel">
                    <a href="../rutina/viewAñadirMedicamentos.php" class="list-group-item list-group-item-action ">Añadir Medicamentos</a>
                    <a href="../rutina/viewAñadirHabito.php" class="list-group-item list-group-item-action ">Añadir Hábito</a>
                    <a href="../rutina/viewGestionarRutina.php" class="list-group-item list-group-item-action ">Gestionar Rutina</a>
                </div>
                <a class="accordion">Gestion Recordatorios</a>
                <div class="panel">
                    <a href="../recordatorios/viewAñadirRecordatorios.php" class="list-group-item list-group-item-action ">Añadir Recordatorio</a>
                    <a href="../recordatorios/viewGestionarRecordatorios.php" class="list-group-item list-group-item-action ">Gestionar Recordatorios</a>
                </div>
                <a class="accordion">Gestion Familiares</a>
                <div class="panel">
                    <a href="../familiares/viewAñadirFamiliar.php" class="list-group-item list-group-item-action">Añadir Familiares</a>
                    <a href="../familiares/viewGestionarFamiliares.php" class="list-group-item list-group-item-action ">Gestionar Familiares</a>
                </div>
            </div>
        </div>
        
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white">Alois - Inicio</a>
            <ul class="navbar-nav ml-auto" style="margin-right: 10px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gear"></span> Configuración</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#opciones">Opciones</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#help">Ayuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="scriptLogOut.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!--Parte Principal-->
        <div class="main" style="heigth:100%;padding: 20px 30px 20px 10px;background-color:#F7F7F7">
            <div style="padding: 20px 30px 20px 10px;background-color:#ffffff;border-radius:5px">
                <h5>Ubicación del Paciente en tiempo Real:</h5>
                <!--Div para mostrar el mapa donde se encuentra el paciente-->
                <div  id="map" style="height:400px;width:100%">
                        
                </div>
            </div>
            <div id="horarioPaciente" style="padding: 20px 30px 20px 10px;background-color:#ffffff;border-radius:5px; margin-top:20px">
                <h5>Horario del Paciente:</h5>
                <!--Div para mostrar el horario configurado por el paciente-->
                <div class="table-responsive" id="horario" style="width:100%">
                        
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
        <div class="modal fade bd-example-modal-lg" id="help" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ayuda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consequat dui vel massa venenatis dictum. Aenean eget ipsum velit. Phasellus ac mollis quam, at egestas orci. Vestibulum fermentum ut nunc vel lobortis. Ut orci turpis, auctor et interdum in, gravida maximus erat. Nullam vel eleifend ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc mollis felis at gravida mattis. Integer quis eros at nisl pellentesque dapibus at consequat elit. Praesent dapibus sem in urna dapibus, ac egestas velit molestie. Cras in tortor pharetra mauris tincidunt tempor et eget libero. Integer ac leo ac massa feugiat ullamcorper.

                Sed dapibus massa quis erat molestie, sit amet consectetur justo fermentum. Vivamus a suscipit quam. Nunc augue dui, condimentum quis tristique sit amet, rhoncus sed turpis. Maecenas porta massa eget risus accumsan, quis ornare risus imperdiet. Vestibulum euismod nunc ut porttitor auctor. Aliquam vehicula felis id enim convallis elementum. Sed tortor turpis, commodo sit amet cursus sit amet, blandit ac eros. Mauris imperdiet lectus sit amet felis cursus auctor.

                Sed sed lorem consequat, porttitor turpis a, commodo leo. Curabitur in lorem sed libero pulvinar volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam in ipsum quam. Nullam sagittis feugiat sem, eget ornare est posuere at. Praesent eu metus imperdiet, laoreet justo at, euismod est. Pellentesque turpis purus, mattis a dictum in, feugiat quis nisl. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

                Integer egestas scelerisque risus vitae ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In pharetra lobortis enim, vitae egestas orci tincidunt eget. In hac habitasse platea dictumst. Donec feugiat, lacus quis facilisis scelerisque, ipsum metus volutpat nisi, sit amet egestas metus purus in libero. Morbi quis nibh eget magna cursus aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sit amet lorem lorem. Morbi sed imperdiet lorem.

                Nullam et gravida quam, a varius tortor. Nam a auctor tellus. Aliquam luctus bibendum sodales. Aliquam aliquam tellus nec metus commodo, eu sagittis lectus porttitor. Suspendisse potenti. Morbi blandit lacus enim, sit amet dignissim mauris accumsan ac. Maecenas id velit luctus, tincidunt augue eu, dictum ex. 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!--Opciones-->
        <div class="modal fade bd-example-modal-lg" id="opciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ayuda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <button type="button" class="btn btn-primary" onclick="location.href='scriptEliminarPaciente.php'">Borrar Paciente</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            } 
          });
        }
        </script>
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
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrgWR0YACVrZiWG-py7Sl_ULF4hEnVyFY&callback=initMap"></script>
    </body>
</html>