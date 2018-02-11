$(document).ready(function(){
	alert();
	$('#int_cantidad').numeric();
	$('#txt_tel').numeric();

	$('#btn_agregar').click(function(){
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
	});
});