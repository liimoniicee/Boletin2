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

   <title>Login</title>
</head>



<body>
 
        <div style="background-image: url('assets/img/home.jpg');"/>

      <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Ingresa tu usuario y contraseña</p>
              
             <form id="myForm" method="post">
               
              <div class="form-outline form-white mb-4">
                <input type="text" name="user" id="user" required class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Usuario</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="pass" id="pass" required class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Contraseña</label>
              </div>
               
              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
               </form>
          
                
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
 $("#myForm").validate({
      submitHandler: function(form) {
    
           var form = $('#myForm')[0];
             var formData = new FormData(form);
          swal({
            title: 'Now loading',
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
            swal.showLoading();
    }
  }).then(

           $.ajax({
            url: 'config/f_login.php',
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
        
         }).then(function() {
         if(response.status == 'success'){
          window.location = "admin_survey.php";
          }
          
          });
          })
          .fail(function(response){
             swal('Oops...', 'algo salio mal en el servidor', 'error');
            // swal.stopLoading();
          }
          )
           )
           }
         });
</script>

  </html>
