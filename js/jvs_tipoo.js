// JavaScript Document

function fnc_sololetras() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
 {
  	event.returnValue = false;
	alert('Solo se aceptan letras');
 }
}

function fnc_solonumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57))
 { 
  	event.returnValue = false;
	alert('Solo se aceptan números');
 }
}