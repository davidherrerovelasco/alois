<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .contenedor{
            max-width: 650px;
            background-color: #F7F7F7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 30px;
            border-radius: 11px;
        }
    </style>
    <script>
        function comprobarCheck(){
            var checkBox = document.getElementById("check");
            if(checkBox.checked){
                document.getElementById("formulario").submit();
            }else{
                $('#modal').modal(show);
            }
        }
    </script>
</head>
<body style="background-color:#00264d">
<div class="container-fluid">
    <div class="contenedor">
        <h2 class="text-center">Regístrate</h2>
        <form action="scriptSignup.php" method="post" enctype="multipart/form-data" id="formulario">
            <div class="form-row">
                <div class="form-group col-md-6" style="padding-left: 0px">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6" style="padding-right: 0px">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4" style="padding-left: 0px">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-4" >
                    <label for="ape1">Apellido 1</label>
                    <input type="text" class="form-control" name="ape1" placeholder="Primer Apellido">
                </div>
                <div class="form-group col-md-4" style="padding-right: 0px">
                    <label for="ape2">Apellido 2</label>
                    <input type="text" class="form-control" name="ape2" placeholder="Segundo Apellido">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="direccion" placeholder="Calle, número">
            </div>

            <div class="form-row">
                <div class="form-group col-md-3" style="padding-left: 0px">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control">
                        <option selected> </option>
                        <option>Hombre</option>
                        <option>Mujer</option>
                    </select>
                </div>
                <div class="form-group col-md-3" >
                    <label for="age">Edad</label>
                    <input type="number" class="form-control" name="edad" placeholder="Edad">
                </div>
                <div class="form-group col-md-6" style="padding-right: 0px">
                    <label for="phone">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" placeholder="" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6" style="padding-left: 0px">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad">
                </div>
                <div class="form-group col-md-6" style="padding-right: 0px">
                    <label for="inputState">Provincia</label>
                    <select name="provincia" class="form-control">
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
                <label>Foto del Paciente</label>
                <input type="file" class="form-control-file" name="imagen">
            </div>
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check" >
                <label class="form-check-label" for="gridCheck">
                    Acepto terminos y condiciones.
                </label>
            </div>
            <button class="btn btn-primary pull-right" style="margin-top: 10px" onclick="comprobarCheck()">Registrarse</button>
            <?php 
                if ($_GET["signupFailed"]) 
                echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El usuario ya existe en el sistema o los datos son incorrectos</div>';
            ?>
            <?php 
                if ($_GET["ImageNotSupported"]) 
                echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El formato de la imagen no es admitido</div>';
            ?>
        </form>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Para porder registrarse debe de aceptar los Términos y Condiciones del servidor
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>