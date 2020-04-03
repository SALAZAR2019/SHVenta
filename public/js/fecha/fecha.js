function init()
{
new Vue({

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},


	el:'#fechas',
	data:{
		la:'hola',
		fecha:moment().format('YYYY-MM-DD')
	}
})
}
window.onload=init;