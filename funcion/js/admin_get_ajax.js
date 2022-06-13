function consultQ(id){

  $.ajax({

      url : 'funcion/f_get_survey.php',

      data : {
         id : id
      },

      type : 'POST',

      dataType : 'json',

      success : function(data) {
        $("#id_s").val(id);
       $("#tos").val(data.data.tos);
        $("#resp").val(data.data.resp);
        $("#fie").val(data.data.fie);
        $("#sint").val(data.data.sint);
        $("#cont").val(data.data.cont);
         $("#seg").val(data.data.seg);
        firm = data.data.firm;
        $('#smoothed').signaturePad({displayOnly:true}).regenerate(firm);
      },

      error : function(xhr, status) {
      },

      complete : function(xhr, status) {
      }
  });
}

function consultU(id){
  $.ajax({

      url : 'funcion/f_get_col.php',

      data : {
         id : id
      },

      type : 'POST',

      dataType : 'json',

      success : function(data) {

        $("#id").val(id);
        $("#area").val(data.data.area);
        $("#dpto").val(data.data.dpto);
        $("#stat").val(data.data.stat);
        $("#nom").val(data.data.nom);
        $("#ape").val(data.data.ape);


      },

      error : function(xhr, status) {
      },

      complete : function(xhr, status) {
      }
  });
}
function consultE(id){
  $.ajax({

      url : 'funcion/f_get_event.php',

      data : {
         id : id
      },
      type : 'POST',
      dataType : 'json',
      success : function(data) {
        $("#id").val(id);
        $("#nom").val(data.data.nom);
        $("#pues").val(data.data.pues);
        $("#dia").val(data.data.dia);
        $("#tipo").val(data.data.tipo);
        $("#srcfoto").val(data.data.image);
        $("#imgfoto").attr("src", data.data.image);
      },
      error : function(xhr, status) {
      },
      complete : function(xhr, status) {
      }
  });
}
function consultNoti(id){
  $.ajax({

      url : 'funcion/f_get_noti.php',

      data : {
         id : id
      },

      type : 'POST',

      dataType : 'json',

      success : function(data) {

        $("#id").val(id);
        $("#tit").val(data.data.tit);
        $("#text").val(data.data.text);
        $("#tipo").val(data.data.tipo);
        $("#srcimg").val(data.data.image);
        $("#image").attr("src", data.data.image);
      },

      error : function(xhr, status) {
      },

      complete : function(xhr, status) {
      }
  });
}
