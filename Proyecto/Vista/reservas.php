<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes reservados</title>
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
    <link href="../../CSS/estilos-admin.css" rel="stylesheet">
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
    ?>

    <?php
    include('../Modelo/mostrar_reservas.php');
    $rr = mysqli_fetch_row($res2);
    ?>
    <a href="./user.php?value=<?php echo $rr[0] ?>">
        <button class="btnBack">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path
                    d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                </path>
            </svg>
            <span>Regresar</span>
        </button>
    </a>
    <div class="content">
        <div class="title">
            <h2>
                Viajes Reservados
            </h2>
        </div>
        <?php
        $fechaActual = new DateTime(); // Esto crea un objeto DateTime con la fecha y hora actuales
        $zonaHoraria = new DateTimeZone('America/New_York');
        $fechaActual->setTimezone($zonaHoraria);
        $fechaActual = $fechaActual->format('Y-m-d H:i:s');

        if (mysqli_num_rows($res) == 0) {
            ?>
            <p>No hay viajes reservados</p>
            <?php
        } else {
            while ($viaj = $res->fetch_assoc()) {
                $fechaViaje = new DateTime($viaj['fecha']);
                $fechaViaje = $fechaViaje->format('Y-m-d H:i:s');
                $bool = false;

                if ($fechaViaje < $fechaActual) {
                    ?>
                    <div class="card" style="width: 18rem; background-color: rgba(187, 10, 33, 0.3);">
                        <?php
                } else {
                    ?>
                        <div class="card" style="width: 18rem; background-color: rgba(123, 201, 80, 0.3);">
                            <?php
                    $bool = true;
                }
                ?>

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $viaj['lugar_destino'] ?>
                            </h5>
                            <p class="card-text">
                                <?php echo "Fecha de reserva: ";
                                echo $viaj['fecha_reserva'] ?>
                            </p>
                            <p class="card-text">
                                <?php echo "Fecha Salida: ";
                                echo $viaj['fecha'] ?>
                            </p>
                            <a style="cursor: pointer; " href="../Modelo/reporte6.php?value=<?php echo $viaj['id_reserva'] ?>"
                                class="btnAdmin">
                                <label style="cursor: pointer;" for="">Comprobante</label>
                                <img class="descargar" src="../../images/descarga.png" alt="">
                            </a>
                            <?php if ($bool) {
                                ?>
                                <button class="btnCancel btnCancelar" type="button" name="<?php echo $viaj['id_reserva'] ?>">
                                    Cancelar
                                </button>
                                <?php
                            } ?>



                            <!-- Modal -->
                        </div>
                    </div>
                    <?php
            }
        }
        ?>
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

        <script src="../../JS/cancelar-reserva.js"></script>
        <script src="../../JS/jquery-3.7.0.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src="../../JS/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->

        <script src="../../JS/bootstrap.min.js"></script> <!-- Bootstrap framework -->

        <script src="../../JS/jquery.easing.min.js"></script>
        <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="../../JS/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="../../JS/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="../../JS/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
        <script src="../../JS/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
        <script src="../../JS/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
        <script src="../../JS/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>