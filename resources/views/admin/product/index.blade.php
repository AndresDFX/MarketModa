@extends('template.admin')

@section('titulo','Administracion de productos')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<style type="text/css">

    .table1{
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        text-align: center;
    }

    .table1 td, .table th{
        padding: .75rem;
        vertical-align: center;
        border-top: 1px solid #dee2e6;
    }

</style>

        <div class="row" id="confirmar_eliminar">

        <span id="url_base" style="display:none;">{{route('admin.product.index')}}</span>
        @include('custom.modal_eliminar')

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seccion de productos</h3>

                <div class="card-tools">
                    <form>
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="nombre" class="form-control float-right" placeholder="Buscar"
                            value="{{request()->get('nombre')}}"

                            >

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">

                <table class="table1 table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Activo</th>
                      <th>Slider Principal</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>


                    <!-- Ciclo con VueJS que trae los elementos de la variable producto y los pone en una tabla -->
                    @foreach ($productos as $producto)
                        <tr>
                        <td>{{$producto->id}}</td>
                        <td>
                            @if($producto->images->count()<=0)
                                <img style="height: 70px" src= "/imagenes/avatar.png" class="round-circle">
                            @else
                                <img style="height: 70px" src= "{{$producto->images->random()->url}}" class="round-circle">
                            @endif


                        </td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->estado}}</td>
                        <td>{{$producto->activo}}</td>
                        <td>{{$producto->sliderprincipal}}</td>

                        <td><a class="btn btn-success" href="{{route('admin.product.show', $producto->slug)}}"><i class="far fa-eye"></i></a></td>
                        <td><a class="btn btn-info" href="{{route('admin.product.edit', $producto->slug)}}"><i class="far fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" href="{{route('admin.product.index')}}"
                                v-on:click.prevent="deseas_eliminar({{$producto->id}})"><i class="far fa-trash-alt"></a></td>
                        </tr>
                    @endforeach


                  </tbody>
                </table>
                {{ $productos->appends($_GET)->links()}}
              </div>

              <!-- /.card-body -->
            </div>
              <a class="m-2 float-left btn btn-primary" href="{{route('admin.product.create')}}" >Crear</a>
            <!-- /.card -->
          </div>

        </div>
@endsection
