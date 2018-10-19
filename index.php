<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alois</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!--Mensaje para la aceptacion de la politica de cookies-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#3c404d",
              "text": "#d6d6d6"
            },
            "button": {
              "background": "transparent",
              "text": "#8bed4f",
              "border": "#8bed4f"
            }
          },
          "content": {
            "message": "Utilizamos cookies propias para mejorar nuestros servicios. Si continua con la navegación,consideramos que acepta su uso",
            "dismiss": "Lo tengo!",
            "link": "https://cookiesandyou.com/"
          }
        })});
    </script>
    <style>
        body, html {
            height: 100%;
        }
        .parallax {
            height: 100%;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
        }  
        .footer-icons{
            margin-right: 5px;
            font-size:25px;
            color:darkgrey;
        }
    </style>

</head>
<body>
    
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Para pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Enlaces-->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#proyect">Proyecto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contacto</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/signup"><span class="fa fa-user"></span> Regístrate</a></li>
                <li class="nav-item"><a class="nav-link" href="scriptComprobacion.php"><span class="fa fa-sign-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="parallax" style="background-image: url('Images/foto8.jpg');opacity: 0.60;">
        <div class="container-fluid" style="background='transparent';">
            <h1 class="text-center" style="background-color:transparent;color: #ffffff;">¿Conoces a alguien con Alzheimer?</h1>
            <h3 class="text-center" style="background-color:transparent;color: #ffffff;">Podemos ayudarte. Sigue leyendo</h3>
        </div>
    </div>
    
    <div class="container-fluid" style="padding-left: 60px;padding-right: 60px;padding-top: 60px; padding-bottom: 30px" id="proyect">
        <h2>Proyecto</h2><br>
        <h4>Nuestra idea era ayudar a personas y afectados de una enfermedad tan complicada como el Alzheimer.
            Para ello hemos desarrollado esta aplicación con el fin de que los pacientes dispongan de mayor aoutonomia en su día a día
            ademas de proporcionar cierta calma a las personas encargadas de su cuidado.
        </h4>
        <br><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
            ut aliquip ex ea commodo consequat.
        </p>
    </div>
    
    <div class="parallax" style="background-image: url('Images/foto2.jpeg');opacity: 0.60;">
        <div class="container-fluid" style="background='transparent'">
            <h1 class="text-center" style="background-color:transparent;color: #ffffff;"><i>“El alzhéimer tiene un coste social y emocional altísimo, porque no solo provoca el desgaste cerebral del paciente, sino también de su familia”</i></h1>
            <h3 class="text-center" style="background-color:transparent;color: #ffffff;"><b>Ana Martínez Gil</b></h3>
        </div>
    </div>
    
    <div id="servicios" class="container-fluid" style="padding-left: 60px;padding-right: 60px; padding-top: 60px">
        <h2 class="text-center">Servicios</h2>
        <h5 class="text-center" style="margin-bottom: 40px;">Ofrecemos gran varidad de servicios para que no tengas que preocuparte de nada.</h5>
        <div class="card-deck" style="padding-right: 10px; padding-left: 10px; padding-bottom: 60px">
        <div class="card">
            <img class="card-img-top" src="Images/servicio1.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Localización</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="Images/servicio2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Recordatorios</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="Images/servicio3.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Ejercita la Memoria</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
        </div>
        </div>
    </div>
    
    <div class="parallax" style="background-image: url('Images/foto5.jpg');opacity: 0.60;">
        <div class="container-fluid" style="background='transparent'">
            <h1 class="text-center" style="background-color:transparent;color: #ffffff;"><i>“El 90% de las demencias leves están sin diagnosticar”.</i></h1>
            <h3 class="text-center" style="background-color:transparent;color: #ffffff;"><b>Pablo Martínez-Lage</b></h3>
        </div>
    </div>
    
    
    <!-- Contacto -->
    <div id="contact" class="container-fluid" style="padding-left: 60px;padding-right: 60px; padding-top: 60px">
        <h2 class="text-center">Contacto</h2>
        <h5 class="text-center" style="margin-bottom: 20px;">Contacta con nosotros, intentaremos responderle con la mayor brevedad posible</h5>
        <div class="row" style="padding-right: 60px; padding-left:60px">
            <div class="col-sm-5" style="padding-top:30px">
                <p><span class="fa fa-map-marker"></span> Salamanca, ES</p>
                <p><span class="fa fa-phone"></span> +00 1515151515</p>
                <p><span class="fa fa-envelope-o"></span> davidherr@usal.es</p>
            </div>
            <div class="col-sm-7">
                <form action="mensaje.php" method="post" >
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="nombre" placeholder="Nombre" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="contenido" placeholder="Introduzca aquí su mensaje" rows="5"></textarea><br>
                    <button class="btn btn-default pull-right" type="submit" style="width:90px">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    
    <footer style="background-color:#F7F7F7;margin-top:30px">
        <div style="padding-top: 15px">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-unstyled list-inline text-center">
                    <li class="list-inline-item"><a href=""><i class="fa fa-facebook footer-icons"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-twitter footer-icons"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-google-plus footer-icons"></i></a></li>
                    <li class="list-inline-item"><a href=""><i class="fa fa-envelope footer-icons"></i></a></li>
                </ul>
            </div>
            <hr>
        </div>
        <div class="container-fluid text-center" style="padding-bottom: 10px">
            <div class="row">
                <div class="col-sm">
                  <img src="Images/tcue.jpg" style="height:80px">
                </div>
                <div class="col-sm">
                    <p>David Herrero Velasco, Universidad de Salamanca</p>
                    <p>&copy All right Reserved.</p>
                </div>
                <div class="col-sm">
                  <img src="Images/usal.jpg" style="height:80px">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
