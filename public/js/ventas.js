// var urlProd = 'http://localhost/DemoSari/public/apiProducto';
// var urlVenta= 'http://localhost/DemoSari/public/apiVenta';

var	route= document.querySelector("[name=route]").value;
var urlProd = route + '/apiProducto';
var urlVenta= route +'/apiVenta';

function init()
{
new Vue({

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#ventas',

	created:function(){
		this.foliarVenta();
	},

	data:{
		nombre:'QUE ONDA',
		producto:[],
		ventas:[],
		codigo:'',
		id_vendedor:'',
		pago:0,
		tot:0,
		
		cantidades:[1,1,1,1,1,1,1],
		folio:'',
		fecha_venta:moment().format('YYYY-MM-DD') //almacena cantidades.
	},

	// area de metodos
	methods:{
		getProducto:function(){
			this.$http.get(urlProd + '/' + this.codigo)
			.then(function(json){
				console.log(json);
				// this.codigo='';
				var venta={'id_producto':json.data.id_producto,
							'nombre':json.data.nombre,
							'precio':json.data.precio,
							'cantidades':1,
							'total':json.data.precio,
							}
				if (venta.id_producto) {
					this.ventas.push(venta);
				}
				this.codigo='';
				this.$refs.buscar.focus();

			})
		},
		// fin de getProducto

		eliminarProducto:function(id){
			this.ventas.splice(id,1);
		}, 

		addProd:function(id){
			this.ventas[id].cantidades++;
			this.ventas[id].total=this.ventas[id].cantidades*this.ventas[id].precio;
		},

		minusProd:function(id){
			if (this.ventas[id].cantidades>=2) {
				this.ventas[id].cantidades--;
			}
			
		},

		foliarVenta:function(){
			this.folio='VTA-' + moment().format('YYMMDDhmmss');

		},

		vender:function(){
			var detalles2 = [];

			for (var i = 0; i < this.ventas.length; i++) {
				detalles2.push({
					id_producto:this.ventas[i].id_producto,
					precio:this.ventas[i].precio,
					cantidad:this.cantidades[i],
					total:this.ventas[i].precio * this.cantidades[i]
				})
			}
			console.log(detalles2);
			var unaVenta = {
				folio:this.folio,
				id_vendedor:this.id_vendedor,
				tipo:'EF',
				fecha_venta:this.fecha_venta,
				total:this.tot,
				detalles:detalles2
			}
			console.log(unaVenta);
			this.$http.post(urlVenta,unaVenta)
			.then(function(json){
				console.log(json.data);
			}).catch(function(json){
				console.log(json.data);
			});
			return true;


		}
		
	},
	// fin de metodos
	computed:{
		total:function(){
			var suma=0;
			for (var i =0;i<this.ventas.length;i++){
				suma=suma + (this.cantidades[i]*this.ventas[i].precio);
			}
			this.tot=suma;
			return suma;
		},

		cambio:function(){
			return this.pago - this.tot;
		},
		totalProd(){
			return (id)=>{
				var total=0;
				if(this.cantidades[id] != null)
					total=this.cantidades[id]*this.ventas[id].precio;
				return total.toFixed(1);
			}
		}
	}

});
}
window.onload=init;