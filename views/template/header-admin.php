<?php
if ($_SESSION['rol'] == 3) {
    header('Location: ' . RUTA_ADMIN);
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo RUTA_PRINCIPAL. 'assets/'; ?>img/logo.png" type="image/png" />
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/app.css" rel="stylesheet">
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>css/header-colors.css" />
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo RUTA_PRINCIPAL. 'assets/admin/'; ?>DataTables/datatables.min.css" rel="stylesheet">
    <title><?php echo $data['title']; ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?php echo RUTA_PRINCIPAL. 'assets/'; ?>img/logo.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Reservas</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="<?= RUTA_ADMIN . 'dashboard'; ?>">
                        <div class="parent-icon"><i class="fa-solid fa-gauge"></i>
                        </div>
                        <div class="menu-title">Tablero</div>
                    </a>
                </li>
                <li>
                    <a href="<?= RUTA_ADMIN . 'reservas'; ?>">
                        <div class="parent-icon"><i class="fa-solid fa-bell"></i>
                        </div>
                        <div class="menu-title">Reservas</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fas fa-cogs"></i>
                        </div>
                        <div class="menu-title">Administración</div>
                    </a>
                    <ul>
                        <li> <a href="<?php echo RUTA_ADMIN . 'usuarios'; ?>"><i class="bx bx-right-arrow-alt"></i>Usuarios</a>
                        </li>
                        <li> <a href="<?php echo RUTA_ADMIN . 'clientes'; ?>"><i class="bx bx-right-arrow-alt"></i>Clientes</a>
                        </li>
                        <li> <a href="<?php echo RUTA_ADMIN . 'sliders'; ?>"><i class="bx bx-right-arrow-alt"></i>Banner</a>
                        </li>
                        <li> <a href="<?php echo RUTA_ADMIN . 'empresa'; ?>"><i class="bx bx-right-arrow-alt"></i>Configuración</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= RUTA_ADMIN . 'categorias'; ?>">
                        <div class="parent-icon"><i class='fas fa-tags'></i>
                        </div>
                        <div class="menu-title">Categorias</div>
                    </a>
                </li>
                <li>
                    <a href="<?= RUTA_ADMIN . 'habitaciones'; ?>">
                        <div class="parent-icon"><i class="fa-solid fa-hotel"></i>
                        </div>
                        <div class="menu-title">Habitaciones</div>
                    </a>
                </li>
                
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">

                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo RUTA_PRINCIPAL. 'assets/'; ?>img/logo.png" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?php echo $_SESSION['nombre_usuario']; ?></p>
                                <p class="designattion mb-0"><?php echo $_SESSION['usuario']; ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li> -->
                            <li><a class="dropdown-item" href="javascript:;" onclick="cerrarSesion(2)"><i class='bx bx-log-out-circle'></i><span>Salir</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">