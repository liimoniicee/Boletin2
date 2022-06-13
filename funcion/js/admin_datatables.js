
//======================== Tablas de administrador ======================
var table = $('#example').DataTable({
  ajax: {
  url: 'funcion/admin_filltables.php',
  type: 'post',
  data: { "callFunc": "1"},
 },
 columns: [  //or different depending on the structure of the object
             {"data" : "id"},
             {"data" : "nombre"},
             {"data" : "apellido"},
             {"data" : "dpto"},
             {
               targets: -1,
               data: null,
               defaultContent: "<button class='btn btn-primary'><i class='lni lni-eye'></i></button>"
              }
         ],

          });
          $('#example tbody').on( 'click', 'button', function () {
           var data = table.row( $(this).parents('tr') ).data();
          // alert( data[0] +"'s salary is: "+ data[ 3 ] );
          consultQ(data['id']);
          verquest(data['nombre']);

});

// ============================ TABLA 1 ==================================
$('#EncueXPerso').DataTable({
  dom: 'lBfrtip',
    buttons: [
        'copy',
         'excel', 'pdf', 'print'
    ],
    ajax: {
    url: 'funcion/admin_filltables.php',
    type: 'post',
    data: { "f_encuexperson": "1"},
   },
   columns: [  //or different depending on the structure of the object
               {"data" : "id"},
               {"data" : "nombre"},
               {"data" : "estat"},
               {"data" : "dpto"},
               {"data" : "total"}
           ]

});


// ============================ TABLA 2 ==================================
var table1 = $('#ActivSinto').DataTable({
dom: 'lBfrtip',
buttons: [
  'copy',
   'excel', 'pdf', 'print'
],
ajax: {
url: 'funcion/admin_filltables.php',
type: 'post',
data: { "f_activsinto": "1"},
},
columns: [  //or different depending on the structure of the object
           {"data" : "id"},
           {"data" : "nombre"},
           {"data" : "area"},
           {"data" : "sinto"},
           {"data" : "coment"},
           {"data" : "fecha"},

           {
             targets: -1,
             data: null,
             defaultContent: "<button class='btn btn-warning'><i class='lni lni-pencil-alt'></i> </button>"
            }
       ],

});
$('#ActivSinto tbody').on( 'click', 'button', function () {
var data = table1.row( $(this).parents('tr') ).data();
consultQ(data['id']);
verquest(data['nombre']);
} );


// ============================ TABLA 3 ==================================
var table2 = $('#colaboradores').DataTable({
  dom: 'lBfrtip',
       buttons: [
           {
               text: 'Nuevo',
               action: function () {
                   addcol();
               }
           }
       ],
       ajax: {
  url: 'funcion/admin_filltables.php',
  type: 'post',
  data: { "f_colaboradores": "1"},
  },
  columns: [  //or different depending on the structure of the object
             {"data" : "id"},
             {"data" : "nombre"},
             {"data" : "dpto"},
             {"data" : "area"},
             {"data" : "estat"},


             {
               targets: -1,
               data: null,
               defaultContent: "<button class='btn btn-warning'><i class='lni lni-pencil-alt'></i> </button>"
              }
         ],


});
$('#colaboradores tbody').on( 'click', 'button', function () {
var data = table2.row( $(this).parents('tr') ).data();
consultU(data['id']);
vercol(data['nombre']);
} );




//======================== Tablas de Survey ======================

// ============================ TABLA 1 Encuestas realizadas ==================================
var table3 = $('#EncueReal').DataTable({
dom: 'lBfrtip',
buttons: [
  'copy',
   'excel', 'pdf', 'print'
],
ajax: {
url: 'funcion/admin_filltables.php',
type: 'post',
data: { "f_encuereal": "1"},
},
columns: [  //or different depending on the structure of the object
           {"data" : "id"},
           {"data" : "nombre"},
           {"data" : "dpto"},
           {"data" : "area"},
           {"data" : "sinto"},
           {"data" : "fecha"},

           {
             targets: -1,
             data: null,
             defaultContent: "<button class='btn btn-primary'><i class='lni lni-eye'></i> </button>"
            }
       ],

});
$('#EncueReal tbody').on( 'click', 'button', function () {
var data = table3.row( $(this).parents('tr') ).data();
consultQ(data['id']);
verquest(data['nombre']);
} );

