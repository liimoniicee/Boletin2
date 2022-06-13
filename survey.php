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
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

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
                <!--<option value="0"></option>-->
                <option disabled selected>your name</option>
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
      <th scope="sint">Síntoma</th>
      <th scope="si">Si</th>
      <th scope="no">No</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>¿Tiene o recientemente ha tenido tos?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="tos" value="1"/></td>
      <td><input type="radio" name="tos" value="2"/></td>
      </div>
    </tr>
    <th scope="row">2</th>
      <td>¿Tiene o recientemente ha tenido dificultad para respirar?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="respirar" value="1"/></td>
      <td><input type="radio" name="respirar" value="2"/></td>
      </div>
    </tr>
    <th scope="row">3</th>
      <td>¿Tiene o recientemente ha tenido fiebre (37.5°C o más alta) o escalofríos?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="fiebre" value="1"/></td>
      <td><input type="radio" name="fiebre" value="2"/></td>
      </div>
    </tr>
    <th scope="row">4</th>
      <td>
          <div class="row">Si tiene algún otro síntoma, márquelo de la siguiente lista:</div>
    <!-- fila 1 -->
    <div< id="mychecks" >
  <div class="row">
  <div class="col">


      <div class="form-check">
  <input class="form-check-input" type="checkbox"  name="sintomas[]" value="fatiga">
  <label class="form-check-label" >Fatiga</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="diarrea">
  <label class="form-check-label" for="inlineCheckbox2">Diarrea</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor de cabeza">
  <label class="form-check-label" >Dolor de cabeza</label>
</div>
 </div>
               <!-- fin fila 1 -->
                <!-- fila 2 -->
                <div class="col">
         <div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="perdida de gusto y/o olfato">
  <label class="form-check-label" >Perdida del gusto y olfato</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  name="sintomas[]" value="congestion nasal">
  <label class="form-check-label" >Congestión o secresión nasal</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor de garganta">
  <label class="form-check-label" >Dolor de garganta</label>
</div>
 </div>
         <!-- fin fila 2 -->
          <!-- fila 3 -->
          <div class="col">
      <div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor muscular">
  <label class="form-check-label" >Dolores musculares</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]"  value="nauseas">
  <label class="form-check-label" >Nauseas o vómito</label>
</div>

     </div></div>
               </div>

         <!-- fin fila 3 -->

      </td>
       <div id="myRadioGroup">
      <td><input type="radio" checked id = "sintomasi1" name="sintoma" value="1"/></td>
      <td><input type="radio"  id = "sintomano1" name="sintoma" value="2"/></td>
      </div>
    </tr>
    <th scope="row">5</th>
      <td>¿Usted ha estado en contacto cercano con alguien que haya sido diagnosticado con COVID-19 en los últimos 14 días?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="contacto" value="1"/></td>
      <td><input type="radio" name="contacto" value="2"/></td>
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
      <th scope="num">#</th>
      <th scope="sint">symptom</th>
      <th scope="yes">Yes</th>
      <th scope="no">No</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td>Do you have or have you recently had a cough?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="tos" value="1"/></td>
      <td><input type="radio" name="tos" value="2"/></td>
      </div>
    </tr>
    <th scope="row">2</th>
      <td>Do you have or have you recently had difficulty breathing?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="respirar" value="1"/></td>
      <td><input type="radio" name="respirar" value="2"/></td>
      </div>
    </tr>
    <th scope="row">3</th>
      <td>Do you have or have you recently had a fever (37.5 ° C or higher) or chills?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="fiebre" value="1"/></td>
      <td><input type="radio" name="fiebre" value="2"/></td>
      </div>
    </tr>
    <th scope="row">4</th>
      <td>
          <div class="row">If you have any other symptoms, check them from the list below:</div>
    <!-- fila 1 -->
    <div< id="mychecks2" >
  <div class="row">
  <div class="col">


      <div class="form-check">
  <input class="form-check-input" type="checkbox"  name="sintomas[]" value="fatiga">
  <label class="form-check-label" >Fatigue</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="diarrea">
  <label class="form-check-label" for="inlineCheckbox2">Diarrhea</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor de cabeza">
  <label class="form-check-label" >Headache</label>
</div>
 </div>
               <!-- fin fila 1 -->
                <!-- fila 2 -->
                <div class="col">
         <div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="perdida de gusto y/o olfato">
  <label class="form-check-label" >Loss of taste and smell</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  name="sintomas[]" value="congestion nasal">
  <label class="form-check-label" >Stuffy or runny nose</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor de garganta">
  <label class="form-check-label" >Throat pain</label>
</div>
 </div>
         <!-- fin fila 2 -->
          <!-- fila 3 -->
          <div class="col">
      <div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]" value="dolor muscular">
  <label class="form-check-label" >muscle pains</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name="sintomas[]"  value="nauseas">
  <label class="form-check-label" >Nausea or vomiting</label>
</div>

     </div></div>
               </div>

         <!-- fin fila 3 -->

      </td>
       <div id="myRadioGroup">
      <td><input type="radio"  id = "sintomasi2" name="sintoma" value="1"/></td>
      <td><input type="radio"  id = "sintomano2" name="sintoma" value="2"/></td>
      </div>
    </tr>
    <th scope="row">5</th>
      <td>Have you been in close contact with someone who has been diagnosed with COVID-19 in the last 14 days?</td>
       <div id="myRadioGroup">
      <td><input type="radio" name="contacto" value="1"/></td>
      <td><input type="radio" name="contacto" value="2"/></td>
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
        $("#box1 *").attr("disabled", "disabled");
        $("#box2 *").removeAttr('disabled');
    } else {
        $("#box2").hide('slow');
     $("#box1:hidden").show('slow');
     $("#box2 *").attr("disabled", "disabled");
     $("#box1 *").removeAttr('disabled');
    }
  });
});
    </script>

<script>
  $(document).ready(function(){
    $("#sintomasi1, #sintomasi2").on("change", function() {
        $("#mychecks:hidden, #mychecks2:hidden").show('slow');
    })
    $("#sintomano1, #sintomano2").on("change", function() {
   $("#mychecks, #mychecks2").hide('slow');
    })
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
            url: 'funcion/f_survey.php',
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
            window.location = "boletin.php";
          // window.location.reload();
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
