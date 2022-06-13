<?php
include('config/check_S.php');
verificar_sesion();
$id_u = $_SESSION['id'];
$usuario = $_SESSION['usuario'];
include ('config/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="favicon.ico"
      type="image/x-icon"
    />
    <title>Administrador | Protocolos</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/jquery.signaturepad.css"/>

    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
  </head>


  <body>


    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <img src="assets/images/logo/logo.svg" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon"><i class="lni lni-dashboard"></i></span>
              <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
              <li>
                <a href="administrador.php">
                  <i class="lni lni-arrow-right"></i> Administrador
                </a>
              </li>
              <li>
                <a href="admin_survey.php" class="active">
                  <i class="lni lni-arrow-right"></i> Survey admin
                </a>
              </li>
              <li>
                <a href="admin_calendar.php">
                  <i class="lni lni-arrow-right"></i> Calendario
                </a>
              </li>
              <li>
                <a href="admin_boletin.php">
                  <i class="lni lni-arrow-right"></i> Boletín
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button
                    id="menu-toggle"
                    class="main-btn primary-btn btn-hover"
                  >
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>

              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <?php
                $noti = "SELECT Q.ID_QUEST, C.NOMBRE, Q.FECHA
                                FROM quest Q, colaborador C
                                WHERE 1
                                IN
                                (TEMPERATURA, FIEBRE, MUSCULAR, CANSANCIO, TOS,
                                GARGANTA, ESTORNUDO, CONGESTION, CABEZA, CONTACTO_C_ENFERMO) AND C.ID_COLABORADOR = Q.COLABORADOR_ID_COL";
                            $resunoti = sqlsrv_query($conn, $noti, array(), array( "Scrollable" => 'static' ));

                      $row_cnt_noti = sqlsrv_num_rows( $resunoti );

                ?>
                <div class="notification-box ml-15 d-none d-md-flex">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="notification"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="lni lni-alarm"></i>
                    <span><?php echo $row_cnt_noti ?> </span>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="notification"
                  >
                       <?php

                            while($row = sqlsrv_fetch_array($resunoti, SQLSRV_FETCH_ASSOC)) {

                   echo "<li>
                      <a onclick= 'consultQ(".$row['ID_QUEST'].");'>
                        <div class='content'>
                          <h6>".$row['NOMBRE']."</h6>
                          <p>Ha activado sintomas</p>
                          <span>".$row['FECHA']->format('d-m-Y')."</span>
                        </div>
                      </a>
                    </li>";
                   }

                   ?>
                  </ul>
                </div>
                <!-- notification end -->
                <!-- message start -->

                <?php

                 $var2 = "SELECT * FROM comentarios WHERE STATUS = 1";
                            $resu =  sqlsrv_query($conn, $var2, array(), array( "Scrollable" => 'static' ));
                 $row_cnt =  sqlsrv_num_rows( $resu );

                ?>

                <div class="header-message-box ml-15 d-none d-md-flex">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="message"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="lni lni-envelope"></i>
                    <span><?php echo $row_cnt ?> </span>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="message"
                  >

                   <?php

                            while($row = sqlsrv_fetch_array($resu, SQLSRV_FETCH_ASSOC)) {

                   echo "<li>
                      <a href='#0'>
                        <div class='content'>
                          <h6>".$row['FECHA']->format('d-m-Y')."</h6>
                          <p>".substr($row['COMENTARIO'], 0, 40)."...</p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>";
                   }

                   ?>
                  </ul>
                </div>
                <!-- message end -->

                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile-info">
                      <div class="info">
                        <h6><?php echo $usuario; ?></h6>
                        <div class="image">
                          <img
                            src="assets/img/user.png"
                            alt=""
                          />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="config/destroy.php"> <i class="lni lni-exit"></i>Cerrar sesión</a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Admin Protocolos</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">ADMINISTRACION</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Protocolos
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

         <?php
         date_default_timezone_set("America/Monterrey");
        echo  "Hoy es: ". $fecha = date("d-m-Y");
         $week2 = date("W", strtotime("+1 day",strtotime($fecha)));
        echo " semana: ". $week = $week2 + 1;

         require ('funcion/f_get_query.php');
         $Totcol = "SELECT COUNT(ID_COLABORADOR)AS TOTAL FROM colaborador";

         $TotColAct = "SELECT COUNT(ID_COLABORADOR)AS TOTAL FROM colaborador WHERE STATUS = 1";

         $TotQuest = "SELECT COUNT(ID_SURVEY)AS TOTAL FROM survey";

         $TotQuestWe = "SELECT COUNT([ID_SURVEY]) AS TOTAL FROM survey WHERE SEMANA = $week";

         $QuestSint = "SELECT COUNT(ID_SURVEY) AS TOTAL
                        FROM survey
                        WHERE 1
                        IN
                        (FIEBRE, RESPIRAR, TOS, CONTACTO)
                        AND SEMANA = '$week'";

          $TotCom = "SELECT COUNT(ID_COMENTARIO) AS TOTAL FROM comentarios WHERE SEMANA = '$week'";

          ?>
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total de empleados</h6>
                  <h3 class="text-bold mb-10"><?php echo consulta($Totcol); ?></h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-consulting"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Empleados activos</h6>
                  <h3 class="text-bold mb-10"><?php echo consulta($TotColAct); ?></h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-empty-file"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Encuestas realizadas</h6>
                  <h3 class="text-bold mb-10"><?php consulta($TotQuest);  ?></h3>

                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-write"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Encuestas realizadas esta semana</h6>
                  <h3 class="text-bold mb-10"><?php consulta($TotQuestWe);  ?></h3>

                </div>
                    <!-- End Col -->
                  </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
             <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-sad"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Encuestas que activaron sintomas</h6>
                  <h3 class="text-bold mb-10"><?php consulta($QuestSint);  ?></h3>

                </div>

                    <!-- End Col -->
                  </div>
              <!-- End Icon Cart -->
            </div>
             <!-- End Col -->
             <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-comments"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Comentarios esta semana</h6>
                  <h3 class="text-bold mb-10"><?php consulta($TotCom);  ?></h3>

                </div>
                   <!-- End Col -->
                  </div>
              <!-- End Icon Cart -->
            </div>
          </div>
          <!-- End Row -->
          <div class="row">

            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div
                  class="title d-flex flex-wrap justify-content-between align-items-center"
                >

                <div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ENCUESTAS REALIZADAS</a></li>

    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">FALTA ENCUESTA</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">1



<!-- EMPIEZA LA TABLA -->

<div class="table-wrapper table-responsive">

<table id="EncueReal" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DEPARTAMENTO</th>
            <th>AREA</th>
            <th>SINTOMAS</th>
            <th>FECHA</th>
            <th>ACCION</th>

        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>
<!-- TERMINA LA TABLA -->
</div>
    <div role="tabpanel" class="tab-pane" id="messages">2


<!-- EMPIEZA LA TABLA -->

<div class="table-wrapper table-responsive">

<table id="FaltaEncue" class="table" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DEPARTAMENTO</th>
            <th>AREA</th>



        </tr>
    </thead>
    <tbody>


    </tbody>
</table>
</div>
<!-- TERMINA LA TABLA -->

    </div>

  </div>

</div>

              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->


        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a
                    href="https://plainadmin.com"
                    rel="nofollow"
                    target="_blank"
                  >
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div
                class="terms d-flex justify-content-center justify-content-md-end"
              >
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
     <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.datatables.js"></script>
     <script src="assets/js/jquery.dataTables.min.js"></script>



    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/banner.js"></script>


      <!-- Sweet Alert 2 plugin -->
       <script src="assets/js/sweetalert2.js"></script>
       <script src="assets/js/swal-forms.js"></script>
       <script src="assets/js/sweet-alert.js"></script>
       <script src="assets/js/sweetalert2.all.min.js"></script>
       <script src="assets/js/sweetalert2.all.js"></script>

<!-- json2.js -->
<script src="assets/js/json2.min.js"></script>

<!-- signature pad -->
<script src="assets/js/jquery.signaturepad.js"></script>


 <!---    datatables buttons     -->
     <script src="assets/js/dataTables.buttons.min.js"></script>
     <script src="assets/js/jszip.min.js"></script>
     <script src="assets/js/pdfmake.min.js"></script>
     <script src="assets/js/vfs_fonts.js"></script>
     <script src="assets/js/buttons.html5.min.js"></script>
     <script src="assets/js/buttons.print.min.js"></script>

<!-- Tablas -->
    <script src="funcion/js/admin_datatables.js"></script>


    <!---    ajax para obtener datos de encuesta     -->
       <script src="funcion/js/admin_get_ajax.js"></script>


    <!---    swal que muestra la encuesta     -->
    <script type="text/javascript" src="funcion/js/admin_swals.js"></script>

  </body>
</html>
