var	route= document.querySelector("[name=route]").value;
var urlUsuario = route + '/apiusu';
var urlus= urlUsuario +'/';

new Vue({
	el:'#usuario',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		usuario:[],
		hola:'jaja',
		id_user:'',
		id_rol:1,
		username:'',
		password:'',
		nombre:'',
		apellidos:'',
		editando:false,
		// buscar:''

	},

	created:function(){
		this.getUsuario();
	},

	methods:{
		getUsuario:function(){
			this.$http.get(urlUsuario)
			.then(function(json){
				this.usuario=json.data;
			});
		},
		showUser:function(id){
			this.$http.get(urlUsuario+'/'+id)
			.then(function(json){
				this.id_user=json.data.id_user;
				this.username=json.data.username;
				this.password=json.data.password;
				this.editando=true;
			})	
		},
		alSeleccionar(event){
			this.foto=event.target.files[0];
			// console.log(this.foto);
			this.preview=URL.createObjectURL(this.foto)
		},
		guardarUser:function(){

	// console.log('este si pasa');
	var usuario=document.getElementById('username');
	var password=document.getElementById('pass');
	var error=document.getElementById('error');
	
	var mensajesError=[];


	if (usuario.value === null|| usuario.value==='') {
		mensajesError.push('ingrese usuario');
			error.innerHTML=mensajesError.join(',');
			return false;
	}
	if (password.value ===null|| password.value==='') {
		mensajesError.push('ingrese contraseña');
			error.innerHTML=mensajesError.join(',');
			return false
	}
	if (usuario.value == !null) {
		mensajesError.push('usuario llenado');
			return false;
	}
	else

			var data = new FormData();
			data.append('id_user', this.id_user);
			data.append('username',this.username);
			data.append('password',this.password);
			data.append('id_rol',this.id_rol);
			data.append('nombre',this.nombre);
			data.append('apellidos',this.apellidos);
			data.append('foto',this.foto);

			var config={
				header:{'Content-Type':'image/jpg'}
			}

			this.$http.post(urlUsuario,data,config)
			.then(function(json){
				
			})
			.catch(function(json){
				console.log(json);
                
			})
			alert('USUARIO AGREGADO');
			return true;

		},

		eliminarUser:function(id){
			var resp=confirm("se eliminara el usuario")
			if (resp==true) {
				this.$http.delete(urlus+id)
				.then(function(json){
					this.getUsuario();
				})
			}
		},
		updateUser:function(id){
			// crear un json 
			var med={id_user:this.id_user,
					  username:this.username,
					  password:this.password,
						tipo:this.tipo,}
		    console.log();

			this.$http.patch(urlus+id,med)
			.then(function(json){
				this.getUsuario();
				// this.limpiar();
			})
		},
		// limpiar:function(){
		// 	this.clave_medicamento='';
		// 	this.nombre='';
		// 	this.fecha_caducidad='';
		// 	this.tipo='';	
		// 	this.editando=false;
		// },

	},
	// computed:{
	
	// 	filtroMedicamento:function(){
	// 		return this.medicamentos.filter((medi)=>{
	// 			return medi.nombre.match(this.buscar.trim()) ||
	// 			medi.tipo.toLowerCase().match(this.buscar.trim().toLowerCase());

	// 		});
	// 	}	
	// }

});