@extends('template.admin')

@section('titulo','Administracion de productos')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{route('admin.product.index')}}" style="text-decoration: underline; color:gray;">@yield('titulo')</a></li>
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
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
    }


</style>

        <div class="row" id="confirmar_eliminar">

        <span id="url_base" style="display:none;">{{route('admin.product.index')}}</span>
        @include('custom.modal_eliminar')

          <div class="col-12">
            <div class="card">
              <div class="card-header">


                    <form autocomplete="off">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre"
                            value="{{request()->get('nombre')}}"

                            >

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                  </form>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >


                <table class="table1 text-nowrap table-hover table-bordered">
                  <thead style="background-color:#007BFF; color:white; " >
                    <tr>
                      <th>ID</th>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                      <th>Activo</th>
                      <th>Slider Principal</th>
                      <th colspan="3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>


                    <!-- Trae los elementos de la variable producto y los pone en una tabla -->
                    @foreach ($productos as $producto)
                        <tr>
                        <td >{{$producto->id}}</td>
                        <td>
                            @if($producto->images->count()<=0)
                                <img style="height: 100px; width: 100px;" src= "/imagenes/default/no_image.png" class="rounded-circle">
                            @else
                                <img style="height: 100px; width: 100px;" src= "{{$producto->images->random()->url}}" class="rounded-circle">
                            @endif


                        </td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->estado}}</td>
                        <td>{{$producto->activo}}</td>
                        <td>{{$producto->sliderprincipal}}</td>

                        @can('haveaccess','product.show')
                        <td><a class="btn btn-success" href="{{route('admin.product.show', $producto->slug)}}"><i class="far fa-eye"></i></a></td>
                        @endcan

                        @can('haveaccess','product.edit')
                        <td><a class="btn btn-info" href="{{route('admin.product.edit', $producto->slug)}}"><i class="far fa-edit"></i></a></td>
                        @endcan

                        @can('haveaccess','product.destroy')
                        <td><a class="btn btn-danger" href="{{route('admin.product.index')}}"
                                v-on:click.prevent="deseas_eliminar({{$producto->id}})"><i class="far fa-trash-alt"></a></td>
                        </tr>
                        @endcan

                    @endforeach


                  </tbody>
                </table>
                {{ $productos->appends($_GET)->links() }}
              </div>

              <!-- /.card-body -->
            </div>
            @can('haveaccess','product.create')
              <a class="m-2 float-left btn btn-primary" href="{{route('admin.product.create')}}" >Crear</a>
            <!-- /.card -->
            @endcan
          </div>

        </div>
@endsection
