
$(document).ready(function(){

	var i = 0;
	main();
	function main(){
		var control = setInterval(cambiarSlider, 3000);
	}
	function cambiarSlider(){
		i++;
		if(i == $("#slider img").size()){
			i = 0;
		}
		$("#slider img").hide();
		$("#slider img").eq(i).fadeIn("medium");
	}
	$('#btn_nuevo').click(function(e)
	{
		$('#oculto').show(300);
		$('#div_bloque').show();
	});	
	$('#btn_salir').click(function(e){
		$('#div_bloque').hide();
		$('#oculto').hide(300);
	});
});

	
	