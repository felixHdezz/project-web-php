$(document).ready(function(){

	cargaCombos();
    PonerId();
    $('#txt_preciocaja').numeric();
    $('#txt_preciounitario').numeric();
    $('#txt_cantidadcaja').numeric();
    $('#txt_cantProxCaja').numeric();
    $('#txt_decuen').numeric();
    function auxPonerId(resp)
    {
        document.getElementById('txt_ID').value=resp[0].numero;
    }
      
    function PonerId()
    {
        var accion = 'consulta';
        $.getJSON("php/Product.php", {id:"", accion:accion}, auxPonerId);
    }
	function cargaCombos(){
		fnc_CargarComboCategoria();
		fnc_CargarComboProveedor();
	}

	function fnc_CargarComboCategoria()
	{
		var accion ="seleccionado";
		$.getJSON('php/Product.php',{accion:accion},fnc_CargaCategoria)
	}
	function fnc_CargaCategoria(resp)
	{
		var cmbMarcas= document.getElementById('cmb_categoria');
		for(var i=0; i<resp.length; i++)
		{
			cmbMarcas.options[i]= new Option (resp[i].categoria, resp[i].Id_Categoria);
		}
	}
	
	function fnc_CargarComboProveedor()
	{
		var accion ="comboProvee";
		$.getJSON('php/Product.php', {accion:accion}, fnc_CargaProveedor)
	}
	function fnc_CargaProveedor(resp)
	{
		var cmbMarcas= document.getElementById('cmb_proveedor');
		for(var i=0; i<resp.length; i++)
		{
			cmbMarcas.options[i]= new Option (resp[i].NombreEmpresa, resp[i].Id_Proveedor);
		}
	}

	$('#btn_salir').click(function(e){
		$('#div_bloque').hide();
		$('#oculto').hide(300);
	});

    $('#btn_guardar_ca').click(function(){
        var imgn = $('#filename').val();
        var id= $('#txt_ID').val();
        var produc= $('#txt_nombre').val();
        var descrip= $('#txt_descripcion').val();
        var precaja= $('#txt_preciocaja').val();
        var preunita= $('#txt_preciounitario').val();
        var cantcaja= $('#txt_cantidadcaja').val();
        var cantProduCaja= $('#txt_cantProxCaja').val();
        var descu = $('#txt_decuen').val();
        var cmbCategoria = document.getElementById('cmb_categoria');
        var categoria = cmbCategoria.options[cmbCategoria.selectedIndex].value;
        var cmbProveedor = document.getElementById('cmb_proveedor');
        var Proveedor = cmbProveedor.options[cmbProveedor.selectedIndex].value;
        if (id=="" || produc=="" || descrip=="") {
            alert("LLena todo los datos");
            document.getElementById('txt_nombre').focus();
            return false;
        };
    });
	$('#btn_guardar_ca').click(function(){
		var imgn = $('#filename').val();
		var id= $('#txt_ID').val();
		var produc= $('#txt_nombre').val();
		var descrip= $('#txt_descripcion').val();
		var precaja= $('#txt_preciocaja').val();
		var preunita= $('#txt_preciounitario').val();
		var cantcaja= $('#txt_cantidadcaja').val();
		var cantProduCaja= $('#txt_cantProxCaja').val();
        var descu = $('#txt_decuen').val();
		var cmbCategoria = document.getElementById('cmb_categoria');
		var categoria = cmbCategoria.options[cmbCategoria.selectedIndex].value;
		var cmbProveedor = document.getElementById('cmb_proveedor');
		var Proveedor = cmbProveedor.options[cmbProveedor.selectedIndex].value;
		var exisuni = 0;
		var existetotal= parseInt(cantcaja)*parseInt(cantProduCaja);
		var accion = "insertar";
		var tip=$('#txtopcion').val();
            if (tip=="insertar") {
                $.ajax({
                    url: "php/Product.php",
                    type: "POST",
                    data : "id=" + id + "&nom=" + produc + "&img=" + imgn + "&des="+ descrip + "&preca=" + precaja + "&preuni=" + preunita +"&exica=" + cantcaja + "&exiuni=" + exisuni + "&extotal=" +existetotal + "&cant=" + cantProduCaja + "&desc=" + descu + "&cat=" + categoria + "&prov=" + Proveedor + "&accion=" + accion,
                    error:function(){
                        alert("Error al guarda el registro");
                        }
                    });
                alert("Su registro se guardado satisfactoriamente");
            }else{
            if (tip=="modificar") {
                var ac="modificar";
                $.ajax({
                url:"php/Product.php",
                type:"POST",
                data: "id=" + id + "&nom=" + produc + "&img=" + imgn + "&des="+ descrip + "&preca=" + precaja + "&preuni=" + preunita +"&exica=" + cantcaja + "&exiuni=" + exisuni + "&extotal=" +existetotal + "&cant=" + cantProduCaja + "&desc=" + descu + "&cat=" + categoria + "&prov=" + Proveedor + "&accion=" +ac,
                error:function(){
                    alert("Error al guarda el registro");
                    }
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
            var acc ="eliminar";
            if(confirm("¿Estas seguro de eliminar el registro?"))
            {
               alert();
               $.ajax({
                    url: "php/Product.php",
                    dataType:"JSON",
                    type:"POST",
                    data: "id=" + clave +"&accion=" + acc,
                    function (data){
                        alert();
                    }
               });
            }
        }
        else
        {
            alert('Para poder eliminar un Producto debes de seleccionar un registro');
        }
	});
    function verifica(resp){
        alert("Funciona");
        if(resp.length > 0 || resp == 1 ){
            alert("Funciona");
        }
    }
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
            var accion ="selecciona";
            $.getJSON("php/Product.php",{id:clave,accion:accion},modifica_Producto);
            bandera=true;
            $('#div_bloque').show();
            $('#oculto').show(300);
        }
        else
        {
            alert('Para poder modificar un Producto debes de seleccionar un registro');
        }
        
    });
    function modifica_Producto(resp)
    {
    	var cmbCategoria = document.getElementById('cmb_categoria');
    	var cmbProve= document.getElementById('cmb_proveedor');
        document.getElementById('txt_ID').value=resp[0].Id_Producto;
        document.getElementById('txt_nombre').value=resp[0].Producto;
        document.getElementById('txt_descripcion').value=resp[0].Descripcion;
        document.getElementById('txt_preciocaja').value=resp[0].PrecioxPresentacion;
        document.getElementById('txt_preciounitario').value=resp[0].PrecioUnitario;
        document.getElementById('txt_cantidadcaja').value=resp[0].ExistenciaPresentacion;
        document.getElementById('txt_cantProxCaja').value=resp[0].Cantidad;
         $('#txtopcion').val("modificar");
        document.getElementById('txt_decuen').value=resp[0].Descuento;
        cmbCategoria.value=resp[0].Id_categoria;
		cmbCategoria.selected='defaultSelected';
		cmbProve.value=resp[0].Id_Proveedor;
		cmbProve.selected="defaultSelected";
        document.getElementById('filename').value=resp[0].Imagen;
        document.getElementById('txtopcion').value="modificar";
       
    }
});