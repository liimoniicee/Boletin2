
        // =========== Ver encuesta ==============
             function verquest(nom){

              swal.fire({
             title: 'Encuesta',
             html:
            '<form method="post" name="data" id="data">'+

            '<input class="form-control" type="hidden" name="id" id="id_s">' +
            '<label >NOMBRE</label>' +
            '<input class="form-control" disabled value="'+nom+'" name="">' +
            '<label >Tos frecuente</label>' +
            '<input class="form-control" disabled name="" id="tos">' +

            '<label>Dificultad para respirar</label>'+
            '<input class="form-control" disabled mame="" id="resp">'+

            '<label >Fiebre</label>' +
            '<input class="form-control" disabled name="" id="fie">' +

            '<label >Otros sintomas</label>' +
            '<input class="form-control" disabled name="" id="sint">' +

            '<label >contacto con enfermo</label>' +
            '<input class="form-control" disabled name="" id="cont">'+
            '</br>'+
            '<label >Seguimiento</label>' +
            '<input class="form-control" name="seg" id="seg">'+
            '</br>'+

            '<div class="sigPad" id="smoothed" style="width:auto; margin-right: auto;margin-left: auto;">'+
            '<div class="sig sigWrapper current" style="height: auto; display: block;">'+
            '<div class="typed">'+
            '</div>'+
            '<canvas class="pad" width="auto" height="auto"></canvas>'+
            '<input type="hidden" name="" class="output">'+
            '</div>'+
          '</div>',

          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Listo',
          showConfirmButton: true,
          preConfirm: function() {
            return new Promise(function(resolve) {

          var form = $('#data')[0];
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
         url: 'funcion/f_update_seg.php',
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
          $('#ActivSinto').DataTable().ajax.reload();
       });
       })
       .fail(function(response){
          swal('Oops...', response.message, 'error');

       })
        )
        });
        }

       });
       }

       // =========== Editar colaborador ==============
                    function vercol(){


                    swal.fire({
                    title: 'Editar colaborador',
                    html:
                     '<form method="post" name="data" id="data">'+
                     '<input class="form-control" type= "hidden" name="id" id="id">' +
                    '<label >Nombre</label>' +
                     '</br>'+
                    '<input class="form-control" name="nom" id="nom">' +
                     '</br>'+
                     '<label >Apellido</label>' +
                      '</br>'+
                    '<input class="form-control"  name="ape" id="ape">' +
                     '</br>'+
                     '<label >Area</label>' +
                      '</br>'+
                    '<input class="form-control"  name="area" id="area">' +
                     '</br>'+
                     '<label >Departamento</label>' +
                      '</br>'+
                    '<input class="form-control"  name="dpto" id="dpto">' +
                     '</br>'+
                    '<label >Estatus</label>' +
                       '</br>'+
                     '<select class="form-control" name="stat" id="stat">'+
                         '<option value="0" selected>Selecciona una opcion</option>'+
                           '<option value="1">ACTIVO</option>'+
                             '<option value="2">INACTIVO</option>'+

                                 '</select>'+
                                 '</br>',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Guardar',
                  showConfirmButton: true,
                    preConfirm: function() {
                      return new Promise(function(resolve) {

                       var form = $('#data')[0];
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
                   url: 'funcion/f_update_col.php',
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
                $('#colaboradores').DataTable().ajax.reload();
                 });
                 })
                 .fail(function(response){
                    swal('Oops...', response.message, 'error');

                 }
                 )
                  )
                  });
                  }

                });
                }
