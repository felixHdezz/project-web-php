$(document).ready(function(){
	$('#btn_guardar_ca').click(function(){
		var id=$('#txt_ID').val();
		var cat=$('#txt_nombre_ca').val();
		alert("Funciona");
		$.ajax({
            url:"Categoria.php",
            type:"POST",
            data: "id=" + id + "&cat=" + cat,
            error:function(){
                alert('Failed');
            },
                success:function(msg){
                alert('Success hola: ' + msg);
                }
          }); 
	});
});
