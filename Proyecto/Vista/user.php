<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
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
    <link href="../../CSS/estilos-user.css" rel="stylesheet">

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
    include('../Config/conexion.php');
    $us = $_GET['value'];
    $sql = "SELECT * FROM Usuario WHERE correo = '$us'";
    $res = mysqli_query($conexion, $sql);
    $est = $res->fetch_assoc();
    ?>

    <div class="content">
        <div class="title">
            <h2> Bienvenido
                <?php echo $est['nombre'];
                echo " ";
                echo $est['apellido']; ?>
            </h2>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    Reservar viajes
                </h5>
                <p class="card-text">
                    Destinos disponibles
                </p>
                <a href="../Vista/viajes_list.php?ced=<?php echo $est['cedula']; ?>"><button
                        class=" btnAdmin">Reservar</button></a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    Viajes reservados
                </h5>
                <p class="card-text">
                    Lista de viajes
                </p>
                <a href="../Vista/reservas.php?ced=<?php echo $est['cedula']; ?>"><button
                        class=" btnAdmin">Ver</button></a>
            </div>
        </div>
        <!-- <div style="width:100%">
            <a href="../../index.html">
                <button class="btnAdmin">Cerrar Sesión</button>
            </a>
        </div> -->
    </div>
    <br>
    <?php
    include_once('footer.html');
    ?>
    <script src="../../JS/jquery-3.7.0.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
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