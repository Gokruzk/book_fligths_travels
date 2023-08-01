<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    </meta>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>

    <title>Transportes Chimborazo</title>
    <!-- Styles -->
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
    <?php
    include_once('menu.html');
    ?>
    <div class="content">
        <div class="title">
            <h2>MENÚ ADMINISTRADOR</h2>
        </div>
        <div class="col-3 card" id="ParaSecciones">
            <h3>Agregar</h3>
            <a href="../Controlador/handler.php?value=8">
                <button class="btnAdmin">Buses</button>
            </a>
            <a href="../Controlador/handler.php?value=6">
                <button class="btnAdmin">Viajes</button>
            </a>
        </div>
        <div class="col-3 card" id="ParaSecciones">
            <h3>Modificar - Eliminar</h3>
            <a href="../Controlador/handler.php?value=10">
                <button class="btnAdmin">Buses</button>
            </a>
            <a href="../Controlador/handler.php?value=7">
                <button class="btnAdmin">Viajes</button>
            </a>
        </div>
        <div class="col-3 card" id="ParaSecciones">
            <h3>Buscar</h3>
            <a href="../Controlador/handler.php?value=11">
                <button class="btnAdmin">Buses</button>
            </a>
            <a href="../Controlador/handler.php?value=12">
                <button class="btnAdmin">Viajes</button>
            </a>
        </div>
        <div class="col-3 card" id="ParaSecciones">
            <h3>Reportes</h3>
            <a href="../Controlador/handler.php?value=4">
                <button class="btnAdmin">Reportes</button>
            </a>
        </div>
        <div style="width:100%">
            <a href="../../index.html">
                <button class="btnAdmin">Cerrar Sesión</button>
            </a>
        </div>
    </div>
    <?php
    include_once('footer.html');
    ?>

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