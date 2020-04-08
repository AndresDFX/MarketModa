@extends('template.admin')

@section('titulo','Editar categoria')

@section('contenido')
    <div id="apicategory">

    <form>
        @csrf


        <!-- Variables auxiliares para la propiedad mounted de Vueh -->
        <span style="display:none;" id="editar">{{$editar}}</span>
        <span style="display:none;" id="nombretemp">{{$cat->nombre}}</span>

     <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administracion de categoria</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">


            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input v-model="nombre" value="{{ $cat->nombre }}"

                @blur="getCategory"
                @focus = "div_aparecer = false"

                class="form-control" type="text" name="nombre" id="nombre" readonly><br>
                <label for="slug">Slug </label>
                <input readonly v-model="generarSlug" class="form-control" type="text" name="slug" id="slug" value="{{ $cat->slug }}">


                <label for="descripcion"> Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" readonly>{{ $cat->descripcion }}</textarea>



            </div>

        <br><br>





        </div>
        <!-- Botones de la parte inferior cancelar y editar-->
        <div class="card-footer">
        <a class="btn btn-danger" href="{{route('cancelar', 'admin.category.index')}}">Cancelar</a>
        <a class="btn btn-success float-right" href="{{route('admin.category.edit',$cat->slug)}}" >Editar</a>


        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </form>
</div>
@endsection
