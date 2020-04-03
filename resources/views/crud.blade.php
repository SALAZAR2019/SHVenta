@extends('layout.master')
@section('titulo','gasto diario') 

@section('contenido')
<div class="container" id="dia">
  <div v-if="editando2==false"  class="row">
  	<div class=" twelve columns">
  		<h1><center>Registro de Gastos</center></h1>
  	</div>
    <div class="three columns">
        <button class="btn-primary" v-if="editando==false" v-on:click="editando=true">Agregar Gasto</button>
    </div>
  </div>
  <!-- editando -->
      <div class="row" v-if="editando==true" >
        <div class="twelve columns">
        <center><h3 v-if="editando">Agregando Gasto</h3></center>
          <form>
            <div class="row">
              <div class="three columns">
                <label >Nombre del gasto</label>
                <input class="u-full-width" type="text" placeholder="nombre del gasto"  v-model="nombre_gastos" >
              </div>
              <div class="three columns">
                <label > precio</label>
                <input class="u-full-width" type="text" placeholder="ingrese precio" v-model="precio">
              </div>
            </div>
          </form>
          <br>
          <br>
          <!-- <div class="container"> -->
            <div class="row">
              <div class="six columns">
                <button class="btn btn-success" v-if="editando==true" v-on:click="updateGasto(id_gasto)">Agregando</button>
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
            <th>No.Gasto</th>
            <th>Nombre del gasto</th>
            <th>Tipo de gasto</th>
            <th>precio</th>
            <th>fecha</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(dia,index) in diario">
            <td>@{{index+1}}</td>
            <td>@{{dia.nombre_gastos}}</td>
            <td>@{{dia.tipo_gastos}}</td>
            <td>@{{dia.precio}}</td>
            <td>@{{dia.fecha}}</td>
            <td>
              <span class="icon-pencil btn btn-xs btn-primary" v-on:click="showDia(dia.id_gasto)"></span>
              <span class="icon-trash btn btn-xs btn-danger" v-on:click="eliminarGasto(dia.id_gasto)"></span>
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
        <center><h3 >Editando Gasto</h3></center>
          <form>
            <div class="row">
              <div class="three columns">
                <label >Nombre</label>
                <input class="u-full-width" type="text" placeholder="nombre del gasto"  v-model="nombre_gastos" >
              </div>
              <div class="three columns">
                <label > precio</label>
                <input class="u-full-width" type="text" placeholder="ingrese precio" v-model="precio">
              </div>
            </div>
          </form>
          <br>
            <div class="row">
              <div class="six columns">
                <button class="btn btn-success" v-on:click="updateGasto(id_gasto)">Actualizar</button>
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
  <script src="js/dia.js"></script>
  <script src="js/vue.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">