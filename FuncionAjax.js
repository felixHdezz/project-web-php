function ejecuta(val)
{	
	var conexion;
	if(window.XMLHttpRequest){ 
   		conexion= new XMLHttpRequest ();
   
	} else{
		conexion=new ActiveXobject("Microsoft.XMLHTTP");
	}	
	conexion.onreadystatechange=function()
	{
		if(conexion.readyState==4 && conexion.status==200)
		{
			document.getElementById("CatalogoProduc").innerHTML=conexion.responseText;
		}	
	}
	conexion.open("GET","Categorias.php?variable="+val+"",true);
	conexion.send();
}