
<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminar">¿Deseas eliminar este registro?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <form :action="URL_delete" method="post">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-primary">Si</button>

        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>


      </div>
    </div>
  </div>
</div>
