$(document).ready(function(){

    $('#txt_tel').numeric();
    PonerId();
    function auxPonerId(resp)
    {
        document.getElementById('txt_ID').value=resp[0].numero;
    }
      
    function PonerId()
    {
        var accion = 'consulta';
        $.getJSON("php/Clientes.php", {id:"", accion:accion}, auxPonerId);
    }
	$('#btn_guardar_ca').click(function(){
		var id = $('#txt_ID').val();
		var rfc = $('#txt_rfc').val();
		var nombre = $('#txt_nombre').val();
		var ap = $('#txt_ap').val();
		var am = $('#txt_am').val();
		var direc = $('#txt_direc').val();
		var tel = $('#txt_tel').val();
		var email = $('#txt_email').val();
		var user = $('#txt_user').val();
		var pass = $('#txt_pass').val();
		var tipe = $('#txt_tipo').val();
        var tip= $('#txtopcion').val();
        var accion ="insertar";
             if (tip=="insertar") {
                $.ajax({
                    url: "php/Clientes.php",
                    type: "POST",
                    data: "id=" + id +"&rfc=" + rfc +"&nom="+ nombre +"&ap="+ ap +"&am="+ am +"&direc="+ direc +"&tel="+ tel +"&email="+ email +"&user="+ user +"&pass="+ pass +"&tipo=" + tipe +"&accion="+ accion,
                    error:function(){
                        alert("Error al guarda el registro");
                    }
                });
            }else{
                if (tip=="modificar") {
                    var ac="modificar";
                    $.ajax({
                    url:"php/Clientes.php",
                    type:"POST",
                    data: "id=" + id +"&rfc=" + rfc +"&nom="+ nombre +"&ap="+ ap +"&am="+ am +"&direc="+ direc +"&tel="+ tel +"&email="+ email +"&user="+ user +"&pass="+ pass + "&accion=" + ac
                    });
                };
            }
	});
	$('#btn_eliminar').click(function(e){
		 var elementos = document.getElementsByName('rbd_cat');
        var clave;
        var seleccionado = false;
        
        for(i=0; i< elementos.length; i++)
        {
            if(elementos[i].checked == true)
            {
                clave = elementos[i].value;
                seleccionado = true;
            }
        } 
        if (seleccionado == true)
        {
            if(confirm("¿Estas seguro de eliminar el registro?"))
            {

               var acc = "eliminar";
               $.ajax({
                    url:"php/Clientes.php",
                    type:"POST",
                    data: "id=" + clave +"&accion=" + acc,
                    error:function(){
                    alert('Failed');
                    }
               }); 
            }
        }
        else
        {
            alert('Para poder eliminar una cliente debes de seleccionar un registro');
        }
	});
    $('#btn_modificar').click(function(){
        var elementos = document.getElementsByName('rbd_cat');
        var clave;
        var seleccionado = false;
        for(i=0; i< elementos.length; i++)
        {
            if(elementos[i].checked == true)
            {
                clave = elementos[i].value;
                seleccionado = true;
            }
        } 
        if (seleccionado == true)
        {
            var accion ="seleccionado";
            $.getJSON("php/Clientes.php",{id:clave,accion:accion},modifica_cliente);
            bandera=true;
            $('#div_bloque').show();
            $('#oculto').show(300);
            $('#txt_nombre_ca').focus();
        }
        else
        {
            alert('Para poder modificar un cliente debes de seleccionar un registro');
        }
        
    });
    function modifica_cliente(resp)
    {
        document.getElementById('txt_ID').value=resp[0].Id_Cliente;
        document.getElementById('txt_rfc').value=resp[0].rfc;
        document.getElementById('txt_nombre').value=resp[0].Nombre;
        document.getElementById('txt_ap').value=resp[0].ApellidoP;
        document.getElementById('txt_am').value=resp[0].ApellidoM;
        document.getElementById('txt_direc').value=resp[0].Direccion;
        document.getElementById('txt_tel').value=resp[0].Telefono;
        document.getElementById('txt_email').value=resp[0].Email;
        document.getElementById('txt_user').value=resp[0].Usuario;
        document.getElementById('txt_pass').value=resp[0].Contrasena;
        $('#txtopcion').val("modificar");
    }
});