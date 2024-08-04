<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/bootstrap.min.css">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/owl.theme.default.min.css">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/owl.carousel.min.css">
    <!-- Boxicons Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/boxicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/flaticon.css">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/meanmenu.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/animate.min.css">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/nice-select.min.css">
    <!-- Odometer Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/odometer.min.css">
    <!-- Date Picker CSS-->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/date-picker.min.css">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/magnific-popup.min.css">
    <!-- Beautiful Fonts CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/beautiful-fonts.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/style.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/dark.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL . 'assets/principal'; ?>/css/responsive.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo RUTA_PRINCIPAL . 'assets'; ?>/img/logo.png">

    <!-- TITLE -->
    <title><?php echo TITLE . ' | ' . $data['title']; ?></title>
</head>

<body>
    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <!-- Start Ecorik Navbar Area -->
    <div class="eorik-nav-style fixed-top">
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="<?php echo RUTA_PRINCIPAL; ?>" class="logo">
                    <img src="<?php echo RUTA_PRINCIPAL . 'assets'; ?>/img/logo.png" alt="Logo">
                </a>
            </div>
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="<?php echo RUTA_PRINCIPAL; ?>">
                            <img src="<?php echo RUTA_PRINCIPAL . 'assets'; ?>/img/logo.png" width="50" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="<?php echo RUTA_PRINCIPAL; ?>" class="nav-link">
                                        Inicio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo RUTA_PRINCIPAL . 'habitacion'; ?>" class="nav-link">
                                        Habitaciones
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo RUTA_PRINCIPAL . 'servicio'; ?>" class="nav-link">
                                        Servicios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo RUTA_PRINCIPAL . 'contacto'; ?>" class="nav-link">
                                        Contactos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo RUTA_PRINCIPAL . 'login'; ?>" class="nav-link">
                                        Login
                                    </a>
                                </li>
                            </ul>
                            <!-- Start Other Option -->
                            <div class="others-option">
                                <a class="call-us" href="tel:+51 977786234">
                                    <i class="bx bx-phone-call bx-tada"></i>
                                    +<?php echo $data['empresa']['telefono']; ?>
                                </a>
                            </div>
                            <!-- End Other Option -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Ecorik Navbar Area -->

    <!-- Start Sidebar Modal -->
    <div class="sidebar-modal">
        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="bx bx-x"></i>
                            </span>
                        </button>
                        <h2 class="modal-title" id="myModalLabel2">
                            <a href="<?php echo RUTA_PRINCIPAL; ?>">
                                <img src="<?php echo RUTA_PRINCIPAL . 'assets'; ?>/img/logo.png" alt="Logo">
                            </a>
                        </h2>
                    </div>
                    <div class="modal-body">
                        <div class="sidebar-modal-widget">
                            <h3 class="title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, asperiores doloribus eum laboriosam praesentium delectus unde magni aut perspiciatis cumque deserunt dolore voluptate, autem pariatur? Dicta pariatur.</p>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Additional Links</h3>
                            <ul>
                                <li>
                                    <a href="log-in.html">Log In</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">Sign Up</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Contact Info</h3>
                            <ul class="contact-info">
                                <li>
                                    <i class="bx bx-location-plus"></i>
                                    Address
                                    <span>New York - 1060, Str. First 78 Great Western Road</span>
                                </li>
                                <li>
                                    <i class="bx bx-envelope"></i>
                                    Email
                                    <span>hello@prevoz.com</span>
                                </li>
                                <li>
                                    <i class="bx bxs-phone-call"></i>
                                    Phone
                                    <span>+502-464-679, +265-497-466</span>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-modal-widget">
                            <h3 class="title">Connect With Us</h3>
                            <ul class="social-list">
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-youtube'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Modal -->