<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    if (isset($_GET['edit']) && $_GET['edit'] === 'true') {
        echo "<script>alert('Se editó el viaje correctamente');</script>";
    } else if (isset($_GET['edit']) == 1452) {
        echo "<script>alert('No se pudo realizar la actualización del viaje debido a que intentó cambiar la placa del bus a una que no existe en los registros de buses');</script>";

    } else if (isset($_GET['edit'])) {

        echo "<script>alert('No se pudo realizar la actualización del viaje, intente de nuevo');</script>";

    }

    if (isset($_GET['del']) && $_GET['del'] === 'true') {
        echo "<script>alert('Se eliminó correctamente el viaje');</script>";
    } else if (isset($_GET['del'])) {
        echo "<script>alert('No se pudo eliminar el viaje, intente de nuevo');</script>";
    }
    ?>

    <link rel="stylesheet" href="../../CSS/estilos-admin.css">

    <title>Datos de los viajes</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="../../CSS/bootstrap.css" rel="stylesheet">
    <link href="../../CSS/fontawesome-all.css" rel="stylesheet">
    <link href="../../CSS/swiper.css" rel="stylesheet">
    <link href="../../CSS/magnific-popup.css" rel="stylesheet">
    <link href="../../CSS/styles.css" rel="stylesheet">
    <link href="../../CSS/Estilos.css" rel="stylesheet">


    <!-- Favicon  -->
    <link rel="icon" href="../../images/favicon.png">
</head>

<body>
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <?php
    include_once('menu.html');
    ?>
    <br>
    <a href="../Controlador/handler.php?value=1">
        <button class="btnBack">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path
                    d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                </path>
            </svg>
            <span>Regresar</span>
        </button>
    </a>

    <center>
        <h1>Datos de viajes</h1>

        <table>
            <th>ID</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Fecha</th>
            <th>Hora Salida</th>
            <th>Precio</th>
            <th>Conductor</th>
            <th>Placa del Bus</th>
            <?php include("../Modelo/mostrar_eliminar-editar_viaje.php"); ?>
        </table>
    </center>

    <br>
    <?php
    include_once('footer.html');
    ?>
    <script src="../../JS/eliminar-viaje.js"></script>
    <script src="../../JS/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../../JS/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../../JS/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../../JS/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../../JS/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../../JS/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="../../JS/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="../../JS/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="../../JS/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../../JS/scripts.js"></script> <!-- Custom scripts -->
    <script src="../../JS/funciones.js"></script>
</body>

</html>