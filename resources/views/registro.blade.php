
@extends('layout.masterinicio')
@section('titulo','registro') 

@section('contenido')

<div class="container" id="usuario">
	<div class="row">
		<div class="six columns">
			<div >
				<h1 align="center">registro de usuarios</h1>
			</div>
			<h1 id="error"></h1>	
				<div class="form-row">
						<div class="">
							<input type="text" placeholder="Escriba su primer nombre" class="form-control" v-model="username" id="username" >
						</div>
						<div class="">
							<input type="text" placeholder="Apellido Paterno" class="form-control" v-model="nombre">
						</div>
						<div class="">
							<input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidos">
						</div>
						<div >
							<input type="password" placeholder="ESCRIBA UNA CONTRASEÑA" class="form-control" v-model="password" id="pass" >
						</div>
				</div>
						<br>
						<br>
				<div class="form-row">
					<div class="">
						<input type="file" class="" @change="alSeleccionar"><br>
					</div>
				</div>
						
					<br>
					<br>
				<div class="row" align="center">
				@csrf
					<div class="six columns">
				<!-- <input type="submit" onclick="return enviarFormulario();" class="button"> -->
					<button type="submit" class="btn btn-success" v-on:click="guardarUser()">registrar</button>
					<a href="{{url('log')}}"><button class="btn btn-danger">cancelar</button></a>
					</div>
				</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
  <script src="js/vue-resource.js"></script>
  <script src="js/usarios.js"></script>
  <!-- <script src="js/reg.js"></script> -->
  <script src="js/vue.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">


