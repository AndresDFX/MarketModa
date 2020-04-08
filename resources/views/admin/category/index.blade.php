@extends('template.admin')

@section('titulo','Administracion de Categorias')

@section('contenido')


        <div class="row" id="confirmar_eliminar">

        <span id="url_base" style="display:none;">{{route('admin.category.index')}}</span>
        @include('custom.modal_eliminar')

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Seccion de categorias</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
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


                    <!-- Ciclo con VueJS que trae los elementos de la variable categoria y los pone en una tabla -->
                    @foreach ($categorias as $categoria)
                        <tr>
                        <td>{{$categoria->id}}</td>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->slug}}</td>
                        <td>{{$categoria->descripcion}}</td>
                        <td>{{$categoria->created_at}}</td>
                        <td>{{$categoria->updated_at}}</td>

                        <td><a class="btn btn-success" href="{{route('admin.category.show', $categoria->slug)}}"><i class="far fa-eye"></i></a></td>
                        <td><a class="btn btn-info" href="{{route('admin.category.edit', $categoria->slug)}}"><i class="far fa-edit"></i></a></td>
                        <td><a class="btn btn-danger" href="{{route('admin.category.index')}}"
                                v-on:click.prevent="deseas_eliminar({{$categoria->id}})"><i class="far fa-trash-alt"></a></td>
                        </tr>
                    @endforeach


                  </tbody>
                </table>
                {{ $categorias->links()}}
              </div>

              <!-- /.card-body -->
            </div>
              <a class="m-2 float-left btn btn-primary" href="{{route('admin.category.create')}}" >Crear</a>
            <!-- /.card -->
          </div>

        </div>
@endsection