// agregar colaborador admin

                function addcol(){


                swal.fire({
                title: 'Agregar colaborador',
                html:
                 '<form method="post" name="data" id="data">'+

                '<label >Nombre</label>' +
                 '</br>'+
                '<input class="form-control" name="nom" id="nom">' +
                 '</br>'+
                 '<label >Apellido</label>' +
                  '</br>'+
                '<input class="form-control"  name="ape" id="ape">' +
                 '</br>'+
                 '<label >Area</label>' +
                  '</br>'+
                '<input class="form-control"  name="area" id="area">' +
                 '</br>'+
                 '<label >Departamento</label>' +
                  '</br>'+
                '<input class="form-control"  name="dpto" id="dpto">' +
                 '</br>'+
                '<label >Estatus</label>' +
                   '</br>'+
                 '<select class="form-control" name="stat" id="stat">'+
                     '<option value="0" selected>Selecciona una opcion</option>'+
                       '<option value="1">ACTIVO</option>'+
                         '<option value="2">INACTIVO</option>'+

                             '</select>'+
                             '</br>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                showConfirmButton: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {

                   var form = $('#data')[0];
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
                url: 'funcion/f_add_col.php',
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
              $('#colaboradores').DataTable().ajax.reload();
                });
                })
                .fail(function(response){
                swal('Oops...', response.message, 'error');

                })
                )
                });
                }

                });
                }

                    //---    swal que muestra colaborador     -->


                             function verinfo(){


                             swal.fire({
                             title: 'Editar',
                             html:
                              '<form method="post" name="data" id="data">'+
                              '<input class="form-control" type= "hidden" name="id" id="id">' +
                                '<input class="form-control" type= "hidden" name="srcfoto" id="srcfoto">' +
                             '<label >Nombre</label>' +
                              '</br>'+
                             '<input class="form-control" name="nom" id="nom">' +
                              '</br>'+
                              '<label >Puesto</label>' +
                               '</br>'+
                             '<input class="form-control"  name="pues" id="pues">' +
                               '</br>'+
                              '<label >Día</label>' +
                               '</br>'+
                             '<input class="form-control"  name="dia" id="dia">' +
                             '</br>'+
                             '<label >Tipo</label>' +
                              '</br>'+
                             '<select class="form-control" name="tipo" id="tipo">'+
                                 '<option value="0" selected>Selecciona una opcion</option>'+
                                   '<option value="1">EMPLEADO DEL MES</option>'+
                                     '<option value="2">CUMPLEAÑOS</option>'+

                                         '</select>'+
                                         '</br>'+
                                       '<img class="img-thumbnail" style="width:150px;" name="imgfoto" id="imgfoto"></img>'+
                                         '</br>'+
                                       '<label >IMG</label>' +
                                         '</br>'+
                                         '<input type="file" required class="form-control"  name="foto" id="foto">' +
                                                    '</br>',
                             showCancelButton: true,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Guardar',
                           showConfirmButton: true,
                             preConfirm: function() {
                               return new Promise(function(resolve) {

                                var form = $('#data')[0];
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
                            url: 'funcion/f_update_event.php',
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
                              $('#Eventos').DataTable().ajax.reload();
                          });
                          })
                          .fail(function(response){
                             swal('Oops...', response.message, 'error');

                          }
                          )
                           )
                           });
                           }

                         });
                         }

                //--=============termina swal que muestra evento ===-->
              //-=============agregar evento===================-->

                function addInfo(){
                swal.fire({
                title: 'Agregar colaborador',
                html:
                 '<form method="post" name="data" id="data">'+

                '<label >Nombre</label>' +
                '</br>'+
                '<input class="form-control" name="nom" id="nom">' +
                '</br>'+
                '<label >Puesto</label>' +
                '</br>'+
                '<input class="form-control"  name="pues" id="pues">' +
                '</br>'+
                '<label >Dia</label>' +
                '</br>'+
                '<input class="form-control"  name="dia" id="dia">' +
                '</br>'+
                '<select class="form-control"  name="tipo" id="tipo">' +
                '<option value="0" selected>SELECCIONA UNA OPCION</option>'+
                '<option value="1">EMP MES</option>'+
                '<option value="2">CUMPLEAÑOS</option>'+
                '</select>'+
                  '</br>'+
                '<label >Foto</label>' +
                               '</br>'+
                             '<input type="file" class="form-control"  name="foto" id="foto">' +
                             '</br>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                 //customClass: 'swal-wide',
                showConfirmButton: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {

                var form = $('#data')[0];
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
                url: 'funcion/f_add_event.php',
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
                $('#Eventos').DataTable().ajax.reload();
                });
                })
                .fail(function(response){
                swal('Oops...', response.message, 'error');

                  })
                  )
                    });
                  }

                    });
                  }

                  //=============termina agregar evento===================-->



          //                 swal que muestra noti     -->


                             function verinfonoti(){


                             swal.fire({
                             title: 'Editar',
                             html:
                            '<form method="post" name="data" id="data">'+
                            '<input class="form-control" type="hidden" name="id" id="id"/>' +
                            '<input class="form-control" type="hidden" name="srcimg" id="srcimg"/>' +
                            '<label >TITULO</label>' +
                            '</br>'+
                            '<input class="form-control" name="tit" id="tit"/>' +
                            '</br>'+
                            '<label >TEXTO</label>' +
                            '</br>'+
                            '<textarea class="form-control" rows="8" name="text" id="text"></textarea>' +
                            '</br>'+
                            '<label >TIPO</label>' +
                            '</br>'+
                            '<select class="form-control"  name="tipo" id="tipo">' +
                            '<option value="0" selected>SELECCIONA UNA OPCION</option>'+
                            '<option value="1">NOTICIA</option>'+
                            '<option value="2">ESPECIAL</option>'+
                            '</select>'+
                            '</br>'+
                            '<img class="img-thumbnail" style="width:150px;" name="img" id="image"></img>'+
                            '</br>'+
                            '<label >IMG</label>' +
                            '</br>'+
                            '<input type="file" required class="form-control"  name="img" id="img">' +
                                         '</br>',
                             showCancelButton: true,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Guardar',
                           showConfirmButton: true,
                            customClass: 'swal-wide',
                             preConfirm: function() {
                               return new Promise(function(resolve) {

                                var form = $('#data')[0];
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
                            url: 'funcion/f_edit_noti.php',
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
                          $('#Boletin').DataTable().ajax.reload();
                          });
                          })
                          .fail(function(response){
                             swal('Oops...', response.message, 'error');

                          })
                           )
                           });
                           }

                         });
                         }

                //--=============termina swal que muestra noti ===-->
              //--=============agregar noticia===================-->

                function addnoti(){
                swal.fire({
                title: 'Agregar noticia',
                html:
                '<form method="post" name="data" id="data">'+
                '<label >TITULO</label>' +
                '</br>'+
                '<input class="form-control" name="tit" id="tit"/>' +
                '</br>'+
                '<label >TEXTO</label>' +
                '</br>'+
                '<textarea class="form-control" rows="8" name="text" id="text"></textarea>' +
                '</br>'+
                '<label >TIPO</label>' +
                '</br>'+
                '<select class="form-control"  name="tipo" id="tipo">' +
                '<option value="0" selected>SELECCIONA UNA OPCION</option>'+
                '<option value="1">NOTICIA</option>'+
                '<option value="2">ESPECIAL</option>'+
                '</select>'+
                '<label>IMG</label>' +
                '</br>'+
                '<input type="file" class="form-control"  name="img" id="img">' +
                             '</br>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                customClass: 'swal-wide',
                showConfirmButton: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {
                var form = $('#data')[0];
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
                url: 'funcion/f_add_noti.php',
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
              $('#Boletin').DataTable().ajax.reload();
                });
                })
                .fail(function(response){
                swal('Oops...', response.message, 'error');

                  })
                  )
                    });
                  }

                    });
                  }

                //-=============termina agregar noticia===================-->

                //--=============Eliminar noticia===================-->

                  function delnoti(id){
                    swal({
                   title: 'Borrar?',
                   text: "Esta accion no se puede revertir",
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Si, borralo',
                   showLoaderOnConfirm: true,
                   preConfirm: function() {
                     return new Promise(function(resolve) {
                       $.ajax({
                        url: 'funcion/delnoti.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                      location.reload();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                     });
                     });
                   },
                   allowOutsideClick: false
                });
                }


              //-=============termina Eliminar noticia===================-->


              //--=============Eliminar msjes===================-->

                  function delmsg(id){
                    swal({
                   title: 'Borrar?',
                   text: "Esta accion no se puede revertir",
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Si, borralo',
                   showLoaderOnConfirm: true,
                   preConfirm: function() {
                     return new Promise(function(resolve) {
                       $.ajax({
                        url: 'funcion/delmsg.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                      location.reload();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                     });
                     });
                   },
                   allowOutsideClick: false
                });
                }

                //--=============Eliminar evento===================-->

                  function delevent(id){
                    swal({
                   title: 'Borrar?',
                   text: "Esta accion no se puede revertir",
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Si, borralo',
                   showLoaderOnConfirm: true,
                   preConfirm: function() {
                     return new Promise(function(resolve) {
                       $.ajax({
                        url: 'funcion/del_event.php',
                        type: 'POST',
                        data: 'delete='+id,
                        dataType: 'json'
                     })
                     .done(function(response){
                        swal('Deleted!', response.message, response.status);
                      location.reload();
                     })
                     .fail(function(){
                        swal('Oops...', 'Something went wrong with ajax !', 'error');
                     });
                     });
                   },
                   allowOutsideClick: false
                });
                }


                //--=============termina Eliminar evento===================-->
