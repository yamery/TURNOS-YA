<?php
ob_start();
?>

<?php include 'includes/header.php';?>
<script>
	$('li a.active').removeClass('active');
	$('.correo_user').addClass('active');
</script>
<?php 

if(isset($_SESSION["usuario"])){
    if($_SESSION["usuario"]["Tipo_user"]==1){
      header("Location: Perfil_usuario.php");
    }
}else{
    header("Location: index.php");
}

?>

<script src="js/Perfil_empresa.js"></script>

<section class="tm-banner">
        <!-- Flexslider -->
        <header class="masthead-perfil-empresa page-header">

<div class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-bold " >EMPRESA</h1>
            <br><br>
            <p class="font-weight-ligth lead text-uppercase" style="font-size: 30px;">Administra los turnos de tu empresa</p>
           
        </div>
    </div>
</div>
</header>
    </section>

    <section>
    <div class="container bootstrap snippet" style="max-width: 1468px;">
    <div class="row">
  		<div  class="col-sm-4 mt-4 mb-4 text-uppercase text-center"><h1 > <span id="Nempre"></span> </h1></div>
    	
    </div>
    <div class="row">
  		<div class="col-sm-4"><!--left col-->
              

      <div class="text-center">
        <!-- <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"> -->
       <span id="logEmp"></span>
        <!-- <div class="custom-file mt-3">
           <input type="file" class="custom-file-input file-upload" name="logo" required="">
           <label class="custom-file-label" for="validatedCustomFile">Subir logo...</label>
                </div> -->
        
      </div></hr><br>

      <ul class="list-group">
            <li class="list-group-item text-muted">INFORMACION EMPRESA <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nombre empresa:</strong></span> <span id="Nemp" class="text-uppercase"></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Direccion:</strong></span> <span id="Direc"></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Correo:</strong></span><span id="Up_correo"> <?php echo $_SESSION["usuario"]["Correo"];?></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Telefono:</strong></span><span id="Up_tel"><?php echo $_SESSION["usuario"]["Telefono"];?></span></li>
            
            <li class="list-group-item text-muted">INFORMACION PERSONAL <i class="fa fa-user" aria-hidden="true"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nombre/s:</strong></span> <span id="Name_user" class="text-uppercase"><?php echo $_SESSION["usuario"]["Nombre"];?></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Apellido/s:</strong></span> <span id="Apell_user" class="text-uppercase"><?php echo $_SESSION["usuario"]["Apellido"];?></span></li>
            <li class="list-group-item text-right"> <button class="btn btn-primary" id="update_info">Actualizar Informacion</button></li>
          </ul> 
          <div class="card card-default m-2">
            <div class="card-header">Contraseña <i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
            <div class="card-body"><button class="btn btn-primary" id="change_pass">Cambiar contraseña</button></div>
          </div>
          <!-- <div class="card card-default m-2">
            <div class="card-header">Sitio WEB <i class="fa fa-link fa-1x"></i></div>
            <div class="card-body"><a href="index.php">Turnos-YA.com/Barberia_Jose</a></div>
          </div> -->
          <hr class="featurette-divider">
               
          <div class="card card-default m-3">
            <div class="card-header">Redes Sociales</div>
            <div class="card-body m-2">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->

        <div class="col-sm-8 " >

        <div class="row">
    
        <div class="col-lg-12" >
    
        <section>
    <div class="full-box text-center" style="padding: 30px 10px;">
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Taquillas 
                </div>
                <div class="full-box tile-icon text-center">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box"><span class="ml-4" id="Num_taq"></span></p>
                   
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Turnos
                </div>
                <div class="full-box tile-icon text-center">
                <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box"><span class="ml-4" id="Num_turn"></span></p>
                   
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Solicitudes
                </div>
                <div class="full-box tile-icon text-center">
                <i class="fa fa-bell" aria-hidden="true"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box  "><span class="ml-4" id="Num_soli"></p>
                    
                </div>
            </article>
           
        </div>

      

    </section>
   
          <div class="card text-white bg-info mb-3 ">
            <div class="card-header">
              <h3 class="card-title">INFORMACION DE TAQUILLAS</h3>
            </div>
            <div class="card-body" style="background-color: white;">
          
          <div class="row">
            <div class="col-md-12 mb-3">
            <a href="#" class="btn btn-info ml-1 " id="add_taqui" data-toggle="modal" data-target="#modal_taquilla" >
            <i class="fa fa-plus-square" aria-hidden="true"></i>
                     Agregar Taquilla
            </a>
            
            </div>
          </div>

            <div class="row">
               
              <div class="col-md-12 div_tab ">
      <table class="table table-bordered " >
        <thead class="thead-dark">
          <tr>
            <th>Nombre Taquilla</th>           
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="taqui_info">

        </tbody>
      </table>
    </div>
              </div>
            </div>
            <div class="card-header">
              <h3 class="card-title">TURNOS</h3>
            </div>
            <div class="card-body" style="background-color: white;">
          
          <div class="row">
          <div class="col-md-6 ">
            <div class="mb-3">
       
                <select class="form-control" name="txtTaq" id="list_taquis">
               
           
                
                
                </select>
                 </div>
            </div>
            
            
            <div class="col-md-6 " id="agregar_turno">
           
            
            </div>
          
          </div>

            <div class="row">
               
              <div class="col-md-12 div_tab ">
      <table class="table table-bordered " >
        <thead class="thead-dark">
          <tr>
            <th>Nombre Turno</th>           
            <th>Descripcion</th>
            <th>Hora Inicio</th>           
            <th>Hora Fin</th>
            <th>Disponibilidad</th>           
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="turn_info">

        </tbody>
      </table>
    </div>
              </div>
            </div>
             <div class="card-header">
              <h3 class="card-title">PAGOS</h3>
            </div>
            <div class="card-body" style="background-color: white;">
              <div class="row">
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Fecha inicial pago:</td>
                        <td> 27/06/2020</td>
                      </tr>
                      <tr>
                        <td>NFecha límite de pago:</td>
                        <td>27/07/2020</td>
                      </tr>
                      <tr>
                        <td>Valor por a pagar:</td>
                        <td>$120.000</td>
                      </tr>
                     
                    </tbody>
                  </table>
                  <a href="#" class="btn btn-primary">Pagar</a>
                  
                  </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>

        </div>
</div>
</div>
    </section>

<!--  ------------------------------------------- MODALES -------------------------- -->
<?php include('includes/Cambiar_Contrasena.php') ?>
    <?php include('includes/Actualizar_informacion.php') ?>
    <?php include('includes/form_taquilla.php') ?>
    <?php include('includes/form_turno.php') ?>
    <?php include('includes/confirm_delete_taqui.php') ?>
    <?php include('includes/confirm_delete_turno.php') ?>
<?php include('includes/footer.php') ?>

<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});

// $(document).ready(function() {
//     var panels = $('.user-infos');
//     var panelsButton = $('.dropdown-user');
//     panels.hide();

//     //Click dropdown
//     panelsButton.click(function() {
//         //get data-for attribute
//         var dataFor = $(this).attr('data-for');
//         var idFor = $(dataFor);

//         //current button
//         var currentButton = $(this);
//         idFor.slideToggle(400, function() {
//             //Completed slidetoggle
//             if(idFor.is(':visible'))
//             {
//                 currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
//             }
//             else
//             {
//                 currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
//             }
//         })
//     });


    
// });
</script>


<?php
ob_end_flush();
?>