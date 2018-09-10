<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <style>
        .contenedor{
            max-width: 380px;
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
        <h2 class="text-center">Login</h2>
        <form action="scriptLogin.php" method="post" style="padding-top:25px">
            <div class="form-group" style="padding-left: 0px">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group" style="padding-right:0px;padding-top:5px">
                <label>Contraseña:</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="text-center">
                <button class="btn btn-primary pull-right boton" type="submit">Entrar</button>
            </div>
            <?php 
                if ($_GET["loginFailed"]) 
                echo'<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El usuario o la contraseña no son correctas</div>';
            ?>
            <div class="text-center" style="padding-bottom: 10px">
                <a href="signupView.php"> ¿No estas registrado? Regístrate</a>
                <br>
                <a href="url"> He olvidado la contraseña</a>
                <p style="font-size:10px;padding-top:10px">Copyright &copy 2018 Alois,Inc</p>
            </div>
        </form>
    </div>
</div>
</body>
</html>