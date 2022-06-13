<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Boletin informativo</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />

        <link href="assets/css/cardpro.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Boletín</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#empleadom">Empleado del mes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cumple">Cumpleaños</a></li>
                        <li class="nav-item"><a class="nav-link" href="#efeme">Especial</a></li>
                        <li class="nav-item"><a class="nav-link" href="survey.php">Encuesta</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        <?php

            $meses = array("E N E R O","F E B R E R O","M A R Z O","A B R I L","M A Y O","J U N I O","J U L I O","A G O S T O","S E P T I E M B R E","O C T U B R E","N O V I E M B R E","D I C I E M B R E");


        ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">

          <!-- Barra lateral-->
            <div class="card my-5 py-4 text-center"
                style="
                background: fixed;
                background-image: url('assets/img/banner1.png');">
                <div class="card-body"><h3 class="h4 text-white"><?php echo $meses[date('n')-1];  ?></h3></div>
            </div>
            <!-- Heading Row-->
            <div class="col-md-12">
              <div class="featured-carousel owl-carousel" data-interval="10000">

                <?php
                include ("config/conexion.php");
                  require ('funcion/f_get_query.php');
                $noticia = "SELECT * FROM BOLETIN WHERE TIPO = 1";

                 echo carrusel($noticia);
                ?>

                <!-- termina  item-->
              </div>
                <!-- termina carrousel-->
            </div></br>
              <!-- termina col md 12-->
                 <!-- Barra lateral-->
          <div class="card text-white bg-secondary my-5 py-4 text-center"
          style="
                background: fixed;
                background-image: url('assets/img/banner5.jpg');">
                <div class="card-body" id="empleadom"><h4 class="text-white h4">EMPLEADO DEL MES</h4></div>
            </div>
            <!-- Content Row-->

            <?php

          $consult1 = "select * from evento where tipo_eve = 1";
          $consult2 = "SELECT * FROM EVENTO WHERE TIPO_EVE = 2 ORDER BY DIA_EVE";


        ?>
         <!--Profile Card 3 ========== Empleado del mes =========-->

         <div class="row gx-4 gx-lg-5 col d-flex justify-content-center">
         <?php
         echo emple($consult1);

                    ?>

          </div>
          <!-- Barra lateral-->
          <div class="card bg-secondary my-5 py-4 text-center"
          style="
                background: fixed;
                background-image: url('assets/img/bgcumple2.jpg');">
                <div class="card-body" id="cumple"><strong><h3 class="h3">C U M P L E A Ñ O S</h3></strong></div>
            </div>
            <!-- Content Row-->
          <!--Profile Card 3 ========== Cumpleaños =========-->
        <div class="row  gx-4 gx-lg-5 col d-flex justify-content-center">
         <?php
         echo cumple($consult2);

                    ?>

          </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje para:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">

        <form method='post' action="" onsubmit="return post();">
                    <input type='hidden' name="id" id="id"/>
                    <input type='text' class='form-control' name="nom" id="nom" required placeholder='Nombre'/></br>
                    <textarea name="msg" class='form-control' id= "comment" required placeholder="Escribe tu mensaje aquí..."></textarea></br>
                    <button  type="submit"  class='btn btn-primary my-1'>Enviar</button>


                </form></br>
                <div id="all_comments">

             </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

            <!-- Barra lateral-->
          <div class="card text-white bg-secondary my-5 py-4 text-center"
          style="
                background: fixed;
                background-image: url('assets/img/banner5.jpg');">
                <div class="card-body" id="efeme"><h4 class="text-white h4">E S P E C I A L</h4></div>
            </div>
            <!-- Heading Row-->
            <div class="col-md-12">
              <div class="featured-carousel owl-carousel">

                <?php

                $especial = "SELECT * FROM BOLETIN WHERE TIPO = 2";

                 echo carrusel($especial);
                ?>


                <!-- termina  item-->
              </div></br>
                <!-- termina carrousel-->
            </div></br>
              <!-- termina col md 12-->
        </div></br></hr>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; LandsEnd Marketing 2021</p></div>
        </footer>

        <!-- Core theme JS-->
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
       <script src="assets/js/bootstrap.min.js"></script>
       <!-- Bootstrap core JS-->
       <script src="assets/js/bootstrap.bundle.min.js"></script>
          <!-- Sweet Alert 2 plugin -->
       <script src="assets/js/sweetalert2.js"></script>
       <script src="assets/js/swal-forms.js"></script>
       <script src="assets/js/sweet-alert.js"></script>
       <script src="assets/js/sweetalert2.all.min.js"></script>
       <script src="assets/js/sweetalert2.all.js"></script>


       <script src="assets/js/popper.js"></script>

       <script src="assets/js/owl.carousel.min.js"></script>
       <script src="assets/js/main2.js"></script>

       <script type="text/javascript" src="assets/js/jquery.ui.touch-punch.min.js"></script>
           <!--validate -->
           <script src="assets/js/jquery.validate.js"></script>
           <script src="assets/js/jquery.validate.min.js"></script>
           <script>
           $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombre = button.data('nombre')
  var id =  button.data('id')
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + nombre)
  modal.find('#id').val(id)
  $.ajax
  ({
    type: 'post',
    url: 'funcion/f_get_coment.php',
    data:
    {
     user_id: id,

    },
    success: function (response)
    {
    document.getElementById("all_comments").innerHTML = "";
    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;

    }
  });
})
</script>
        <script>

            function onClick1(id) {
                var clicks1 = parseInt($("#ID"+id).text());
                        clicks1 += 1;
                        $.ajax({
                        type: "POST",
                        url: "funcion/f_save_likes.php",
                        data : {
                      id : id,
                      clicks1 : clicks1
                             },
                        cache: false,
                        success: function(response)
                        {

                        document.getElementById("ID"+id).innerHTML = clicks1;

                        }
                        });
                        }

                </script>


    <script type="text/javascript">
    function post()
    {
      var comment = document.getElementById("comment").value;
      var name = document.getElementById("nom").value;
      var id = document.getElementById("id").value;
      if(comment && name)
      {
        $.ajax
        ({
          type: 'post',
          url: 'funcion/post_comment.php',
          data:
          {
           user_id: id,
           user_comm:comment,
    	     user_name:name
          },
          success: function (response)
          {
    	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
    	    document.getElementById("comment").value="";
          document.getElementById("nom").value="";

          }
        });
      }

      return false;
    }
    </script>



    </body>
</html>
