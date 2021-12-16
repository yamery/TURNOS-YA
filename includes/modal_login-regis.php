<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

    <?php if(!isset($_SESSION["usuario"])){?>
      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="ini" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
              Iniciar sesion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="reg" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
              Registrarse</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <!--Body-->
            <div class="modal-body mb-1">
              <div class="card bg-light card-ini">
                <img class="card-img-top img-circle rounded-circle" src="img/user-ini.png" alt="Card image cap">


                <form id="loginForm2" action="ValidarCode.php" method="POST" role="form">

                  <div class="m-4 form-group">
                    <i class="fa fa-envelope prefix"></i>
                    <label class="col-form-label" for="email">CORREO</label>
                    <input type="text" name="txtCorreo2" class="form-control" placeholder="Email" id="emailIni" autofocus required>

                  </div>

                  <div class="m-4 form-group">
                    <i class="fa fa-lock prefix"></i>

                    <label data-error="wrong" data-success="right" class="col-form-label" for="pass">CONTRASEÑA</label>
                    <input type="password" name="txtContraseña2" class="form-control" placeholder="Password" id="pass" required>
                  </div>
                  
                  <input type="hidden" value="" class="indi_turno" name="turno" >

                  <div class="text-center m-3 form-group">
                    <button type="submit" class="btn btn-info apartar">LOGIN </button>
                  </div>

                </form>
              </div>
            </div>
            <!--Footer-->
            <div class="modal-footer" style="justify-content: start;">
              <div class="options mt-1">
                <p>No estas registrado? <a class="aLink text-info" href="#">Registrate</a></p>
                <script>
                  $(document).ready(function() {
                    $('.aLink').on('click', function(e) {
                      document.getElementById("reg").click();

                    })
                  })
                </script>
                <p>olvidaste tu <a href="#" class="text-info">contraseña ?</a></p>
              </div>

            </div>

          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade " id="panel8" role="tabpanel">

            <!--Body-->
            <div class="modal-body ">
             <form  id="regis_user" method="POST" role="form">
             <div class="row">
                <div class="col-md-12 form-group md-form form-sm mb-3">
                  <i class="fa fa-envelope prefix"></i>

                  <label data-error="wrong" data-success="right" class="col-form-label" for="email">Correo electronico</label>
                  <input type="text" name="txtCorreo" class="form-control validate" placeholder="your@email.com" id="emailReg" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>


                </div>

                
                                            

                <div class="col-md-6 form-group md-form form-sm mb-5">
                  <i class="fa fa-lock prefix"></i>
                  <label data-error="wrong" data-success="right" class="col-form-label" for="pass">Contraseña</label>
                  <div class="row">
                       <div class="col-md-10 pr-0">
                      
                       <input type="password" name="txtContraseña" class="form-control pwd " placeholder="Contraseña" id="repass" required>
                     
                        </div>
                            <div class="col-md-2 p-0">
                              <button class="btn btn-default reveal" type="button"><i class="fa fa-eye-slash"></i></button>
                                                    
                           </div>
                        </div>   
                                                    
                     </div>

                   

                <div class="col-md-6 form-group md-form form-sm mb-4">
                  <i class="fa fa-lock prefix"></i>
                  <label data-error="wrong" data-success="right" class="col-form-label" for="pass">Confirmar contraseña</label>
                  <div class="row">
                       <div class="col-md-10 pr-0">
                       <input type="password" class="form-control pwd " placeholder="Confirmar " id="repassconf" required>
                      
                     
                        </div>
                            <div class="col-md-2 p-0">
                              <button class="btn btn-default reveal" type="button"><i class="fa fa-eye-slash"></i></button>
                                                    
                           </div>
                        </div> 
                  

                </div>

                <div class="col-md-6 form-group md-form form-sm mb-4">

                  <i class="fa fa-user prefix"></i>
                  <label data-error="wrong" data-success="right" class="col-form-label" for="name" >Nombre/s</label>
                  <input type="text" name="txtNombre"class="form-control" placeholder="Nombre/s" id="name" pattern="[A-Za-z0-9 \s ]+" title="Solo letras [A-Z][a-z]" required>


                </div>

                <div class="col-md-6 form-group md-form form-sm mb-4">

                  <i class="fa fa-user prefix"></i>
                  <label data-error="wrong" data-success="right" class="col-form-label" for="Appellidos">Apellidos</label>
                  <input type="text" name="txtApellido"class="form-control validate" placeholder="Apellidos" id="Apellidos" pattern="[A-Za-z0-9\s]+" title="Solo letras [A-Z][a-z]" required>


                </div>

                <div class="col-md-6 form-group md-form form-sm mb-4">


                  <label data-error="wrong" data-success="right" class="col-form-label" for="Appellidos">Telefono</label>
                  <input type="number" name="txtTelefono" class="form-control validate" placeholder="Telefono" id="Telefono-regis-user" pattern="[0-9]+" title="Solo Numeros " required required>


                </div>
           
              </div>
              <div class="text-center form-sm mt-2">
                <input type="submit" class="btn btn-info apartar" id="regis_usertre" value="Registrarse">
              </div>

              <input type="hidden" value="" class="indi_turno" name="turno" >
             </form>
              

            </div>
            <!--Footer-->
            <div class="modal-footer">
              <div class="options text-right">
                <p class="pt-1">Ya teienes una cuenta? <a href="#" class="text-info ini">Inicia sesion</a></p>
              </div>

              <script>
                $(document).ready(function() {
                  $('.ini').on('click', function(e) {
                    document.getElementById("ini").click();

                  })
                })
              </script>


            </div>
          </div>
          <!--/.Panel 8-->
        </div>

      </div>
      <?php }else{?>
        <div class="modal-content" id="apartar_login">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONFIRMAR RESERVA <i class="fa fa-calendar-check-o" aria-hidden="true"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2 class="text-capitalize mb-3" ><?php echo $_SESSION["usuario"]["Nombre"];?> <?php echo $_SESSION["usuario"]["Apellido"];?> <span class="ID_turno_select"></span> </h2> 
        <h5 style="color: gray;">Desea apartar un turno con la siguiente informacion:</h5>
      
          <table class="table table-bordered">
  
  <tbody>
    <tr class="table-info">
      
      <td>Empresa:</td>
      <td id="apar_empre"></td>
      
    </tr>
    <tr class="table-info">     
      <td>Taquilla:</td>
      <td id="apar_taqui"></td>
      
    </tr>
    <tr class="table-info">     
      <td>Fecha inicio:</td>
      <td id="apar_horaini">Thornton</td>      
    </tr>
    <tr class="table-info">     
      <td>Fecha fin:</td>
      <td id="apar_horafin">Thornton</td>      
    </tr>
      
  </tbody>
</table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" id="con_apar" class="btn btn-primary">CONFIRMAR</button>
      </div>
    </div>
                <?php }?>
    </div>
    <!--/.Content-->
  </div>
</div>


<script>

        let formu = new Validation("regis_user");
        // Validation Functions
       
        formu.registerPassword("repass", 6, 20, [" "], [],"repassconf");
        
       

</script>

<script>
    $(".reveal").on('click', function() {
        var $pwd = $(".pwd");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>

<!--Modal: Login / Register Form-->