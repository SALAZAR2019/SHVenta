<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="route" value="{{url('/')}}">
  <meta name="token" id="token" value="{{ csrf_token() }}">

  <title>@yield('titulo')</title>

	<script type="text/JavaScript" src="js/vue.js"></script>
	<script type="text/JavaScript" src="js/vue.min.js"></script>

	<link rel="stylesheet"  href="css/normalize.css">
	<link rel="stylesheet"  href="css/skeleton.css">
	
	<link rel="stylesheet"  href="css/nav.css">
	<!-- <link rel="stylesheet"  href="css/sidebar.css"> -->
	<!-- <link rel="stylesheet"  href="css/struc.css"> -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">

<style>
	body{
		margin-top: 40px;
	}
</style>
</head>
<body>
	<header class="header">
		<div class="navBar" id="mainNavBar">
		  <a href="{{url('log')}}">Iniciar Secion</a>
		  <a href="#service">Servicios</a>
		  <a href="#about">quienes somos</a>
		  <a href="#contact">informacion de la empresa</a>
		  <a href="javascript:void(0);" class="icon" onClick="openDrawerMenu()">&#9776;</a>
		  <!--&#9776; is the code for the 3 line menu button-->
		</div>

	</header>
	<main class="main">
		@yield('contenido')
	</main>

@stack('scripts')

	<script src="js/jquery.min.js"></script>
    <script type="text/JavaScript" src="js/vue.min.js"></script>
    <script type="text/JavaScript" src="js/vue-resource.min.js"></script>
	<link src="js/nav.js">
	<script src="js/nav.js"></script>
</body>
</html>