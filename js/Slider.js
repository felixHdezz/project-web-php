$(document).ready(function(){

	$('#a_Ingresar').click(function(e)
	{
		$('#oculto').show(300);
		$('#div_bloque').show();
	});	
	$('#btn_salir').click(function(e){
		$('#div_bloque').hide();
		$('#oculto').hide(300);
	});

	$('#link').click(function(e){
		$('#oculto').show(300);
		$('#div_bloque').show();
	});

	$('#con').click(function(){
		var valor=$('#cmb_elige').val();
		alert(valor);
	});
	
	$('#vaciarcarrito').click(function(){
		$.ajax({
            url:"php/VaciarCarrito.php",
            error:function(){
                alert('Failed');
            }
          }); 
	});
	$("#formulario").submit(function(evento){
		//alert("se omitio el evento");
		$.ajax({
			url: "php/Ventas.php",
			function(e){
				alert("");
				}
			}).fail(function (){
			evento.preventDefault();	
		});
	});
	$("#formulario").click(function(evento){
		//alert("se omitio el evento");
		$.ajax('./php/Ventas.php',function(e){
			alert("");
		}).fail(function (){
			evento.preventDefault();	
		});
	});
	$('#int_cantidad').numeric();
	$('#txt_tel').numeric();

	$('#btn_agregar').click(function(e){
		var cmbCategoria = document.getElementById('cmb_elige');
		var categoria = cmbCategoria.options[cmbCategoria.selectedIndex].value;
		var caja = $('#int_exicaja').val();
		var total= $('#int_totalexis').val();
		var canti =$('#int_cantidad').val();
		if(categoria == 1){
			if(parseInt(canti) > parseInt(caja)){}
				alert("La cantidad "+canti +" es mayor a la exsistencia");
				document.getElementById('int_cantidad').focus();
				return false;
			}
		}else{
			if(parseInt(canti) > parseInt(total)){
				alert("La cantidad "+canti +" es mayor a la exsistencia");
				document.getElementById('int_cantidad').focus();
				return false;
			}
		}
	});s
});

	
	