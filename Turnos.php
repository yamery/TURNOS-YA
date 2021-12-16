<?php include('includes/header.php') ?>

<script>
	$('li a.active').removeClass('active');
	$('#sanco').addClass('active');
</script>

<link rel="stylesheet" href="css/horizontal.css">

<!-- /---------------------------------------- BANNER ----------------------/ -->

<section class="tm-banner">


	
	<header class="masthead_turnos page-header">

		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-12 text-center">
					<h1 class="font-weight-bold " >TURNOS-YA</h1>
					<p class="font-weight-ligth lead" style="font-size: 30px; color:white">ENCUENTRA UNA MULTITUD DE EMPRESAS Y TURNOS DISPONIBLES</p>

				</div>
			</div>
		</div>
	</header>
</section>




<!-- /-/--------------------------------------------------- LISTA EMPRESAS ---------------------------/-/ -->
<div id="example" class=" example pagespan">



	<h1> <span><i class="fa fa-rocket" aria-hidden="true"></i></span> EMPRESAS</h1><br>
	<hr class="featurette-divider">


	<!-- ---------------------- FORMULARIO BUSQUEDA----------------------------- -->
	<ul>
		<form id="search-box" class="col-md-6 offset-md-3 mt-5">
			<i class="fa fa-globe"></i>
			<input type="search" placeholder="Type your keyword here...">
			<span class="inline-search">
				<button id="search-btn" type="submit" value="Search"><i class="fa fa-search"></i></button>
			</span>
		</form>
	</ul>

	<br> <br>
	<button class="backward"><i><img src="img/anterior.svg" alt=""></i></button>
	<button class="forward"><i><img src="img/proximo.svg" alt=""></i></button>
	<div class="scrollbar">

		<div class="handle" style="transform: translateZ(0px) translateX(0px); width: 190px;">
			<div class="mousearea"></div>
		</div>
	</div>

	

	<div class="frame" id="emp">
		<ul style="transform: translateZ(0px) translateX(-1535px); width: 4011px;">
		</ul>
	</div>
	<ul class="pages">
		
	</ul>
</div>

<!-- /-/--------------------------------------------------- LISTA TAQUILLAS ---------------------------/-/ -->
<div id="taqui" class=" example pagespan">



	<h1> <span><i class="fa fa-rocket" aria-hidden="true"></i></span> TAQUILLAS</h1><br>
	<hr class="featurette-divider">


	

	<br> <br>
	<button class="backward"><i><img src="img/anterior.svg" alt=""></i></button>
	<button class="forward"><i><img src="img/proximo.svg" alt=""></i></button>
	<div class="scrollbar">

		<div class="handle" style="transform: translateZ(0px) translateX(0px); width: 190px;">
			<div class="mousearea"></div>
		</div>
	</div>

	

	<div class="frame" id="taq" >
		<ul id="taquis"style="transform: translateZ(0px) translateX(-1535px); width: 4011px;">
		</ul>
	</div>
	<ul class="pages">
		
	</ul>
</div>

<!--/-/ ---------------------------------------------- LISTA TURNOS ---------------------------------------- /-/ -->

<div class="pagespan container center" id="turnos">
	<div class="wrap mb-5">
	
	<div class="row">
		<div class="col-lg-6 text-center">
			<button class="prev" id="prev" style="border: none; background: none;height: 172px;"><i><img src="img/prev.png" alt=""></i></button>	
		</div>
		
		<div class="col-lg-6 text-center">
		<button class="next " id="next" style="border: none; background: none;height: 172px;"><i><img src="img/next.png" alt=""></i></button>
		</div>

	</div>
	
	
	
		<div class="frame smart" id="smart" style="overflow: hidden;">
			<ul id="tarjetas" class="items" style="transform: translateZ(0px) translateY(0px); height: 3030px;">

			</ul>
		</div>

		<ul class="pages">

		</ul>
		

	</div>

</div>



<?php include('includes/modal_login-regis.php') ?>


<script src="js/jquery-3.4.1.js"></script>
<script src="js/SLY.js"></script>
<script src="js/listado_empresa_turnos.js"></script>
<script src="js/plugins.js"></script>


<?php include('includes/footer.php') ?>