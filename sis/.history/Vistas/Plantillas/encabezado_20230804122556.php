<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="../../Resources/css/index.css">
  <link href="../../Resources/assets/img/favicon.png" rel="icon">
  <link href="../../Resources/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../../Resources/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../Resources/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../../Resources/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="../../Resources/assets/js/dist/jquery.tabledit.js"></script>
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="http://localhost/sis/sistema.php">
          <i class="bi bi-grid"></i>
          <span>Admin</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Archivos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="http://localhost/sis/Vistas/DatosPersonales/datperson.php">
              <i class="bi bi-circle"></i><span>Datos Personales</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Areas/areas.php">
              <i class="bi bi-circle"></i><span>Areas</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Planillas/planillas.php">
              <i class="bi bi-circle"></i><span>Tipo de Planillas</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Categorias/categorias.php">
              <i class="bi bi-circle"></i><span>Categorias</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Modalidades/modalidades.php">
              <i class="bi bi-circle"></i><span>Modalidades</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Variables/variable.php">
              <i class="bi bi-circle"></i><span>Variables</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Remuneraciones/remu.php">
              <i class="bi bi-circle"></i><span>Renumeraciones</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Sistemapensionario/sistemapensionario.php">
              <i class="bi bi-circle"></i><span>Sistema Pensionario</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Descuentosvarios/dv.php">
              <i class="bi bi-circle"></i><span>Descuentos Varios </span>
            </a>
          </li>
          <!-- <li>
            <a href="http://localhost/sis/Vistas/Finales/finales.php">
              <i class="bi bi-circle"></i><span>Finales (f)</span>
            </a>
          </li> -->
          <li>
            <a href="http://localhost/sis/Vistas/Usuarios/usuarios.php">
              <i class="bi bi-circle"></i><span>Usuarios</span>
            </a>
          </li>
          <li>
            <a href="/sis/Vistas/Programas/programas.php">
              <i class="bi bi-circle"></i><span>Programas</span>
            </a>
          </li>
          <li>
            <a href="http://localhost/sis/Vistas/Partidas/partidas.php">
              <i class="bi bi-circle"></i><span>Partidas</span>
            </a>
          </li>
   
          <li>
            <a href="http://localhost/sis/Vistas/Siaf_Descuento/siafdescuento.php">
              <i class="bi bi-circle"></i><span>Siaf Descuento</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Procesos </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="http://localhost/sis/Vistas/Meses/meses.php">
              <i class="bi bi-circle"></i><span>Meses </span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
    </ul>
  </aside><!-- End Sidebar-->