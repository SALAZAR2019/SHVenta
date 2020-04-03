var	route= document.querySelector("[name=route]").value;
var urlprod = route + '/apipro';
var urlpro= urlprod +'/';

new Vue({
	el:'#productos',
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		productos:[],
		prueba:'hola',
		id_producto:'',
		nombre:'',
		precio:'',
		cantidad:'',
		buscar:'',
		editando2:false,
		editando:false,
	},
	created:function(){
		this.getProductos();
	},
	methods:{
		getProductos:function(){
			this.$http.get(urlprod)
			.then(function(json){
				this.productos=json.data;
			});
		},
		showProducto:function(id){
			this.editando2=true;
			this.$http.get(urlpro+id)
			.then(function(json){
				this.id_producto=json.data.id_producto;
				this.nombre=json.data.nombre;
				this.precio=json.data.precio;
				this.cantidad=json.data.cantidad;
			});
		},
		updateProducto:function(id){
			// crear un json 
			var pro={id_producto:this.id_producto,
					  nombre:this.nombre,
					  precio:this.precio,
					  cantidad:this.cantidad,}
		    console.log();

			this.$http.patch(urlpro+id,pro)
			.then(function(json){
				this.getProductos();
				this.limpiar();
			})
		},
		agregandoProducto:function()
		{

			// construir un objeto que necesitamos por el api
			var producto={id_producto:this.id_producto,
				nombre:this.nombre,
				cantidad:this.cantidad,
				precio:this.precio,
				calificacion:this.calificacion}
				// limpiar campos
				this.id_producto='';
				this.nombre='';
				this.precio='';
				this.cantidad='';
				// para un metodo store se necesita un post
				this.$http.post(urlprod,producto)
				.then(function(json){
					this.getProductos();
					// window.location.href = "editar"
				});

		},
		eliminarProducto:function(id){
			var resp=confirm("se eliminara el producto")
			if (resp==true) {
				this.$http.delete(urlpro+id)
				.then(function(json){
					this.getProductos();
				})
			}
		},
		limpiar:function(){
			this.id_producto='';
			this.nombre='';
			this.precio='';
			this.cantidad='';
			this.editando2=false;
			this.editando=false;
		},
	},
	computed:{
		filtroProductos:function(){
			return this.productos.filter((producto)=>{
				return producto.nombre.match(this.buscar.trim()) ||
				producto.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());

			});
		}	
	}

})