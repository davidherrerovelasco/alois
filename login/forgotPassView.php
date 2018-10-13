<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Pass</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <style>
        .contenedor{
            max-width: 700px;
            background-color: #F7F7F7;
            padding: 20px 25px 20px;
            margin:0 auto;
            margin-top: 100px;
            border-radius: 11px;
        }
        .boton{
            width:200px;
            margin:10px 0;
        }
    </style>
    
</head>
<body style="background-color:#00264d">
<div class="container-fluid">
    <div class="contenedor">
        <h3 class="text-center">Establecer Nueva Contraseña</h3>
        <form action="scriptForgotPass.php" method="post" style="padding-top:15px">
            <div class="form-group" style="padding-left: 0px">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <p class="text-center">Te enviaremos un email con el correo que nos proporcionaste</p>
            <div class="text-center">
                <button class="btn btn-primary pull-right boton" type="submit">Enviar</button>
            </div>
            <?php 
                if ($_GET["loginFailed"]) 
                echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El usuario o la contraseña no son correctas</div>';
            ?>
        </form>
    </div>
</div>
</body>
</html>