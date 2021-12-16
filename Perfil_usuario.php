<?php
ob_start();
?>

<?php include 'includes/header.php';?>

<script>
	$('li a.active').removeClass('active');
	$('.correo_user').addClass('active');
</script>

<script src="js/Perfil_usuario.js"></script>


<?php if(isset($_SESSION["usuario"])){
    if($_SESSION["usuario"]["Tipo_user"]==2){
        header("location:Perfil_empresa.php");
    }
    
}else{
    header("location:index.php");
    }  
?>

<section class="tm-banner">
        <!-- Flexslider -->
        <header class="masthead-perfil-Usuario page-header">

<div class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-bold " >USUARIO</h1>
            <br><br>
            <p class="font-weight-ligth lead text-uppercase" style="font-size: 30px;">Conoce los Turnos que has apartado</p>
           
        </div>
    </div>
</div>
</header>
    </section>

    <div class="">
      
    <section>
    <div class="container bootstrap snippet" style="max-width: 1468px;">
    <div class="row">
  		<div  class="col-sm-4 mt-4 mb-4 text-uppercase text-center"><h1 > <span id="Nempre"></span> </h1></div>
    	
    </div>
    <div class="row">
  		<div class="col-sm-4 col-4 col-md-4	col-lg-4	col-xl-4"><!--left col-->
              

      <div class="text-center">
        <!-- <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"> -->
       <span id="logEmp"></span>
        <!-- <div class="custom-file mt-3">
           <input type="file" class="custom-file-input file-upload" name="logo" required="">
           <label class="custom-file-label" for="validatedCustomFile">Subir logo...</label>
                </div> -->
        
      </div></hr><br>

      <ul class="list-group">
      <li class="list-group-item text-muted">INFORMACION PERSONAL <i class="fa fa-user" aria-hidden="true"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nombre/s:</strong></span> <span id="Name_user" class="text-uppercase"><?php echo $_SESSION["usuario"]["Nombre"];?></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Apellido/s:</strong></span> <span id="Apell_user" class="text-uppercase"><?php echo $_SESSION["usuario"]["Apellido"];?></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Correo:</strong></span><span id="Up_correo"> <?php echo $_SESSION["usuario"]["Correo"];?></span></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Telefono:</strong></span><span id="Up_tel"><?php echo $_SESSION["usuario"]["Telefono"];?></span></li>
            
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
               
        
          
        </div><!--/col-3-->

        <div class="col-sm-8 col-8 col-md-8	col-lg-8	col-xl-8" >

        <div class="row">
    
        <div class="col-lg-12 col-sm-12 col-12 col-md-12	col-xl-12" >
    
        <section>
    

      

    
   
          <div class="card text-white bg-info mb-3 ">
          <div class="card-header">
              <h3 class="card-title">CITAS</h3>
            </div>
            <div class="card-body" style="background-color: white;">
              
      <section class="slide_turnos">
                  
      <div class="">
  
  
  <ul class="hs" id="reservas">
   
    
  </ul>
  
  
</div>

              
      </section>  
  </div>
            
                  
                  </div>
              </div>
            </div>
            
           
                  
                 
              </div>
            </div>
            
          </div>
        </div>
        </section>

     
    

    <?php include('includes/Actualizar_informacion_usuario.php') ?>
    <?php include('includes/Cambiar_Contrasena.php') ?>
    <?php include('includes/footer.php') ?>



    <?php
ob_end_flush();
?>