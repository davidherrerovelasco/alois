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
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function () {
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
            })
        });
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

        .footer-icons {
            margin-right: 5px;
            font-size: 25px;
            color: darkgrey;
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
            <li class="nav-item"><a class="nav-link" href="scriptComprobacion.php"><span class="fa fa-sign-in"></span>
                    Login</a></li>
        </ul>
    </div>
</nav>

<div class="parallax img-fluid" style="background-image: url('Images/foto8.jpg');opacity: 0.60;">
    <div class="container-fluid" style="background='transparent';">
        <h1 class="text-center" style="background-color:transparent;color: #ffffff;">¿Conoces a alguien con Alzheimer?</h1>
        <h3 class="text-center" style="background-color:transparent;color: #ffffff;">Podemos ayudarte. Sigue leyendo</h3>
    </div>
</div>
<div class="container-fluid" style="padding-left: 60px;padding-right: 60px;padding-top: 60px; padding-bottom: 30px"
     id="proyect">
    <h2>Proyecto</h2><br>
    <h4>Nuestra idea era ayudar a personas y afectados de una enfermedad tan complicada como el Alzheimer.
        Para ello hemos desarrollado esta aplicación con el fin de que los pacientes dispongan de mayor autonomia en su
        día a día
        además de proporcionar cierta calma a las personas encargadas de su cuidado.
    </h4>
    <br><br>
    <p>
        El Alzheimer es una enfermedad que actualmente afecta a mas de 6 millones de personas en España, contando
        pacientes y familiares. Es una enfermedad neurodegenerativa en la que el afectado ve reducidas progresivamente sus capacidades
        cognitivas y provoca grave trastornos de conducta. Por desgracia, hoy en día, esta enfermedad no tiene cura y provoca
        gran sufrimiento por parte de pacientes y familiares que ven como sus seres queridos pierden la memoria hasta tal punto
        que no se acuerdan de ellos.<br>
        Para retrasar los efectos se recurren a técnicas de memoria y ejercicios que ayudan al paciente a ejercitar sus
        capacidades cognitivas. Pero por muchos ejercicios que hagan finalmente los efectos aparecen y la convivencia entre los pacientes y
        familiares se ve afectada. En este contexto surge esta aplicación cuyo principal objetivo es dotar de la máxima autonomía al afectado,
        dependiendo de la fase en donde se encuentre.<br>
        Actualmente existen otro tipo de aplicaciones que no proporcionan todas las necesidades que un paciente de
        Alzheimer podría necesitar en su día a día, o aplicaciones que aportan una funcionalidad. El objetivo de todo este proyecto es añadir todas
        las funcionalidades en una aplicación, aparte de otras nuevas para poder luchar contra una enfermedad como el Alzheimer.<br>
    </p>
</div>
<div class="parallax img-fluid" style="background-image: url('Images/foto2.jpeg');opacity: 0.60;">
    <div class="container-fluid" style="background='transparent'">
        <h1 class="text-center" style="background-color:transparent;color: #ffffff;"><i>“El alzhéimer tiene un coste
                social y emocional altísimo, porque no solo provoca el desgaste cerebral del paciente, sino también de
                su familia”</i></h1>
        <h3 class="text-center" style="background-color:transparent;color: #ffffff;"><b>Ana Martínez Gil</b></h3>
    </div>
</div>

<div class="container-fluid" style="padding-left: 60px;padding-right: 60px;padding-top: 60px; padding-bottom: 30px"
     id="alois">
    <h2>¿Que es Alois?</h2><br>
    <h4>Hemos desarrollado dos aplicaciones para aportar una solución a este problema. Nuesta aplicación móvil se llama Alois,
        está disponible en el marketplace de Google. Esta aplicación será usada por el paciente. Para configurar esta aplicación
        a su medida se usará esta web en la que te puedes registrar y ya podrás usar Alois.
    </h4>
    <br><br>
    <p>
        La propuesta consta de dos partes. Una aplicación Android con las siguientes capacidades: servicios de geo-posicionamiento
        para conocer la posición del paciente en tiempo real y poder darle más autonomía a la hora de salir de casa, un sistema de recordatorios
        que cuenta con la posibilidad de recordar la toma de medicamentos, así como de cosas básicas como llevar un paraguas los días de lluvia.
        El aplicativo a desarrollar dispondrá de una funcionalidad para la detección de caídas, la posibilidad de llamar a familiares de una
        forma sencilla mediante la identificación por fotos, así como la opción de notificar a las autoridades la solicitud de una petición de socorro.
        Esta web es un portal de gestión para que los familiares del paciente puedan configurar el aplicativo móvil en función de sus necesidades y
        las necesidades del paciente. <br>
    </p>
</div>
<div class="parallax img-fluid" style="background-image: url('Images/foto5.jpg');opacity: 0.60;">
    <div class="container-fluid" style="background='transparent'">
        <h1 class="text-center" style="background-color:transparent;color: #ffffff;"><i>“El 90% de las demencias leves están sin diagnosticar”.</i></h1>
        <h3 class="text-center" style="background-color:transparent;color: #ffffff;"><b>Pablo Martínez-Lage</b></h3>
    </div>
</div>
<div id="servicios" class="container-fluid" style="padding-left: 60px;padding-right: 60px; padding-top: 60px">
    <h2 class="text-center">Servicios</h2>
    <h5 class="text-center" style="margin-bottom: 40px;">Ofrecemos gran varidad de servicios para que no tengas que
        preocuparte de nada.</h5>
    <div class="card-deck" style="padding-right: 10px; padding-left: 10px; padding-bottom: 60px">
        <div class="card">
            <img class="card-img-top" src="Images/servicio1.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Localización</h5>
                <p class="card-text">Nuesto servicio de localizacion permite tener ubicado a tu familiar con Alzheimer
                    en todo momento, si sale de casa le mandaremos un correo con su ubicacion exacta. Así no tendras
                    que preocuparte de si se pierde.
                </p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="Images/servicio2.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Recordatorios</h5>
                <p class="card-text">Podrás configurar recordatorios de acuerdo a las necesidades que tenga tu familiar,
                    nosotros nos ocuparemos de recordarselo para que no se pierda ningun evento importante. Tambien
                    podrás configurarle un horario, así como la toma de medicamentos.
                </p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="Images/servicio3.jpeg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Botón de Pánico</h5>
                <p class="card-text">Con el botón de pánico sabrás si tu familiar se encuentra en un estado de
                    emergencia.
                    También sabrás si se ha caído o ha tenido algun accidente y la posibilidad de que se comunique con
                    los servicios de emergencia en caso de necesidad.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="parallax img-fluid" style="background-image: url('Images/foto6.jpeg');opacity: 0.60;">
    <div class="container-fluid" style="background='transparent'">
        <h1 class="text-center" style="background-color:transparent;color: #ffffff;"><i>“Mientras unos intentan olvidar, otros luchan por recordar”.</i></h1>
        <h3 class="text-center" style="background-color:transparent;color: #ffffff;"><b>Anónimo</b></h3>
    </div>
</div>
<!-- Contacto -->
<div id="contact" class="container-fluid" style="padding-left: 60px;padding-right: 60px; padding-top: 60px">
    <h2 class="text-center">Contacto</h2>
    <h5 class="text-center" style="margin-bottom: 20px;">Contacta con nosotros, intentaremos responderle con la mayor
        brevedad posible</h5>
    <div class="row">
        <div class="col-sm-5">
            <p><span class="fa fa-map-marker"></span> Salamanca, ES</p>
            <p><span class="fa fa-phone"></span> +00 1515151515</p>
            <p><span class="fa fa-envelope-o"></span> davidherr@usal.es</p>
        </div>
        <div class="col-sm-7">
            <form action="mensaje.php" method="post">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="nombre" placeholder="Nombre" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="contenido" placeholder="Introduzca aquí su mensaje"
                          rows="5"></textarea><br>
                <button class="btn btn-primary pull-right" type="submit" style="width:90px">Enviar</button>
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
