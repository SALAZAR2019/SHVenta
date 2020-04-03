@extends('layout.master')
@section('titulo','Perfil') 

@section('contenido')
<!-- .container is main centered wrapper -->
<div class="container" id="usuario">
  <div class="row">
    <div class="six columns">
      <center><h2>Datos de Perfil</h2></center>
    </div>
    <div class="six columns">
      <center><h2>Bienveido {{Session::get('usuario')}}</h2></center>
    </div>
  </div>
      <div class="row" v-if="editando==true" >
        <div class="twelve columns">
        <center><h3>Editando Perfil</h3></center>
          <form>
            <div class="row">
              <div class="six columns">
                <label for="exampleEmailInput">Nombre</label>
                <input class="u-full-width" type="text" placeholder="username" id="exampleEmailInput" v-model="username">
              </div>
              <div class="six columns">
                <label for="exampleEmailInput">Password</label>
                <input class="u-full-width" type="text" placeholder="password" id="exampleEmailInpu" v-model="password">
              </div>
            </div>
          </form>
          <br>
          <br>
          <!-- <div class="container"> -->
            <div class="row">
              <div class="six columns">
                <button class="btn btn-success" v-on:click="updateUser(id_user)">GUARDAR</button>
              </div>
              <div class="six columns">
                <button class="btn btn-warning" v-on:click="editando=false">CANCELAR</button>
              </div>
          </div>
          </div>
      </div>
  <div class="row" v-if="editando==false">
    <div class="twelve columns">
      <table class="u-full-width">
        <thead>
          <tr>
            <th>id usuario</th>
            <th>usuario</th>
            <th>contraseña</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="usu in usuario">
            <td>@{{usu.id_user}}</td>
            <td>@{{usu.username}}</td>
            <td>@{{usu.password}}</td>
            <td>
              <span class="icon-pencil btn btn-xs btn-primary" v-on:click="showUser(usu.id_user)"></span>
              <span class="icon-trash btn btn-xs btn-danger" v-on:click="eliminarUser(usu.id_user)"></span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script src="js/vue-resource.js"></script>
  <script src="js/usarios.js"></script>
  <script src="js/vue.min.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">


