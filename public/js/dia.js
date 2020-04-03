var	route= document.querySelector("[name=route]").value;
var urlDia = route + '/apidia';
var urlus= urlDia +'/';

new Vue({
	el:'#dia',
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		diario:[],
		prueba:'hola',
		id_gasto:'',
		nombre_gastos:'',
		fecha:'',
		precio:'',
		editando2:false,
		editando:false,
	},
	created:function(){
		this.getDia();
	},
	methods:{
		getDia:function(){
			this.$http.get(urlDia)
			.then(function(json){
				this.diario=json.data;
			});
		},
		showDia:function(id){
			this.editando2=true;
			this.$http.get(urlus+id)
			.then(function(json){
				this.id_gasto=json.data.id_gasto;
				this.nombre_gastos=json.data.nombre_gastos;
				this.precio=json.data.precio;
			});
		},
		updateGasto:function(id){
			// crear un json 
			var dia={id_gasto:this.id_gasto,
					  nombre_gastos:this.nombre_gastos,
					  precio:this.precio,}
		    console.log();

			this.$http.patch(urlus+id,dia)
			.then(function(json){
				this.getDia();
				this.limpiar();
			})
		},
		limpiar:function(){
			this.id_gasto='';
			this.nombre_gastos='';
			this.fecha='';
			this.precio='';
			this.editando2=false;
			this.editando=false;
		},
	}

})