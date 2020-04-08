@extends('template.admin')

@section('titulo','Crear Categoria')

@section('contenido')
    <div id="apicategory">
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



        <form action="">

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input v-model="nombre"

                @blur="getCategory"
                @focus = "div_aparecer = false"

                class="form-control" type="text" name="nombre" id="nombre">
                <label for="slug">Slug </label>
                <input readonly v-model="generarSlug" class="form-control" type="text" name="slug" id="slug">
                <div v-if="div_aparecer" v-bind:class="div_clase_slug">

                    @{{div_mensajeslug}}

                </div>
                <br><br v-if="div_aparecer">


                <label for="descripcion">Descripcion </label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>



            </div>

        <br><br>





        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        <button  :disabled="deshabilitar_boton==1"
            type="submit" class="btn btn-primary float-right">Guardar</button>
        </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
@endsection
