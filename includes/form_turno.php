<div class="modal fade " id="modal_turno" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
<div class="modal-content">
<div class="card">
    <div class="card-header">
        <h1>Creacion de Turno</h1>
    </div>
    <div class="card-body">
        <form id="registrar_turno"  class="register-form" method="POST" role="form" onsubmit="return false" >

        <div class="form-group">
            <label for="nombre">Nombre Turno</label>
            <input type="text" name="txtNombreturn" class="form-control" 
            id="nombre_turno" autofocus required placeholder="Ingrese nombre de la taquilla" required>
        </div>  

        <div class="form-group">
    <label for="Descrip">Descripcion</label>
    <textarea class="form-control" id="Descrip" rows="3" name="txtDescripcion" required></textarea>
  </div>

  <div class="form-group row">
  <label for="example-datetime-local-input" class="col-2 col-form-label">hora inicio</label>
  <div class="col-10">
    <input class="form-control" name="txtHoraIn" type="datetime-local" min="<?php setlocale(LC_TIME,"es_ES");
echo strftime("%Y-%m-%dT%H:%M"); ?>" id="Hora_ini" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-datetime-local-input" class="col-2 col-form-label">hora fin</label>
  <div class="col-10">
    <input class="form-control" name="txtHoraFin" type="datetime-local" min="<?php setlocale(LC_TIME,"es_ES");
echo strftime("%Y-%m-%dT%H:%M"); ?>" id="Hora_fin" required>
  </div>
</div>

    <div class="form-group">
        <input type="hidden" id="taq_busq" name="txtTaq">
    </div>

        
        <button type="submit" class="btn btn-info " id="crear_turno" > Crear</button>
        <button type="submit" class="btn btn-info" id="editar_turno" >Actualizar</button>
        </form>

        
    </div>
</div>
</div>
</div>
</div>