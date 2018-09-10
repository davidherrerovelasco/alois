<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alois</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .footer-icons{
            margin-right: 5px;
            font-size:25px;
            color:darkgrey;
        }
        
        body {
          padding-top: 54px;
        }

        .carousel-item {
          height: 65vh;
          min-height: 300px;
          background: no-repeat center center scroll;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        
    </style>
    
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
            "link": "http://politicadecookies.com/"
          }
        })});
    </script>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#59b300">
        <!-- Para pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Enlaces-->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="color:white">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:white">Sobre Nosotros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" style="color:white">Contacto </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:white">Contacto </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color:white">Contacto </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/signup" style="color:white"><span class="fa fa-user"></span> Regístrate</a></li>
                <li class="nav-item"><a class="nav-link" href="scriptComprobacion.php" style="color:white"><span class="fa fa-sign-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    
    <header>
        <!-- Carrousel sin controles -->
      <div class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        <div class="carousel-inner">
            
          <!-- Primer Slide -->
          <div class="carousel-item active">
              <img class="img-fluid" src="Images/foto7.jpeg" alt="First slide" style="height:65vh;width:100vw">
              <div class="carousel-caption d-none d-md-block">
                <h5>Primera Prueba</h5>
                <p>...</p>
              </div>
          </div>
          <!-- Segundo Slide-->
          <div class="carousel-item">
              <img class="img-fluid" src="Images/foto6.jpeg" alt="First slide" style="height:65vh;width:100vw">
              <div class="carousel-caption d-none d-md-block">
                <h5>Segunda Prueba</h5>
                <p>...</p>
              </div>
          </div>
          <!-- Tercer Slide -->
          <div class="carousel-item">
              <img class="img-fluid" src="Images/foto3.jpeg" alt="First slide" style="height:65vh;width:100vw">
              <div class="carousel-caption d-none d-md-block">
                <h5>Tercera Prueba</h5>
                <p>...</p>
              </div>
          </div>
        </div>
      </div>
    </header>
    
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
    
    <!-- Contacto -->
    <div id="contact" class="container-fluid" style="padding-left: 60px;padding-right: 60px; padding-top: 60px">
        <h2 class="text-center">CONTACTO</h2>
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
        <div class="text-center" style="padding-bottom: 10px">
            <p>David Herrero Velasco, Universidad de Salamanca</p>
            <p>&copy All right Reserved.</p>
        </div>
    </footer>
    
</body>
</html>