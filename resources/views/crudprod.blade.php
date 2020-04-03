@extends('layout.master')
@section('titulo','productos') 

@section('contenido')
<div class="container" id="productos">
  <div v-if="editando2==false"  class="row">
  	<div class=" twelve columns">
  		<h1><center>Almacen</center></h1>
  	</div>
    <div class="three columns">
        <button class="btn-primary" v-if="editando==false" v-on:click="editando=true">Agregar producto</button>
    </div>
      <br>
          <input type="text" v-if="editando==false" placeholder="Buscar Producto" class="form-control"
          v-model="buscar">
      <br>
  </div>
  <!-- editando -->
      <div class="row" v-if="editando==true" >
        <div class="twelve columns">
        <center><h3 v-if="editando">Agregando producto</h3></center>
          <form>
            <div class="row">
              <div class="three columns">
                <label >Nombre del gasto</label>
                <input class="u-full-width" type="text" placeholder="nombre del gasto"  v-model="nombre" >
              </div>
              <div class="three columns">
                <label > precio</label>
                <input class="u-full-width" type="text" placeholder="ingrese precio" v-model="precio">
              </div>
              <div class="three columns">
                <label > cantidad</label>
                <input class="u-full-width" type="text" placeholder="ingrese cantidad" v-model="cantidad">
              </div>
            </div>
          </form>
          <br>
          <br>
          <!-- <div class="container"> -->
            <div class="row">
              <div class="six columns">
                <button class="btn btn-success" v-if="editando==true" v-on:click="agregandoProducto()">Agregando</button>
              </div>
              <div class="six columns">
                <button class="btn btn-warning" v-on:click="limpiar">CANCELAR</button>
              </div>
          </div>
          </div>
      </div>
  <!-- fin editando -->
  <!-- tabla -->
  <div class="row" v-if="editando2==false">
    <div class="eleven columns">
      <table class="u-full-width">
        <thead>
          <tr>
            <th>No.prod</th>
            <th>Nombre del producto</th>
            <th>precio</th>
            <th>cantidad</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pro,index) in filtroProductos">
            <td>@{{index+1}}</td>
            <td>@{{pro.nombre}}</td>
            <td>$@{{pro.precio}}</td>
            <td>@{{pro.cantidad}}</td>
            <td>
              <span class="icon-pencil btn btn-xs btn-primary" v-on:click="showProducto(pro.id_producto)"></span>
              <span class="icon-trash btn btn-xs btn-danger" v-on:click="eliminarProducto(pro.id_producto)"></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  <!-- fin tabla -->
  </div>
  <!-- agregando -->
      <div class="row" v-if="editando2==true" >
        <div class="twelve columns">
        <center><h3 >Editando Producto</h3></center>
          <form>
            <div class="row">
              <div class="three columns">
                <label >Nombre</label>
                <input class="u-full-width" type="text" placeholder="nombre del gasto"  v-model="nombre" >
              </div>
              <div class="three columns">
                <label > precio</label>
                <input class="u-full-width" type="text" placeholder="ingrese precio" v-model="precio">
              </div>
              <div class="three columns">
                <label > cantidad</label>
                <input class="u-full-width" type="text" placeholder="ingrese precio" v-model="cantidad">
              </div>
            </div>
          </form>
          <br>
            <div class="row">
              <div class="six columns">
                <button class="btn btn-success" v-on:click="updateProducto(id_producto)">Actualizar</button>
              </div>
              <div class="six columns">
                <button class="btn btn-warning" v-on:click="limpiar">CANCELAR</button>
              </div>
          </div>
          </div>
      </div>
  <!-- fin agregando -->
</div>
@endsection

@push('scripts')
  <script src="js/vue-resource.js"></script>
  <script src="js/productos.js"></script>
  <script src="js/vue.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">