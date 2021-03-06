<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .contenedor {
            max-width: 650px;
            background-color: #F7F7F7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 30px;
            border-radius: 11px;
        }
    </style>
</head>
<body style="background-color:#00264d">
<div class="container-fluid">
    <div class=" container-fluid contenedor">
        <h2 class="text-center">Regístrate</h2>
        <h6 class="text-center">Registra al familiar para el que se va a configurar la aplicación.</h6>
        <form method="post" enctype="multipart/form-data" id="formulario">
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
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ape1">Apellido 1</label>
                    <input type="text" class="form-control" name="ape1" placeholder="Primer Apellido" required>
                </div>
                <div class="form-group col-md-4" style="padding-right: 0px">
                    <label for="ape2">Apellido 2</label>
                    <input type="text" class="form-control" name="ape2" placeholder="Segundo Apellido" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3" style="padding-left: 0px">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control">
                        <option selected></option>
                        <option>Hombre</option>
                        <option>Mujer</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="edad">Edad</label>
                    <input id="edad" type="number" class="form-control" name="edad" placeholder="Edad">
                </div>
                <div class="form-group col-md-6" style="padding-right: 0px">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" placeholder="" required>
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
                <label>Foto del Paciente</label>
                <input type="file" class="form-control-file" name="imagen">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <a class="form-check-label" for="gridCheck" data-toggle="modal" href="#terms">Acepto Términos y Condiciones</a>
            </div>
            <?php
            if ($_GET["signupFailed"])
                echo '<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El usuario ya existe en el sistema o los datos son incorrectos</div>';
            ?>
            <?php
            if ($_GET["ImageNotSupported"])
                echo '<div class="alert alert-danger" style="margin-top: 10px;" role="alert">El formato de la imagen no es admitido</div>';
            ?>
        </form>
        <button class="btn btn-primary" style="margin-top: 10px" onclick="comprobarCheck()">Registrarse</button>
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
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Para porder registrarse debe de tener mas de 18 años
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="terms" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Condiciones del Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>TÉRMINOS DE SERVICIO</b>
                <br>
                ----
                <br>
                INFORMACIÓN GENERAL
                <br>
                Este sitio web es operado por Alois. En todo el sitio, los términos “nosotros”, “nos” y “nuestro” se
                refieren a Alois. Alois ofrece este sitio web, incluyendo toda la información, herramientas y
                servicios disponibles para ti en este sitio, el usuario, está condicionado a la aceptación de todos
                los términos, condiciones, políticas y notificaciones aquí establecidos.
                <br>
                Al visitar nuestro sitio y/o comprar algo de nosotros, paticipas en nuestro “Servicio” y aceptas los
                siguientes términos y condiciones (“Términos de Servicio”, “Términos”), incluídos todos los términos
                y condiciones adicionales y las polítias a las que se hace referencia en el presente documento y/o
                disponible a través de hipervínculos. Estas Condiciones de Servicio se aplican a todos los usuarios
                del sitio, incluyendo si limitación a usuarios que sean navegadores, proveedores, clientes,
                comerciantes, y/o colaboradores de contenido.
                <br>
                Por favor, lee estos Términos de Servicio cuidadosamente antes de acceder o utilizar nuestro sitio
                web. Al acceder o utilizar cualquier parte del sitio, estás aceptando los Términos de Servicio. Si
                no estás de acuerdo con todos los términos y condiciones de este acuerdo, entonces no deberías
                acceder a la página web o usar cualquiera de los servicios. Si las Términos de Servicio son
                considerados una oferta, la aceptación está expresamente limitada a estos Términos de Servicio.
                <br>
                <br>
                Cualquier función nueva o herramienta que se añadan a la tienda actual, tambien estarán sujetas a
                los Términos de Servicio. Puedes revisar la versión actualizada de los Términos de Servicio, en
                cualquier momento en esta página. Nos reservamos el derecho de actualizar, cambiar o reemplazar
                cualquier parte de los Términos de Servicio mediante la publicación de actualizaciones y/o cambios
                en nuestro sitio web. Es tu responsabilidad chequear esta página periódicamente para verificar
                cambios. Tu uso contínuo o el acceso al sitio web después de la publicación de cualquier cambio
                constituye la aceptación de dichos cambios.
                <br>
                Nuestra tienda se encuentra alojada en Shopify Inc. Ellos nos proporcionan la plataforma de comercio
                electrónico en línea, que nos permite venderte nuestros productos y servicios.
                <br>
                <br>
                <b>SECCIÓN 1 - TÉRMINOS DE LA TIENDA EN LÍNEA</b>
                <br>
                Al utilizar este sitio, declaras que tienes al menos la mayoría de edad en tu estado o provincia de
                residencia, o que tienes la mayoría de edad en tu estado o provincia de residencia y que nos has
                dado tu consentimiento para permitir que cualquiera de tus dependientes menores use este sitio.
                <br>
                No puedes usar nuestros productos con ningún propósito ilegal o no autorizado tampoco puedes, en el
                uso del Servicio, violar cualquier ley en tu jurisdicción (incluyendo pero no limitado a las leyes
                de derecho de autor).
                <br>
                No debes transmitir gusanos, virus o cualquier código de naturaleza destructiva.
                <br>
                El incumplimiento o violación de cualquiera de estos Términos darán lugar al cese inmediato de tus
                Servicios.
                <br>
                <br>
                <b>SECCIÓN 2 - CONDICIONES GENERALES</b>
                <br>
                Nos reservamos el derecho de rechazar la prestación de servicio a cualquier persona, por cualquier
                motivo y en cualquier momento.
                <br>
                Entiendes que tu contenido (sin incluir la información de tu tarjeta de crédito), puede ser
                transferida sin encriptar e involucrar (a) transmisiones a través de varias redes; y (b) cambios
                para ajustarse o adaptarse a los requisitos técnicosde conexión de redes o dispositivos. La
                información de tarjetas de crédito está siempre encriptada durante la transferencia a través de las
                redes.
                <br>
                Estás de acuerdo con no reproducir, duplicar, copiar, vender, revender o explotar cualquier parte
                del Servicio, usp del Servicio, o acceso al Servicio o cualquier contacto en el sitio web a través
                del cual se presta el servicio, sin el expreso permiso por escrito de nuestra parte.
                <br>
                Los títulos utilizados en este acuerdo se icluyen solo por conveniencia y no limita o afecta a estos
                Términos.
                <br>
                <br>
                <b>SECCIÓN 3 - EXACTITUD, EXHAUSTVIDAD Y ACTUALIDAD DE LA INFORMACIÓN</b>
                <br>
                No nos hacemos responsables si la información disponible en este sitio no es exacta, completa o
                actual. El material en este sitio es provisto solo para información general y no debe confiarse en
                ella o utilizarse como la única base para la toma de decisiones sin consultar primeramente,
                información más precisa, completa u oportuna. Cualquier dependencia em el materia de este sitio es
                bajo su propio riesgo.
                <br>
                Este sitio puede contener cierta información histórica. La información histórica, no es
                necesriamente actual y es provista únicamente para tu referencia. Nos reservamos el derecho de
                modificar los contenidos de este sitio en cualquier momento, pero no tenemos obligación de
                actualizar cualquier información en nuestro sitio. Aceptas que es tu responsabilidad de monitorear
                los cambios en nuestro sitio.
                <br>
                <b>SECTION 4 - MODIFICACIONES AL SERVICIO Y PRECIOS</b>
                <br>
                Los precios de nuestros productos están sujetos a cambio sin aviso.
                <br>
                Nos reservamos el derecho de modificar o discontinuar el Servicio (o cualquier parte del contenido)
                en cualquier momento sin aviso previo.
                <br>
                No seremos responsables ante ti o alguna tercera parte por cualquier modificación, cambio de precio,
                suspensión o discontinuidad del Servicio.
                <br>
                <br>
                <b>SECCIÓN 5 - PRODUCTOS O SERVICIOS (si aplicable)</b>
                <br>
                Ciertos productos o servicios puedene star disponibles exclusivamente en línea a través del sitio
                web. Estos productos o servicios pueden tener cantidades limitadas y estar sujetas a devolución o
                cambio de acuerdo a nuestra política de devolución solamente.
                <br>
                Hemos hecho el esfuerzo de mostrar los colores y las imágenes de nuestros productos, en la tienda,
                con la mayor precisión de colores posible. No podemos garantizar que el monitor de tu computadora
                muestre los colores de manera exacta.
                <br>
                Nos reservamos el derecho, pero no estamos obligados, para limitar las ventas de nuestros productos
                o servicios a cualquier persona, región geográfica o jurisdicción. Podemos ejercer este derecho
                basados en cada caso. Nos reservamos el derecho de limitar las cantidades de los productos o
                servicios que ofrecemos. Todas las descripciones de productos o precios de los productos están
                sujetos a cambios en cualquier momento sin previo aviso, a nuestra sola discreción. Nos reservamos
                el derecho de discontinuar cualquier producto en cualquier momento. Cualquier oferta de producto o
                servicio hecho en este sitio es nulo donde esté prohibido.
                <br>
                No garantizamos que la calidad de los productos, servicios, información u otro material comprado u
                obtenido por ti cumpla con tus expectativas, o que cualquier error en el Servicio será corregido.
                <br>
                <br>
                <b>SECCIÓN 6 - EXACTITUD DE FACTURACIÓN E INFORMACIÓN DE CUENTA</b>
                <br>
                Nos reservamos el derecho de rechazar cualquier pedido que realice con nosotros. Podemos, a nuestra
                discreción, limitar o cancelar las cantidades compradas por persona, por hogar o por pedido. Estas
                restricciones pueden incluir pedidos realizados por o bajo la misma cuenta de cliente, la misma
                tarjeta de crédito, y/o pedidos que utilizan la misma facturación y/o dirección de envío.
                <br>
                En el caso de que hagamos un cambio o cancelemos una orden, podemos intentar notificarte poniéndonos
                en contacto vía correo electrónico y/o dirección de facturación / número de teléfono proporcionado
                en el momento que se hizo pedido. Nos reservamos el derecho de limitar o prohibir las órdenes que, a
                nuestro juicio, parecen ser colocado por los concesionarios, revendedores o distribuidores.
                <br>
                Te comprometes a proporcionar información actual, completa y precisa de la compra y cuenta utilizada
                para todas las compras realizadasen nuestra tienda. Te comprometes a ctualizar rápidamente tu cuenta
                y otra información, incluyendo tu dirección de correo electrónico y números de tarjetas de crédito y
                fechas de vencimiento, para que podamos completar tus transacciones y contactarte cuando sea
                necesario.
                <br>
                Para más detalles, por favor revisa nuestra Política de Devoluciones.
                <br>
                <b>SECCIÓN 7 - HERRAMIENTAS OPCIONALES</b>
                <br>
                Es posible que te proporcionemos aceso a herramientas de terceros a los cuales no monitoreamos y
                sobre los que no tenemos control ni entrada.
                <br>
                Reconoces y aceptas que proporcionamos acceso a este tipo de herramientas "tal cual" y "según
                disponibilidad" sin garantías, representaciones o condiciones de ningún tipo y sin ningún respaldo.
                No tendremos responsabilidad alguna derivada de o relacionada con tu uso de herramientas
                proporcionadas por terceras partes.
                <br>
                Cualquier uso que hagas de las herramientas opcionales que se ofrecen a través del sitio bajo tu
                propio riesgo y discreción y debes asegurarte de estar familiarizado y aprobar los términos bajo los
                cuales estas herramientas son proporcionadas por el o los proveedores de terceros.
                <br>
                Tambien es posible que, en el futuro, te ofrezcamos nuevos servicios y/o características a través
                del sitio web (incluyendo el lanzamiento de nuevas herramientas y recursos). Estas nuevas
                caraterísticas y/o servicios tambien estarán sujetos a estos Términos de Servicio.
                <br>
                <b>SECCIÓN 8 - ENLACES DE TERCERAS PARTES</b>
                <br>
                Cierto contenido, productos y servicios disponibles vía nuestro Servicio puede incluír material de
                terceras partes.
                <br>
                Enlaces de terceras partes en este sitio pueden direccionarte a sitios web de terceras partes que no
                están afiliadas con nosotros. No nos responsabilizamos de examinar o evaluar el contenido o
                exactitud y no garantizamos ni tendremos ninguna obligación o responsabilidad por cualquier material
                de terceros o siitos web, o de cualquier material, productos o servicios de terceros.
                <br>
                No nos hacemos responsables de cualquier daño o daños relacionados con la adquisición o utilización
                de bienes, servicios, recursos, contenidos, o cualquier otra transacción realizadas en conexión con
                sitios web de terceros. Por favor revisa cuidadosamente las políticas y prácticas de terceros y
                asegúrate de entenderlas antes de participar en cualquier transacción. Quejas, reclamos, inquietudes
                o pregutas con respecto a productos de terceros deben ser dirigidas a la tercera parte.
                <br>
                <b>SECCIÓN 9 - COMENTARIOS DE USUARIO, CAPTACIÓN Y OTROS ENVÍOS</b>
                <br>
                Si, a pedido nuestro, envías ciertas presentaciones específicas (por ejemplo la participación en
                concursos) o sin un pedido de nuestra parte envías ideas creativas, sugerencias, proposiciones,
                planes, u otros materiales, ya sea en línea, por email, por correo postal, o de otra manera
                (colectivamente, 'comentarios'), aceptas que podamos, en cualquier momento, sin restricción, editar,
                copiar, publicar, distribuír, traducir o utilizar por cualquier medio comentarios que nos hayas
                enviado. No tenemos ni tendremos ninguna obligación (1) de mantener ningún comentario
                confidencialmente; (2) de pagar compensación por comentarios; o (3) de responder a comentarios.
                <br>
                Nosotros podemos, pero no tenemos obligación de, monitorear, editar o remover contenido que
                consideremos sea ilegítimo, ofensivo, amenazante, calumnioso, difamatorio, pornográfico, obsceno u
                objetable o viole la propiedad intelectual de cualquiera de las partes o los Términos de Servicio.
                <br>
                Aceptas que tus comentarios no violarán los derechos de terceras partes, incluyendo derechos de
                autor, marca, privacidad, personalidad u otro derechos personal o de propiedad. Asimismo, aceptas
                que tus comentarios no contienen material difamatorio o ilegal, abusivo u obsceno, o contienen virus
                informáticos u otro malware que pudiera, de alguna manera, afectar el funcionamiento del Srvicio o
                de cualquier sitio web relacionado. No puedes utilizar una dirección de correo electrónico falsa,
                usar otra identidad que no sea legítima, o engañar a terceras partes o a nosotros en cuanto al
                origen de tus comentarios. Tu eres el único responsable por los comentarios que haces y su
                precisión. No nos hacemos responsables y no asumimos ninguna obligación con respecto a los
                comentarios publicados por ti o cualquier tercer parte.
                <br>
                <br>
                <b>SECCIÓN 10 - INFORMACIÓN PERSONAL</b>
                <br>
                Tu presentación de información personal a través del sitio se rige por nuestra Política de
                Privacidad. Para ver nuestra Política de Privacidad.
                <br>
                <br>
                <b>SECCIÓN 11 - ERRORES, INEXACTITUDES Y OMISIONES</b>
                <br>
                De vez en cuando puede haber información en nuestro sitio o en el Servicio que contiene errores
                tipográficos, inexactitudes u omisiones que puedan estar relacionadas con las descripciones de
                productos, precios, promociones, ofertas, gastos de envío del producto, el tiempo de tránsito y la
                disponibilidad. Nos reservamos el derecho de corregir los errores, inexactitudes u omisiones y de
                cambiar o actualizar la información o cancelar pedidos si alguna información en el Servicio o en
                cualquier sitio web relacionado es inexacta en cualquier momento sin previo aviso (incluso después
                de que hayas enviado tu orden) .
                <br>
                No asumimos ninguna obligación de actualizar, corregir o aclarar la información en el Servicio o en
                cualquier sitio web relacionado, incluyendo, sin limitación, la información de precios, excepto
                cuando sea requerido por la ley. Ninguna especificación actualizada o fecha de actualización
                aplicada en el Servicio o en cualquier sitio web relacionado, debe ser tomada para indicar que toda
                la información en el Servicio o en cualquier sitio web relacionado ha sido modificado o actualizado.
                <br>
                <br>
                <b>SECCIÓN 12 - USOS PROHIBIDOS</b>
                <br>
                En adición a otras prohibiciones como se establece en los Términos de Servicio, se prohibe el uso
                del sitio o su contenido: (a) para ningún propósito ilegal; (b) para pedirle a otros que realicen o
                partiicpen en actos ilícitos; (c) para violar cualquier regulación, reglas, leyes internacionales,
                federales, provinciales o estatales, u ordenanzas locales; (d) para infringir o violar el derecho de
                propiedad intelectual nuestro o de terceras partes; (e) para acosar, abusar, insultar, dañar,
                difamar, calumniar, desprestigiar, intimidar o discriminar por razones de género, orientación
                sexual, religión, tnia, raza, edad, nacionalidad o discapacidad; (f) para presentar información
                falsa o engañosa; (g) para cargar o transmitir virus o cualquier otro tipo de código malicioso que
                sea o pueda ser utilizado en cualquier forma que pueda comprometer la funcionalidad o el
                funcionamientodel Servicio o de cualquier sitio web relacionado, otros sitios o Internet; (h) para
                recopilar o rastrear información personal de otros; (i) para generar spam, phish, pharm, pretext,
                spider, crawl, or scrape; (j) para cualquier propósito obsceno o inmoral; o (k) para interferir con
                o burlar los elementos de seguridad del Servicio o cualquier sitio web relacionado¿ otros sitios o
                Internet. Nos reservamos el derecho de suspender el uso del Servicio o de cualquier sitio web
                relacionado por violar cualquiera de los ítems de los usos prohibidos.
                <br>
                <br>
                <b>SECCIÓN 13 - EXCLUSIÓN DE GARANTÍAS; LIMITACIÓN DE RESPONSABILIDAD</b>
                <br>
                No garantizamos ni aseguramos que el uso de nuestro servicio será ininterrumpido, puntual, seguro o
                libre de errores.
                <br>
                No garantizamos que los resultados que se puedan obtener del uso del servicio serán exactos o
                confiables.
                <br>
                Aceptas que de vez en cuando podemos quitar el servicio por períodos de tiempo indefinidos o
                cancelar el servicio en cualquier momento sin previo aviso.
                <br>
                Aceptas expresamenteque el uso de, o la posibilidad de utilizar, el servicio es bajo tu propio
                riesgo. El servicio y todos los productos y servicios proporcionados a través del servicio son
                (salvo lo expresamente manifestado por nosotros) proporcionados "tal cual" y "según esté disponible"
                para su uso, sin ningún tipo de representación, garantías o condiciones de ningún tipo, ya sea
                expresa o implícita, incluídas todas las garantías o condiciones implícitas de comercialización,
                calidad comercializable, la aptitud para un propósito particular, durabilidad, título y no
                infracción.
                <br>
                En ningún caso Alois, nuestros directores, funcionarios, empleados, afiliados, agentes,
                contratistas, internos, proveedores, prestadores de servicios o licenciantes serán responsables por
                cualquier daño, pérdida, reclamo, o daños directos, indirectos, incidentales, punitivos, especiales
                o consecuentes de cualquier tipo, incluyendo, sin limitación, pérdida de beneficios, pérdida de
                igresos, pérdida de ahorros, pérdida de datos, costos de reemplazo, o cualquier daño similar, ya sea
                basado en contrato, agravio (incluyendo negligencia), responsabilidad estricta o de otra manera,
                como consecuencia del uso de cualquiera de los servicios o productos adquiridos mediante el
                servicio, o por cualquier otro reclamo relacionado de alguna manera con el uso del servicio o
                cualquier producto, incluyendo pero no limitado, a cualquier error u omisión en cualquier contenido,
                o cualquier pérdida o daño de cualquier tipo incurridos como resultados de la utilización del
                servicio o cualquier contenido (o producto) publicado, transmitido, o que se pongan a disposición a
                través del servicio, incluso si se avisa de su posibilidad. Debido a que algunos estados o
                jurisdicciones no permiten la exclusión o la limitación de responsabilidad por daños consecuenciales
                o incidentales, en tales estados o jurisdicciones, nuestra responsabilidad se limitará en la medida
                máxima permitida por la ley.
                <br>
                <br>
                <b>SECCIÓN 14 - INDEMNIZACIÓN</b>
                <br>
                Aceptas indemnizar, defender y mantener indemne Alois y nuestras matrices, subsidiarias, afiliados,
                socios, funcionarios, directores, agentes, contratistas, concesionarios, proveedores de servicios,
                subcontratistas, proveedores, internos y empleados, de cualquier reclamo o demanda, incluyendo
                honorarios razonables de abogados, hechos por cualquier tercero a causa o como resultado de tu
                incumplimiento de las Condiciones de Servicio o de los documentos que incorporan como referencia, o
                la violación de cualquier ley o de los derechos de u tercero.
                <br>
                <b>SECCIÓN 15 - DIVISIBILIDAD</b>
                <br>
                En el caso de que se determine que cualquier disposición de estas Condiciones de Servicio sea
                ilegal, nula o inejecutable, dicha disposición será, no obstante, efectiva a obtener la máxima
                medida permitida por la ley aplicable, y la parte no exigible se considerará separada de estos
                Términos de Servicio, dicha determinación no afectará la validez de aplicabilidad de las demás
                disposiciones restantes.
                <br>
                <br>
                <b>SECCIÓN 16 - RESCISIÓN</b>
                <br>
                Las obligaciones y responsabilidades de las partes que hayan incurrido con anterioridad a la fecha
                de terminación sobrevivirán a la terminación de este acuerdo a todos los efectos.
                <br>
                Estas Condiciones de servicio son efectivos a menos que y hasta que sea terminado por ti o nosotros.
                Puedes terminar estos Términos de Servicio en cualquier momento por avisarnos que ya no deseas
                utilizar nuestros servicios, o cuando dejes de usar nuestro sitio.
                <br>
                Si a nuestro juicio, fallas, o se sospecha que haz fallado, en el cumplimiento de cualquier término
                o disposición de estas Condiciones de Servicio, tambien podemos terminar este acuerdo en cualquier
                momento sin previo aviso, y seguirás siendo responsable de todos los montos adeudados hasta incluída
                la fecha de terminación; y/o en consecuencia podemos negarte el acceso a nuestros servicios (o
                cualquier parte del mismo).
                <br>
                <b>SECCIÓN 17 - ACUERDO COMPLETO</b>
                <br>
                Nuestra falla para ejercer o hacer valer cualquier derecho o disposiciôn de estas Condiciones de
                Servicio no constituirá una renucia a tal derecho o disposición.
                <br>
                Estas Condiciones del servicio y las políticas o reglas de operación publicadas por nosotros en este
                sitio o con respecto al servicio constituyen el acuerdo completo y el entendimiento entre tu y
                nosotros y rigen el uso del Servicio y reemplaza cualquier acuerdo, comunicaciones y propuestas
                anteriores o contemporáneas, ya sea oral o escrita, entre tu y nosotros (incluyendo, pero no
                limitado a, cualquier versión previa de los Términos de Servicio).
                <br>
                Cualquier ambigüedad en la interpretación de estas Condiciones del servicio no se interpretarán en
                contra del grupo de redacción.
                <br>
                <br>
                <b>SECCIÓN 18 - LEY</b>
                <br>
                Estas Condiciones del servicio y cualquier acuerdos aparte en el que te proporcionemos servicios se
                regirán e interpretarán en conformidad con las leyes de Plaza del Oeste, Salamanca, CL, 37001,
                Spain.
                <br>
                <br>
                <b>SECCIÓN 19 - CAMBIOS EN LOS TÉRMINOS DE SERVICIO</b>
                <br>
                Puedes revisar la versión más actualizada de los Términos de Servicio en cualquier momento en esta
                página.
                <br>
                Nos reservamos el derecho, a nuestra sola discreción, de actualizar, modificar o reemplazar
                cualquier parte de estas Condiciones del servicio mediante la publicación de las actualizaciones y
                los cambios en nuestro sitio web. Es tu responsabilidad revisar nuestro sitio web periódicamente
                para verificar los cambios. El uso contínuo de o el acceso a nuestro sitio Web o el Servicio después
                de la publicación de cualquier cambio en estas Condiciones de servicio implica la aceptación de
                dichos cambios.
                <br>
                <br>
                <b>SECCIÓN 20 - INFORMACIÓN DE CONTACTO</b>
                <br>
                Preguntas acerca de los Términos de Servicio deben ser enviadas a davidherrerovelasco@gmail.com.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    var autocomplete,lat,lng;
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
        var place = autocomplete.getPlace();
        lat = place.geometry.location.lat();
        lng = place.geometry.location.lng();
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

    function comprobarCheck() {
        if (document.getElementById("check").checked) {
            if(document.getElementById("edad").value < 18){
                $("#modal2").modal({show: true});
            }else {
                document.getElementById("formulario").action="scriptSignup.php?latitud="+lat+"&longitud="+lng;
                document.getElementById("formulario").submit();
            }
        } else {
            $("#modal").modal({show: true});
        }
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA05cDkteukU7Jo5WMZSBunS4E2ElJ9pz0&libraries=places&callback=initAutocomplete" async defer></script>
</body>
</html>