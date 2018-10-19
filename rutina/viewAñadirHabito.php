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
    
<body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand text-white" href="../principal"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Hábito</a>
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
    
        <!--Formulario-->
        <div class="container-fluid" style="padding:20px">
            <form action="scriptAñadirHabito.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label>Nombre del Hábito</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">   
                        <label>Día</label>
                        <select name="dia" class="form-control">
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
                    <div class="form-group col-md-3">   
                        <label>Hora</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                      <label for="comment">Descripción:</label>
                      <textarea class="form-control" rows="5" name="descripcion"></textarea>
                    </div> 
                </div>
                
                <!--Imprimimos mensaje de exito si todo ha salido bien-->
                <?php 
                if ($_GET["success"]) 
                echo'<div class="alert alert-success" style="margin-top: 10px;" role="alert">El habito se ha añadido</div>';
                ?>
                <button type="submit" class="btn btn-primary">Añadir Hábito</button>
            </form>
        </div>
    
    </body>
</html>