@extends('template.admin')

@section('titulo','Administracion de Categorias')

@section('breadcrumb')

    <li class="breadcrumb-item active"><a href="{{route('admin.category.index')}}" style="text-decoration: underline; color:gray;">@yield('titulo')</a></li>

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

        <span id="url_base" style="display:none;">{{route('admin.category.index')}}</span>
        @include('custom.modal_eliminar')

          <div class="col-12">
            <div class="card">
              <div class="card-header">


                    <form autocomplete="off" >
                        <div class="input-group input-group-sm" style="width: 200px; ">
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
              <div class="card-body table-responsive p-0">

                <table class="table1 text-nowrap table-hover table-bordered">
                  <thead style="background-color:#007BFF; color:white; " >
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripcion</th>
                      <th>Fecha creacion</th>
                      <th>Fecha modificacion</th>
                      <th colspan="3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>


                    <!-- Ciclo con VueJS que trae los elementos de la variable categoria y los pone en una tabla -->
                    @foreach ($categorias as $categoria)
                        <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->slug}}</td>
                        <td>{{$categoria->descripcion}}</td>
                        <td>{{$categoria->created_at}}</td>
                        <td>{{$categoria->updated_at}}</td>

                        @can('haveaccess','category.show')
                        <td><a class="btn btn-success" href="{{route('admin.category.show', $categoria->slug)}}"><i class="far fa-eye"></i></a></td>
                        @endcan

                        @can('haveaccess','category.edit')
                        <td><a class="btn btn-info" href="{{route('admin.category.edit', $categoria->slug)}}"><i class="far fa-edit"></i></a></td>
                        @endcan

                        @can('haveaccess','category.destroy')
                        <td><a class="btn btn-danger" href="{{route('admin.category.index')}}"
                                v-on:click.prevent="deseas_eliminar({{$categoria->id}})"><i class="far fa-trash-alt"></a></td>
                        @endcan

                        </tr>

                    @endforeach


                  </tbody>
                </table>
                {{ $categorias->appends($_GET)->links()}}
              </div>

              <!-- /.card-body -->
            </div>
            @can('haveaccess','category.create')
              <a class="m-2 float-left btn btn-primary" href="{{route('admin.category.create')}}" >Crear</a>
            <!-- /.card -->
            @endcan
          </div>

        </div>
@endsection
