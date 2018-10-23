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
    <script>
        $(document).ready(function () {
            $("#modificarFamiliares").modal("show");
        });
    </script>
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
    .pac-container {
        background-color: #FFF;
        z-index: 20;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 20;
    }
    .modal-backdrop{
        z-index: 10;
    }​
</style>
<body onload="obtenerFamiliares()">
<!--Navbar-->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand text-white" href="../principal/"><i class="fas fa-arrow-left" style="margin-right:10px"></i>Modificar
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
<?php
if ($_GET["failed"]) {
    echo '<div class="alert alert-danger" style="margin-top: 10px;" role="alert">Ha habido un error al modificar el familiar</div>';
}
if ($_GET["done"]) {
    echo '<div class="alert alert-success" style="margin-top: 10px;" role="alert">El familiar ha sido modificado correctamente</div>';
}
?>
<div id="tablaFamiliares">

</div>
<?php
if ($_GET["modificar"])
    echo '<!--Modal para la modificacion de los familiares-->
            <div id="modificarFamiliares" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar Paciente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form style="margin-top: 15px" action="scriptModificarFamiliares.php?email=' . $_GET["email"] . '" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-4" style="padding-left: 0px">
                                        <label for="nombreModificado">Nombre</label>
                                        <input type="text" class="form-control" name="nombreModificado" value="' . $_GET["nombre"] . '" required>
                                    </div>
                                    <div class="form-group col-md-4" >
                                        <label for="ape1Modificar">Apellido 1</label>
                                        <input type="text" class="form-control" name="ape1Modificado" value="' . $_GET["ape1"] . '" required>
                                    </div>
                                    <div class="form-group col-md-4" style="padding-right: 0px">
                                        <label for="ape2Modificado">Apellido 2</label>
                                        <input type="text" class="form-control" name="ape2Modificado" value="' . $_GET["ape2"] . '" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3" >
                                        <label for="edadModificado">Edad</label>
                                        <input type="number" class="form-control" name="edadModificado">
                                    </div>
                                </div>
                                <div class="form-group" id="locationField">
                                    <label for="address">Busqueda direccion paciente:</label>
                                    <input class="form-control" name="direccion" id="autocomplete" placeholder="Calle, número" onFocus="geolocate()" type="text">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12" style="padding-left: 0px">
                                        <label for="ciudad">Calle</label>
                                        <input id="route" type="text" class="form-control" name="calleModificado" disabled="true" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2" style="padding-left: 0px">
                                        <label for="ciudad">Número</label>
                                        <input id="street_number" type="text" class="form-control" name="numeroModificado" disabled="true">
                                    </div>
                                    <div class="form-group col-md-6" style="padding-left: 0px">
                                        <label for="ciudad">Ciudad</label>
                                        <input id="locality" type="text" class="form-control" name="ciudadModificado" disabled="true" required>
                                    </div>
                                    <div class="form-group col-md-4" style="padding-right: 0px">
                                        <label for="inputState">CP</label>
                                        <input id="postal_code" type="text" class="form-control" name="cpModificado" disabled="true" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: \'short_name\',
        route: \'long_name\',
        locality: \'long_name\',
        postal_code: \'short_name\'
    };


    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(\'autocomplete\')), {types: [\'geocode\']});
        autocomplete.addListener(\'place_changed\', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = \'\';
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA05cDkteukU7Jo5WMZSBunS4E2ElJ9pz0&libraries=places&callback=initAutocomplete" async defer></script>';
?>
<script>
    function obtenerFamiliares() {
        $.ajax({
            url: "scriptObtenerFamiliaresGestion.php",
            success: function (data) {
                document.getElementById("tablaFamiliares").innerHTML = data;
            }
        });
    }
</script>
</body>
</html>