$(document).ready(function(){

    PonerId();
    function auxPonerId(resp)
    {
        document.getElementById('txt_ID').value=resp[0].numero;
    }
    function PonerId()
    {
        var accion = 'consulta';
        $.getJSON("php/Proveedor.php", {id:"", accion:accion}, auxPonerId);
    }
	$('#btn_guardar_Pro').click(function(){
		var id=$('#txt_ID').val();
		var em =$('#txt_nombre_ca').val();
		var dir =$('#txtdireccion').val();
		var tel =$('#txttelefono').val();
		var email =$('#txtemail').val();
		var accion="insertar";
        var tip=$('#txtopcion').val();
        if (tip=="insertar") {
            $.ajax({
    			url:"php/Proveedor.php",
                type:"POST",
                data: "id=" + id + "&emp=" + em + "&direc=" + dir + "&tel=" + tel + "&email=" + email + "&accion=" + accion
		    });
        }else{
            if (tip=="modificar") {
                var ac="modificar";
                $.ajax({
                url:"php/Proveedor.php",
                type:"POST",
                data: "id=" + id + "&emp=" + em + "&direc=" + dir + "&tel=" + tel + "&email=" + email + "&accion=" + ac
                });
            };
        }
	});
	$('#btn_eliminar').click(function(){
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
            if(confirm("¿Estas seguro de eliminar el Proveedor?"))
            {
               var accion = "eliminar";
               $.ajax({
                    url:"php/Proveedor.php",
                    type:"POST",
                    data: "id=" + clave + "&accion=" + accion
               }); 
            };
        }
        else
        {
            alert('Para poder eliminar un Proveedor debes de seleccionar un registro');
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
            $.getJSON("php/Proveedor.php",{id:clave,accion:accion},modifica_proveedor);
            bandera=true;
            $('#div_bloque').show();
            $('#oculto').show(300);
            $('#txt_nombre_ca').focus();
        }
        else
        {
            alert('Para poder modificar un Proveedor debes de seleccionar un registro');
        }
        
    });
    function modifica_proveedor(resp)
    {
        document.getElementById('txt_ID').value=resp[0].Id_Proveedor;
        document.getElementById('txt_nombre_ca').value=resp[0].NombreEmpresa;
        document.getElementById('txtdireccion').value=resp[0].Direccion;
        document.getElementById('txttelefono').value=resp[0].Telefono;
        document.getElementById('txtemail').value=resp[0].Email;
        $('#txtopcion').val("modificar");
    }
});