// ============================ TABLA 2 FALTAN DE ENCUESTA ==================================
$('#FaltaEncue').DataTable({
  dom: 'lBfrtip',
    buttons: [
        'copy',
         'excel', 'pdf', 'print'
    ],
    ajax: {
    url: 'funcion/admin_filltables.php',
    type: 'post',
    data: { "f_faltaencue": "1"},
   },
   columns: [  //or different depending on the structure of the object
               {"data" : "id"},
               {"data" : "nombre"},
               {"data" : "dpto"},
               {"data" : "area"}
           ]

});


//======================== Tablas de boletin ======================

// ============================ TABLA 1 BOLETIN ==================================
var table4 = $('#Boletin').DataTable({
  dom: 'lBfrtip',
       buttons: [
           {
               text: 'Nuevo',
               action: function () {
                   addnoti();
               }
           }
       ],
ajax: {
url: 'funcion/admin_filltables.php',
type: 'post',
data: { "f_boletin": "1"},
},
columns: [  //or different depending on the structure of the object
           {"data" : "id"},
           {"data" : "titulo"},
           {"data" : "texto"},
           {"data" : "tipo"},
           {
             targets: -1,
             data: null,
             defaultContent: "<button class='btn btn-warning seebol'><i class='lni lni-pencil-alt'></i> </button> "+
                              "<button class='btn btn-danger delbol'><i class='lni lni-trash-can'></i> </button>"


            }
       ],

});
$('#Boletin tbody').on( 'click', 'button.seebol', function () {
var data = table4.row( $(this).parents('tr') ).data();
consultNoti(data['id']);
verinfonoti();
} );
$('#Boletin tbody').on( 'click', 'button.delbol', function () {
var data = table4.row( $(this).parents('tr') ).data();
delnoti(data['id']);

} );


// ============================ TABLA 2 EVENTOS ==================================
var table5 = $('#Eventos').DataTable({
  dom: 'lBfrtip',
       buttons: [
           {
               text: 'Nuevo',
               action: function () {
                   addInfo();
               }
           }
       ],
ajax: {
url: 'funcion/admin_filltables.php',
type: 'post',
data: { "f_eventos": "1"},
},
columns: [  //or different depending on the structure of the object
           {"data" : "id"},
           {"data" : "nombre"},
           {"data" : "puesto"},
           {"data" : "dia"},
           {"data" : "tipo"},
           {"data" : "img"},

           {
             targets: -1,
             data: null,
             defaultContent: "<button  class='btn btn-warning seevent'><i class='lni lni-pencil-alt'></i> </button> "+
                              "<button ' class='btn btn-danger delevent'><i class='lni lni-trash-can'></i> </button>"
            }
       ],

});
$('#Eventos tbody').on( 'click', 'button.seevent', function () {
var data = table5.row( $(this).parents('tr') ).data();
consultE(data['id']);
verinfo(data['nombre']);
} );
$('#Eventos tbody').on( 'click', 'button.delevent', function () {
var data = table5.row( $(this).parents('tr') ).data();
delevent(data['id']);
} );

// ============================ TABLA 3 MENSAJES ==================================
var table6 = $('#Mensajes').DataTable({

ajax: {
url: 'funcion/admin_filltables.php',
type: 'post',
data: { "f_mensajes": "1"},
},
columns: [  //or different depending on the structure of the object
           {"data" : "id"},
           {"data" : "nombre"},
           {"data" : "comen"},
           {"data" : "desti"},


           {
             targets: -1,
             data: null,
             defaultContent: "<button class='btn btn-danger'>Eliminar</button>"
            }
       ],

});
$('#Mensajes tbody').on( 'click', 'button', function () {
var data = table6.row( $(this).parents('tr') ).data();
delmsg(data['id']);
} );
