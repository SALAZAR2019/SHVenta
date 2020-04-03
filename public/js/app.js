var usuario=document.getElementById('usuario');
var password=document.getElementById('pass');
var error=document.getElementById('error');

function enviarFormulario(){
	// console.log('ghjklñ');

	var mensajesError=[];


	if (usuario.value === null|| usuario.value==='') {
		mensajesError.push('ingrese usuario');
			alert(error.innerHTML=mensajesError.join(','));
			return false;
	}
	if (password.value ===null|| password.value==='') {
		mensajesError.push('ingrese contraseña');
			alert(error.innerHTML=mensajesError.join(','));
			return false
	}
	if (usuario.value == !null) {
		mensajesError.push('usuario llenado');
			return false;
	}
	return true;
}
// valor = document.getElementById('usuario').value;
// function validacion(){
// 		console.log('ghjklñ');
// 		var mensajesError=[];
// 	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
// 		mensajesError.push('ingrese usuario');
// 	}
// 	error.innerHTML=mensajesError.join(',');
// 	return false;
// }