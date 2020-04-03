@extends('layout.master')
@section('titulo','gasto diario') 

@section('contenido')
<div id="ventas">
	@{{nombre}}
	<div class="container">
		<h3>FOLIO : @{{folio}}</h3>
		<h3>FECHA VENTA : @{{fecha_venta}}</h3>
		<div class="row">
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" name="" class="form-control" v-model="codigo" ref="buscar" v-on:keyup.enter="getProducto()">
					<span class="input-group-btn">
						<button type="button" class="btn btn-success" @click="getProducto()">Agregar</button>
					</span>

					
				</div>
				<br>
				<button class="btn btn-info btn-block" @click="vender()">Guardar venta</button>
				
			</div>
			
		</div><hr>
		<div class="row">
			<div class="col-xs-6">
				<table class="table table-bordered">
					<thead style="background: #ffffcc">
						<th>SKU</th>
						<th>NOMBRE</th>
						<th width="15%">PRECIO</th>
						<th width="15%">CANTIDAD</th>
						<th width="15%">TOTAL</th>
						<th width="20%">ACCIONES</th>

					</thead>
					<tbody>
						<tr v-for="(v,index) in ventas">
							<td>@{{v.id_producto}}</td>
							<td>@{{v.nombre}}</td>
							<td>@{{v.precio}}</td>
							<td><input type="number" class="form-control" min="1" v-model.number="cantidades[index]"></td>
							<td><b>$ @{{totalProd(index)}}</b></td>
							<td>

								<!-- boton para aumentar -->
								<span class="icon-pencil-circled btn btn-bg" @click="addProd(index)"></span>

								<!-- boton para disminuir -->
								<span class="icon-pencil" @click="minusProd(index)"></span>
								<!-- boton para eliminar -->
								<span class="icon-trash btn btn-bg"@click="eliminarProducto(index)"></span>
							</td>
						</tr>
					</tbody>
					
				</table>
				@{{cantidades}}
			</div>

			<!--  -->
			<div class="col-xs-12 col-xs-6">
			<table class="table table-bordered">
				<tr>
					<th width="25%" style="background: #ffffcc">Total</th>
					<td><h1> $@{{total}} </h1></td>
				</tr>
				<tr>
					<th width="25%" style="background: #ffffcc">Paga con: </th>
					<td><input type="number" name="" class="form-control" v-model="pago"></td>
				</tr>
				<tr>
					<th width="25%" style="background: #ffffcc">Cambio de: </th>
					<td><h1 style="color: blue">@{{cambio}}</h1></td>
				</tr>
			</table>

		</div>
		
		</div>
		<!--  -->

		
	</div>
	
</div>
@endsection
@push('scripts')
  <script src="js/vue-resource.js"></script>
  <script src="js/ventas.js"></script>
  <script src="js/vue.min.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">