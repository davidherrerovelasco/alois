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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<style>
    html, body {
        margin: 0px;
        height: 100%;
        width: 100%;
    }

    #sidebar {
        background-color: #F7F7F7;
        margin: 0;
        padding: 0;
    }
</style>

<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand text-white" href="../principal/"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Añadir
        Familiares</a>
    <ul class="navbar-nav ml-auto" style="margin-right: 10px">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span class="fa fa-gear"></span> Configuración</a>
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
    <form action="scriptRegistrarFamiliar.php" method="post" enctype="multipart/form-data">
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
            <div class="form-group col-md-4">
                <label for="ape1Familiar">Apellido 1</label>
                <input type="text" class="form-control" name="ape1Familiar" placeholder="Primer Apellido" required>
            </div>
            <div class="form-group col-md-4" style="padding-right: 0px">
                <label for="ape2Familiar">Apellido 2</label>
                <input type="text" class="form-control" name="ape2Familiar" placeholder="Segundo Apellido" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="edadFamiliar">Edad</label>
                <input type="number" class="form-control" name="edadFamiliar" placeholder="Edad">
            </div>
            <div class="form-group col-md-6" style="padding-right: 0px">
                <label for="telefonoFamiliar">Teléfono</label>
                <input type="tel" class="form-control" name="telefonoFamiliar" placeholder="" required>
            </div>
        </div>
        <div class="form-group" id="locationField">
            <label for="address">Busqueda direccion paciente:</label>
            <input class="form-control" name="direccion" id="autocomplete" placeholder="Calle, número" onFocus="geolocate()" type="text">
        </div>
        <div class="form-row">
            <div class="form-group col-md-12" style="padding-left: 0px">
                <label for="ciudad">Calle</label>
                <input id="route" type="text" class="form-control" name="calle" disabled="true" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2" style="padding-left: 0px">
                <label for="ciudad">Número</label>
                <input id="street_number" type="text" class="form-control" name="numero" disabled="true">
            </div>
            <div class="form-group col-md-6" style="padding-left: 0px">
                <label for="ciudad">Ciudad</label>
                <input id="locality" type="text" class="form-control" name="ciudad" disabled="true" required>
            </div>
            <div class="form-group col-md-4" style="padding-right: 0px">
                <label for="inputState">CP</label>
                <input id="postal_code" type="text" class="form-control" name="cp" disabled="true" required>
            </div>
        </div>
        <div class="form-group">
            <label>Añada una foto del familiar</label>
            <input type="file" class="form-control-file" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
</div>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        postal_code: 'short_name'
    };


    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }


    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA05cDkteukU7Jo5WMZSBunS4E2ElJ9pz0&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>