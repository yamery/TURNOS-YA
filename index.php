<?php include('includes/header.php') ?>
<!-- Banner -->
<section class="tm-banner">
        <!-- Flexslider -->
        <header class="masthead page-header">

<div class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-bold " >TURNOS-YA</h1>
            <p class="font-weight-ligth lead text-uppercase" style="font-size: 30px;">Separa tus citas desde casa</p>
            <a class="btn btn-outline-primary my-2 my-sm-0" href="Turnos.php"> BUSCAR TURNOS</a>
        </div>
    </div>
</div>
</header>
    </section>

 


    <!-- gray bg -->
    <section class="container tm-home-section-1" id="more">
        <div class="row">
           
        <div class="col-lg-4 col-md-4 col-sm-6 contenedor">
               
                <div class="tarjeta">
                    <div class="front img-fluid"><img src="img/organi-empresa.jpg"  alt="">
                    <div class="centrado " ><h2>¿NO CONOCEN TUS SERVICIOS?</h2></div> 
                </div>
                      
                    <div class="back">
                        <div class="details">
                            
                            <?php if(!isset($_SESSION["usuario"])){?>
                                <h1>REGISTRA TU EMPRESA<br></h1>
                                <a href="#" data-toggle="modal" data-target="#modalRegis" class="btn btn-outline-dark my-2 my-sm-0" >RESGISTRAR </a>
<?php }else{ ?>
    <h1>MIRA TU PERFIL<br></h1>
    <a href="Perfil_usuario.php" class="btn btn-outline-dark my-2 my-sm-0">Ver Perfil</a>
                <?php }?>
                           
                            <div class="social-icons">
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            
            <div class="col-lg-4 col-md-4 col-sm-6 contenedor">
               
               <div class="tarjeta tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
                   <div class="front img-fluid"><img src="img/buscar_turnos.jpg"  alt="">
                   <div class="centrado " ><h2>¿NO CONOCE LOS HORARIOS?</h2></div> 
               </div>
                     
                   <div class="back">
                       <div class="details">
                           <h1>RESERVE TURNOS CON ANTICIPACION<br></h1>
                            <br>
                           <a class="btn btn-outline-dark my-2 my-sm-0" href="Turnos.php"> BUSCAR TURNOS</a>
                           
                       </div>
                   </div>
               </div>
               
           </div>
           <div class="col-lg-4 col-md-4 col-sm-6 contenedor">
               
               <div class="tarjeta ">
                   <div class="front img-fluid"><img src="img/calendar.jpg"  alt="">
                   <div class="centrado " ><h2>¿TIENE CITAS PENDIENTES?</h2></div> 
               </div>
                     
                   <div class="back">
                       <div class="details">
                           <h1>ADMINISTRE SUS TURNOS<br></h1>
                           <?php if(!isset($_SESSION["usuario"])){?>
<a href="#" class="btn btn-outline-dark my-2 my-sm-0 " data-toggle="modal" data-target="#modalLRForm" >INICIAR SESION</a>
<?php }else{ ?>
    <a href="Perfil_usuario.php" class="btn btn-outline-dark my-2 my-sm-0">Ver Perfil</a>
                <?php }?>
                       </div>
                   </div>
               </div>
               
           </div>
        </div>

        <div class="container marketing">

       


<!-- START THE FEATURETTES -->

<div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					
					<div class="col-lg-12  text-center "><h2 class="tm-section-title mb-0"><span><i class="fa fa-odnoklassniki" aria-hidden="true"></i></span> ¿QUIENES SOMOS? </h2></div>
						
				</div>
            </div>
            

<hr class="featurette-divider mt-0">

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading">Comodidad y seguridad <span class="text-muted">en la administracion de turnos de su empresa.</span></h2>
    <br><p class="lead">Si deseas prestar tus servicios de una forma fácil y segura, haz encontrado el sitio ideal, aquí puedes registrar tu empresa para que todas las personas la conozcan y puedan agendar un turno desde la comodidad de su casa. Tú podrás crear los turnos disponibles y ver todo acerca de ellos de forma muy fácil y segura. Que esperas! Registra tu empresa ya.</p>
  </div>
  <div class="col-md-5">
    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 500px; height: 500px; border-radius:4%;" src="img/administrar.jpg" data-holder-rendered="true">
  </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-7 order-md-2">
    <h2 class="featurette-heading">¿Eres una persona con poco tiempo? <span class="text-muted">Estás cansado de hacer larga filas para separar una cita?</span></h2>
    <br><p class="lead"> Este es el sitio ideal, te brindamos el mejor servicio, donde puedes ver todos los servicios que te pueden ofrecer las distintas empresas registradas y tendrás la oportunidad de poderte registrar y agendar una cita en los diversos turnos disponibles que te ofrecen, así que no lo pienses más y únete!!</p>
  </div>
  <div class="col-md-5 order-md-1">
    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="img/comomdidad.jpg" data-holder-rendered="true" style="border-radius:4%;width: 500px; height: 500px;">
  </div>
</div>





<!-- /END THE FEATURETTES -->

</div>





    <section>
    <div class="container">
    <div class="section-margin-top">
			<div class="row">				
				<div class="tm-section-header">
					
					<div class="col-lg-12  text-center "><h2 class="tm-section-title mb-0"><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span> BENEFICIOS</h2></div>
						
				</div>
            </div>
            <hr class="featurette-divider mt-0">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
					<div class="tm-tours-box-1">
						<img src="img/pagos.jpeg" alt="image"  class="img-fluid">
					
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
                            Realiza los pagos de forma segura
                            </div>

                         
							<a href="Turnos.php" class="tm-tours-box-1-link-right">
								Busca turnos							
							</a>							
						</div>
					</div>					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
					<div class="tm-tours-box-1">
                    <img src="img/administra.jpeg" alt="image"  class="img-fluid">
					
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
								Administra tu agenda laboral
							</div>
                            <a href="#" data-toggle="modal" data-target="#modalRegis" class="tm-tours-box-1-link-right m-0" >
								Registrar empresa								
							</a>							
						</div>
					</div>					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
					<div class="tm-tours-box-1">
                    <img src="img/lugar.jpeg" alt="image"  class="img-fluid">
						
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
                            Registrate desde cualquier lugar
                            </div>
                            <a href="#" class="tm-tours-box-1-link-right" data-toggle="modal" data-target="#modalLRForm" >
							
								Inicia sesion								
							</a>							
						</div>
					</div>					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
					<div class="tm-tours-box-1">
                    <img src="img/servicio.jpeg" alt="image"  class="img-fluid">					
						<div class="tm-tours-box-1-link">
							<div class="tm-tours-box-1-link-left">
                            Disfruta de los mejores servicios
							</div>
							<a href="Turnos.php" class="tm-tours-box-1-link-right">
							Nuestras empresas							
							</a>							
						</div>
					</div>					
				</div>
			</div>		
		</div>
    </div>
    </section>

    </section>
       
    


  <!-- footeer includes -->
 

    <?php include('includes/regis_empresa.php') ?>
    <?php include('includes/modal_login-regis.php') ?>

    <?php include('includes/footer.php') ?>