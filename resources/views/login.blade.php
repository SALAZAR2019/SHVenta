@extends('layout.masterinicio')
@section('titulo','registro') 

@section('contenido')
<body>
<div class="container">
	<div class="row">
		<div class="twelve columns">
			<h1>Bienvenido</h1>
			<form action="{{url('login')}}" method="POST">
				@csrf
				<input type="text" placeholder="Usuario" class="form-control" name="usuario" id="usuario">
				<br>
				<input type="password" placeholder="Contraseña" class="form-control" name="pass" id="pass">
				<br>
				<input type="submit" onclick="return enviarFormulario();" class="button">
				<a href="{{url('reg')}}" class="button">Registrarse</a>
			</form>
			<h1 id="error"></h1>
		</div>
	</div>
@endsection

@push('scripts')
  <script src="js/vue-resource.js"></script>
  <script src="js/usarios.js"></script>
  <script src="js/app.js"></script>
  <script src="js/vue.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">