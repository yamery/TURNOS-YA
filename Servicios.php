<?php include 'includes/header.php';?>

<script>
	$('li a.active').removeClass('active');
	$('#SERV').addClass('active');
</script>

<section class="tm-banner">
        <!-- Flexslider -->
        <header class="masthead_Servicios page-header">

<div class="container h-100">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="font-weight-bold " style="font-size: 80px; color: white;">SERVICIOS</h1>
            <p class="font-weight-ligth lead" style="font-size: 30px; color: white;"> Registra y posiciona tu empresa</p>
            
        </div>
    </div>
</div>
</header>
    </section>

    <div class="container Servicios mt-5 mb-5">
<section>
<div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="img/tours-08.jpg" preserveAspectRatio="xMidYMid slice" style="background-image: url(img/administrar_serv.jpg);background-size: cover;background-position: center;" focusable="false" role="img" > </svg>
        <h2 class="m-2">ADMINISTRAR</h2>
        <p class="text-justify">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        
      </div><!-- /.col-lg-4 -->
      <div  class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" style="background-image: url(img/seguimiento.png);background-size: cover;background-position: center;"></svg>
        <h2 class="m-2" >SEGUIMIENTO</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        
      </div><!-- /.col-lg-4 -->
      <div  class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" style="background-image: url(img/subir.jpg);background-size: cover;background-position: center;"></svg>
        <h2 class="m-2" >POSICIONAR</h2>
        <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        
      </div><!-- /.col-lg-4 -->
    </div>
</section>
</div>


    <section class="precios py-5">
  <div class="container">
  <div class="row">				
				<div class="tm-section-header">
					
					<div class="col-lg-12  text-center"><h2 class="tm-section-title " style="color: white;"> <span><i class="fa fa-money" aria-hidden="true"></i></span> PLANES DE INSCRIPCION</h2></div>
						
				</div>
			</div>
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-6">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Basica</h5>
            <h6 class="card-price text-center">$1.000<span class="periodo">/turno separado</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Crear Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Administrar Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Agenda de Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Alerta de horarios</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Posicionamiento en recomendados</li>
              <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span> Pagos online</li>
       
            </ul>
       
            <a href="#" data-toggle="modal" data-target="#modalPagos" class="btn btn-block btn-primary text-uppercase" >COMPRAR </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">PREMIUM</h5>
            <h6 class="card-price text-center">$1.500<span class="periodo">/turno separado</span></h6>
            <hr>
            <ul class="fa-ul">
            <li><span class="fa-li"><i class="fa fa-check"></i></span>Crear Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Administrar Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Agenda de Turnos</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Alerta de horarios</li>
              <li><span class="fa-li"><i class="fa fa-check"></i></span>Posicionamiento en recomendados</li>
              <li ><span class="fa-li"><i class="fa fa-check"></i></span> Pagos online</li>
            </ul>
            <a href="#" data-toggle="modal" data-target="#modalPagos" class="btn btn-block btn-primary text-uppercase" >COMPRAR </a>
          </div>
        </div>
      </div>
      </div>

</section>



<section>
    <div class="container mt-5 mb-5">
    <div class="well text-center">
           
            <a href="Perfil_empresa.php" class="btn btn-lg btn-primary">PERFIL EMPRESA</a>

        </div>
    </div>
</section>







<!-- footer include -->
    
<?php include('includes/regis_empresa.php') ?>
    <?php include('includes/modal_login-regis.php') ?>
    <?php include('includes/modal_pagos.php') ?>

    <?php include('includes/footer.php') ?>