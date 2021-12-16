<div class="modal fade " id="modal_Update_info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
<div class="modal-content" id="apartar_login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR INFORMACION <i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form_update" method="POST"   onsubmit="return false" role="form">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre/s</label>
      <input type="text" class="form-control" id="Form_upnamme" name="Form_upnamme" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Apellidos</label>
      <input type="text" class="form-control" id="Form_upnapellido" name="Form_upnapellido" required>
    </div>
   
  </div>
  <div class="form-group">
    <label for="inputAddress">Nombre de la empresa</label> 
    <input type="text" class="form-control" id="Form_upnameempre" name="Form_upnameempre" required>
  </div>
<div class="form-row">
<div class="form-group col-md-6">
      <label for="inputEmail4">Direccion</label>
      <input type="text" class="form-control" id="Form_updirect" name="Form_updirect" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Telefono</label>
      <input type="number" class="form-control" id="Form_uptel" name="Form_uptel" required>
    </div>
</div>
  
  
<input type="hidden" id="up_id" name="up_id">
  
  

      </div>
      <div class="modal-footer">
        <button type="button" id="cancelar_delete_turn" class="btn btn-secondary" data-dismiss="modal" >cerrar</button>
        <button type="submit" id="confirm_upinfo" class="btn btn-primary">CONFIRMAR</button>
      </div>
      </form>
    </div>
</div>
</div>