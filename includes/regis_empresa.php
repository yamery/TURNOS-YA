<div class="modal fade bd-example-modal-lg" id="modalRegis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <!--Content-->

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                        <h3>BIENVENIDO</h3>
                        <p>Estas a unos pocos pasos de ser parte de la familia Turnos-YA</p>
                        <button class="btn btn-info my-2 my-sm-0" type="button" data-dismiss="modal" data-toggle="modal" data-target="#modalLRForm" aria-label="Close"> Iniciar sesion </button>

                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registro de empresa </h3>

                                <form id="RegisEmp"  class="register-form "  method="POST" enctype="multipart/form-data" >
                                    <div class="row ">
                                        <div class="col-md-6 mr-0">
                                            <div class="form-group">
                                                <input type="text" name="txtNombreR" id="txtNombreR" class="form-control" placeholder="Nombre/s" pattern="[A-Za-z \s ]+" title="Solo letras [A-Z][a-z]" required   />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="txtApellidoR" class="form-control" placeholder="Apellido/s*" pattern="[A-Za-z \s ]+" title="Solo letras [A-Z][a-z]" required />
                                            </div>
                                            <div class="form-group">
                                            
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                        <input type="password" name="txtContraseñaR" id="txtContraseñaR" class="form-control Prevel" placeholder="contraseña" required>
                                                        </div>

                                                        <div class="col-md-2 p-0">
                                                        
                                                        <button class="btn btn-default revelar" type="button"><i class="fa fa-eye-slash"></i></button>
                                                    
                                                        </div>
                                                    </div>   
                                            </div>
                                         
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="txtCorreoR" id="txtCorreoR" class="form-control" placeholder="email@example.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="number"  maxlength="10" name="txtTelefonoR" class="form-control" placeholder="Telefono *" pattern="[0-9]+" title="Solo Numeros " required />
                                            </div>

                                            <div class="form-group">
                                            <div class="row">
                                                        <div class="col-md-10">
                                                        <input type="password" id="confirm_pass" class="form-control Prevel" placeholder="Confirmar contraseña *" required>
                                                        
                                                        </div>

                                                        <div class="col-md-2 p-0">
                                                        
                                                        <button class="btn btn-default revelar" type="button"><i class="fa fa-eye-slash"></i></button>
                                                    
                                                        </div>
                                                    </div>   
                                                    
                                            </div>

                                            

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <input type="text" name="txtNEmp" class="form-control" placeholder="Nombre empresa" pattern="[A-Za-z0-9 \s ]+" title="Solo letras y numeros [A-Z][a-z][0-9]" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                               
                                        <div class="form-group">

                                            

                                                <div class="custom-file">
                                                   <input type="file" class="custom-file-input" id="validatedCustomFile" name="logo" required>
                                                   <label class="custom-file-label" for="validatedCustomFile">Subir logo...</label>

                                                </div>

                                                

                                        </div>
                                        <div class="form-group">
                                                <input type="text"  name="Direc_emp" class="form-control" placeholder="Direccion"required/>
                                            </div>

                                            <small id="texto"></small>
                                        </div>
                                        <div class="col-md-6">

                                        <div class="form-group">
                                        <img id="blah" src="https://via.placeholder.com/50" alt="Tu imagen" width="50px" height="50px" />
                                        </div>
                                        
                                        <div class="form-group">
                                                <select class="form-control" name="txtTipEmp">
                                                    <option class="hidden" selected disabled>Tipo de empresa</option>
                                                    <option>Belleza</option>
                                                    <option>Servicio tecnico</option>
                                                    <option>Tecnologia</option>
                                                    <option>Salud</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Otro *" value="" />
                                            </div>
                                            
                                            <input type="submit" class="btnRegister" id="regis" value="registrar"> 
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--/.Content-->

    </div>



</div>


<script>

        let form = new Validation("RegisEmp");
        // Validation Functions
       
        form.registerPassword("txtContraseñaR", 6, 20, [" "], [],"confirm_pass");
        
       

</script>

<script>
    $(".revelar").on('click', function() {
        var $pwd = $(".Prevel");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
</script>

<!--Modal: Login / Register Form-->