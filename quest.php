
                  <script>
window.location = "https://suite.oceansidevacations.mx/protocolo/survey.php";

</script>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Canonical SEO -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
     <!-- Bootstrap core CSS     -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--<script src="assets/js/jquery-3.1.1.min.js"></script>-->
     <script src="assets/js/jquery.min.js"></script>
     <script src="assets/js/jquery-ui.min.js"></script>


       <!--signature jquery ui -->
         <link href="assets/css/jquery.signaturepad.css" rel="stylesheet">





        <link href="assets/css/banner.css" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        <!-- Select2 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


       <!--validate -->
        <script src="assets/js/jquery.validate.js"></script>
           <script src="assets/js/jquery.validate.min.js"></script>

   <title>quest</title>
</head>



<body>

        <div style="background-image: url('assets/img/home.jpg');"/>

         <div class="container d-flex flex-column align-items min-vh-100 text-dark">
        <div style="background-color: #eaeaeacc;">

          <div class="pt-lg-4 pb-lg-3 p-4 w-100 mb-auto text-center">

            <h3 class="text-center mb-5">Encuesta de protocolo<hr></h3>
                  <div class=" justify-content-md-center">
                 <div class="form-check form-switch">
                   <label class="form-check-label">Switch on for english</label>
                  <input class="form-check-input" type="checkbox" name="switch" id="switch"/>
                        </div>
                        </div>

                        <form id="myForm" method="post">

                <label class="col-form-label">Nombre/Name</label>
                 <!-- <input class="form-control" name="nombre"/>-->
              <select class="form-select js-example-basic-multiple" required name="names">
                <option value="0"></option>
                <?php
               include("config/conexion.php");
               $query = "select ID_COLABORADOR, NOMBRE, APELLIDO from colaborador WHERE STATUS= 1 order by NOMBRE asc ";
               $resultado = sqlsrv_query($conn, $query);

               while ($row= sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {

                                         $idc= $row['ID_COLABORADOR'];
                                         $nom= $row['NOMBRE'];
                                         $ape= $row['APELLIDO'];
                ?>
          <option value=<?php echo $idc;?>><?php echo utf8_encode($nom)." ".utf8_encode($ape);?></option>
         <?php } ?>
        </select>


                <br><hr>


           <div id="box1" class="desc">



          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="num">#</th>
      <th scope="sint">Sintoma</th>
      <th scope="si">Sí</th>
      <th scope="no">No</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <th scope="row">1</th>
      <td>Fiebre (Temperatura mayor de 37.5 C°)</td>
    <div id="myRadioGroup">
      <td><input type="radio" name="temp" value="1"/></td>
      <td><input type="radio" name="temp" value="2"/></td>
      </div>
    </tr>
    <tr>
     <th scope="row">2</th>
      <td>Dolor muscular</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="muscular" value="1"/></td>
      <td><input type="radio" name="muscular" value="2"/></td>
      </div>
    </tr>
       <tr>
     <th scope="row">3</th>
      <td>Dolor de cabeza</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="cabeza" value="1"/></td>
      <td><input type="radio" name="cabeza" value="2"/></td>
      </div>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Dificultad para respirar</td>
       <div id="myRadioGroup">
      <td><input type="radio"  name="cansansio" value="1"/></td>
      <td><input type="radio" name="cansansio" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">5</th>
      <td>Tos frecuente</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="tos" value="1"/></td>
      <td><input type="radio" name="tos" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">6</th>
      <td>Dolor de garganta</td>
     <div id="myRadioGroup">
      <td><input type="radio" name="garganta" value="1"/></td>
      <td><input type="radio" name="garganta" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">7</th>
      <td>Estornudos frecuentes</td>
     <div id="myRadioGroup">
      <td><input type="radio" name="estornudo" value="1"/></td>
      <td><input type="radio" name="estornudo" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">8</th>
      <td>Congestión nasal</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="nasal" value="1"/></td>
      <td><input type="radio"  name="nasal" value="2"/></td>
      </div>
    </tr>
     <tr>
      <th scope="row">9</th>
      <td>¿Has tenido contacto con algún enfermo de covid?</td>
      <div id="myRadioGroup">
      <td><input type="radio"  name="contacto" value="1"/></td>
      <td><input type="radio"  name="contacto" value="2"/></td>
      </div>
    </tr>
  </tbody>
</table>

            </div>
<!-- fin quest español --
                       -- Inicio quest ingles -->

            <div id="box2" class="desc" style="display: none;">


                  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Symptom</th>
      <th scope="col">Yes</th>
      <th scope="col">No</th>
    </tr>
  </thead>
  <tbody>
   <tr>
      <th scope="row">1</th>
      <td>temperature higher than 37.5 C° or 100 F</td>
    <div id="myRadioGroup">
      <td><input type="radio" name="temp" value="1"/></td>
      <td><input type="radio" name="temp" value="2"/></td>
      </div>
    </tr>
    <tr>

      <tr>
      <th scope="row">2</th>
      <td>headache</td>
     <div id="myRadioGroup">
      <td><input type="radio"  name="cabeza" value="1"/></td>
      <td><input type="radio"  name="cabeza" value="2"/></td>
      </div>
    </tr>
    <tr>
     <th scope="row">3</th>
      <td>Muscle pain</td>
       <div id="myRadioGroup">
     <td><input type="radio" name="muscular" value="1"/></td>
      <td><input type="radio" name="muscular" value="2"/></td>
      </div>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>difficulty breathing</td>
        <div id="myRadioGroup">
       <td><input type="radio"  name="cansansio" value="1"/></td>
      <td><input type="radio" name="cansansio" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">5</th>
      <td>Frequent cough</td>
       <div id="myRadioGroup">
     <td><input type="radio" name="tos" value="1"/></td>
      <td><input type="radio" name="tos" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">6</th>
      <td>Sore throat</td>
      <div id="myRadioGroup">
   <td><input type="radio" name="garganta" value="1"/></td>
      <td><input type="radio" name="garganta" value="2"/></td>
      </div>
    </tr>
      <tr>
      <th scope="row">7</th>
      <td>Frequent sneezing</td>
       <td><input type="radio" name="estornudo" value="1"/></td>
      <td><input type="radio" name="estornudo" value="2"/></td>
    </tr>
      <tr>
      <th scope="row">8</th>
      <td>Nasal congestion</td>
      <div id="myRadioGroup">
      <td><input type="radio" name="nasal" value="1"/></td>
      <td><input type="radio"  name="nasal" value="2"/></td>
      </div>
    </tr>
     <tr>
      <th scope="row">9</th>
      <td>Contact w/someone sick with covid?</td>
     <div id="myRadioGroup">
      <td><input type="radio"  name="contacto" value="1"/></td>
      <td><input type="radio"  name="contacto" value="2"/></td>
      </div>
    </tr>
  </tbody>
</table>


    </div>
    <!-- cierra box2 --->

            <div class="sigPad" id="smoothed-variableStrokeWidth" style="width:auto; margin-right: auto;margin-left: auto;">
    <ul class="sigNav">
    <li class="typeIt">Signature/firma</li>
      <li class="clearButton"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper current" style="height: auto; display: block;">
      <div class="typed">
      </div>
      <canvas class="pad" width="300" height="200"></canvas>
      <input type="hidden" name="output" class="output">
    </div>
  </div>


    <div class="mt-5 d-flex p-4 justify-content-around">

            <button  id="btn-submit" type="submit" class="btn btn-primary">Save</button>

         </div>
   </form>

        </div>
        </div>
        </div>
      </div>
 </body>

         <!-- Sweet Alert 2 plugin -->
       <script src="assets/js/sweetalert2.js"></script>
       <script src="assets/js/swal-forms.js"></script>
       <script src="assets/js/sweet-alert.js"></script>
       <script src="assets/js/sweetalert2.all.min.js"></script>
       <script src="assets/js/sweetalert2.all.js"></script>

       <script type="text/javascript" src="assets/js/jquery.ui.touch-punch.min.js"></script>

  <script src="assets/js/jquery.signaturepad.js"></script>

  <script>
    $(document).ready(function() {
      $('#smoothed-variableStrokeWidth').signaturePad({drawOnly:true, drawBezierCurves:true, variableStrokeWidth:true, lineTop:200});

    });
  </script>


  <script src="assets/js/json2.min.js"></script>
    <script>
$(document).ready(function(){
  $("#switch").on("change", function(e) {
    const isOn = e.currentTarget.checked;

    if (isOn) {
        $("#box2:hidden").show('slow');
        $("#box1").hide('slow');
    } else {
        $("#box2").hide('slow');
     $("#box1:hidden").show('slow');
    }
  });
});
    </script>


    <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();

        });
        </script>



<script>
 $("#myForm").validate({
      submitHandler: function(form) {

           var form = $('#myForm')[0];
             var formData = new FormData(form);
          swal({
            title: 'Now loading',
            allowEscapeKey: false,
            allowOutsideClick: false,
            //timer: 2000,
            onOpen: () => {
            swal.showLoading();
    }
  }).then(

           $.ajax({
            url: 'funcion/f_quest.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,

            dataType: 'json'
          })
          .done(function(response){

         swal.fire({
         title: response.title,
         type: response.status,
         text: response.message,
          footer: '<a href="comments.php">Quieres dejar un mensaje? / do You want to send to message?</a>'

         }).then(function() {
            window.location = "http://www.google.com";
          });
          })
          .fail(function(response){
             swal('Oops...', 'Make sure you have filled out the fields / Asegurate de marcar todas las casillas', 'error');
            // swal.stopLoading();
          }
          )
           )
           }
         });
</script>

  </html>
