$(document).ready(function(){

    PonerId();
    function auxPonerId(resp)
    {
        document.getElementById('txt_ID').value=resp[0].numero;
    }
      
    function PonerId()
    {
        var accion = 'consulta';
        $.getJSON("php/Categoria.php", {id:"", cat:"", accion:accion}, auxPonerId);
    }

    $('#btn_guardar_ca').click(function(){
		var id=$('#txt_ID').val();
		var cat=$('#txt_nombre_ca').val();
        var accion='insertar';
        var tip=$('#txtopcion').val();
        if (tip=="insertar") {
            $.ajax({
            url:"php/Categoria.php",
            type:"POST",
            data: "id=" + id + "&cat=" + cat + "&accion=" + accion,
            error:function(){
                    alert('Failed');
            }
            });
        }else{
            if (tip=="modificar") {
                var ac="modificar";
                $.ajax({
                url:"php/Categoria.php",
                type:"POST",
                data: "id=" + id + "&cat=" + cat + "&accion=" + ac,
                error:function(){
                        alert('Failed');
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
            if(confirm("¿Estas seguro de eliminar categoria?"))
            {
               var cat ="categoria";
               var acc = "eliminar";
               $.ajax({
                    url:"php/Categoria.php",
                    type:"POST",
                    data: "id=" + clave + "&cat=" + cat + "&accion=" + acc,
                    error:function(){
                    alert('Failed');
                    },
                     function(a){
                        if (a=='1') {
                             location.href="./carritodecompras.php";
                        };
                    }
               }); 
            }
        }
        else
        {
            alert('Para poder eliminar una categoria debes de seleccionar un registro');
        }
    });
    $('#btn_modificar').click(function(){
        bandera=true;
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
            $.getJSON("php/Categoria.php",{id:clave,accion:accion},modifica_categoria);
            bandera=true;
            $('#div_bloque').show();
            $('#oculto').show(300);
            $('#txt_nombre_ca').focus();
        }
        else
        {
            alert('Para poder eliminar una categoria debes de seleccionar un registro');
        }
        
    });
    function modifica_categoria(resp)
    {
        document.getElementById('txt_ID').value=resp[0].Id_Categoria;
        document.getElementById('txt_nombre_ca').value=resp[0].categoria;
        $('#txtopcion').val("modificar");
    }
      
});
