
function fnc_controla(){
	document.getElementById("btn_Entrar")onclick.=validarCampos();
}
function validarCampos(){
	var user=document.getElementById("txt_user");
	var pasw=document.getElementById("txtps_password");
	if (user.value=="") {
		alert("Debe de introducir su usuario");
		user.focus();
	}else{
		if(pasw.value=="")	{
			alert("Debe de introducir su contraseña");
			pasw.focus();
		}
	}
}