<div class="modal fade " id="Cambiar_contra" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
<div class="modal-content" id="apartar_login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR INFORMACION <i class="fa fa-unlock-alt" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="up_pass" method="POST"   onsubmit="return false" role="form">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Contraseña Actual:</label>
      <input type="text" class="form-control" id="actu_pass" name="actu_pass" required>
    </div>
    
    <div class="col-12"></div>
   
  </div>
  <div class="form-row">
<div class="form-group col-md-6">
      <label for="inputEmail4">Nueva Contraseña</label>
      <input type="text" class="form-control" id="new_pass" name="new_pass" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Confirmar Nueva Contraseña</label>
      <input type="text" class="form-control" id="C_new_pass" required>
    </div>
</div>
  
  
<input type="hidden" id="pass_id" name="pass_id">
  
  

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal" >cerrar</button>
        <input type="submit" id="confirm_change_pass" class="btn btn-primary" value="CONFIRMAR">
      </div>
      </form>
    </div>
</div>
</div>


<script>

        let change = new Validation("Cambiar_contra");
        // Validation Functions
        
        change.registerPassword("new_pass", 6, 20, [" "], [],"C_new_pass");
        
       

</script>

