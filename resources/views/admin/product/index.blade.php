@extends('template.admin')

@section('titulo','Administracion de productos')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

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

                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripcion</th>
                      <th>Fecha creacion</th>
                      <th>Fecha modificacion</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>


                    <!-- Ciclo con VueJS que trae los elementos de la variable producto y los pone en una tabla -->
                    @foreach ($productos as $producto)
                        <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->slug}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->created_at}}</td>
                        <td>{{$producto->updated_at}}</td>

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
