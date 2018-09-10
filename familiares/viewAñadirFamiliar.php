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
    
<body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white" href="principalView.php"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Añadir Familiares</a>
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
    
        <!--Formulario-->
        <div class="container-fluid" style="padding:20px">
            <form action="scriptRegistrarFamiliar.php" method="post">
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
                    <label for="exampleFormControlFile1">Añada una foto del familiar</label>
                    <input type="file" class="form-control-file" name="imagen">
                </div>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </form>
        </div>
    </body>
</html>