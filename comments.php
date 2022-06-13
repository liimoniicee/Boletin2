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
         <link href="/assets/css/jquery.signaturepad.css" rel="stylesheet">
       
     
      
            
       
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

   <title>comments</title>
</head>



<body>
 
        <div style="background-image: url('assets/img/home.jpg');"/>

        <div class="container col-lg-5 d-flex flex-column align-items-end min-vh-100 text-dark">
        <div style="background-color: #eaeaeacc;">
   
          <div class="col-lg-4 px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto text-center">
   
            <h3 class="text-center mb-5">Protocolos<hr></h3>
               <p>Gracias por contestar la encuesta. Desea dejarle algun mensaje al encargado de protocolos?</p>
                <p>Thank you for answering the survey. Do you want to send a message to the protocol manager?</p> 
                        <form id="myForm" method="post">
                        
           
               <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentario extra</label>
    <textarea class="form-control" name="coment" id="coment" rows="4" required ></textarea>
  </div>
  <hr>
   <button type="submit" class="btn btn-primary">Send</button>
     
   </form>  
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
  
  <script src="/assets/js/json2.min.js"></script>
  
    <script>

    </script>
    
    
        
          <script type="text/javascript">
         
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
            url: 'funcion/f_comment.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
           
            dataType: 'json'
          })
          .done(function(response){
            
         swal.fire({
         title: '¡Thank you!',
         type: 'success',
         //confirmButtonText: 'si',
         //cancelButtonText: 'no',
         text: response.message,
         //footer: '<a href="comments.php">Quieres dejar un mensaje? / do You want to send to message?</a>'
         //showCancelButton: true,
         
         }).then(function() {
            window.location = "http://www.google.com";
          });
          })
          .fail(function(response){
             swal('Oops...', response.message, 'error');
            // swal.stopLoading();
          }
          )
           )
           }
         });
     </script>



  </html>
