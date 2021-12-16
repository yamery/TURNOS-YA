
<!DOCTYPE html>
<html lang="es">

<head>
<?php session_start(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turnos-ya </title>

    

<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap_4.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link  rel="stylesheet"  type="text/css"  href="css/overhang.min.css"/>
    
    
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/validaciones.js"></script>

  

</head>

  


<body class="tm-gray-bg">
    <!-- Header -->
    <div class="tm-header fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-3 tm-site-name-container">
                    <a href="index.php" class="tm-site-name">Turnos-YA</a>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-8">
                    <div class="mobile-menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <nav class="tm-nav mr-0" id="menu">
                        <ul >
                            <li><a href="index.php"  class="active">Inicio</a></li>
                            <li><a href="Turnos.php" id="sanco">Turnos</a></li>
                            <li><a href="Servicios.php" id="SERV">Servicios</a></li>
                           
                      
                    <?php if(!isset($_SESSION["usuario"])){?>
                  
               
                <li class="dropdown order-1">
                    <a  data-toggle="dropdown" >Login <i class="fa fa-lock"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                       <li class="px-3 py-2">
                       <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> LOGIN</h3>
                           <form id="loginForm" action="ValidarCode.php"  method="POST" role="form">
                                <div class="form-group">
                                    <input id="email-LOGIN" name="txtCorreo" placeholder="Email" class="form-control form-control-sm" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input id="password-LOGIN" name="txtContraseña" placeholder="Password" class="form-control form-control-sm" type="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-login btn-block">INICIAR</button>
                                </div>
                                <div class="form-group text-center">
                                    <small><a href="#" style="color: black;" data-toggle="modal" data-target="#modalPassword">Olvido su contrseña?</a></small>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            
            <?php }else{ ?>
                <li class="dropdown order-1">
                    <a  data-toggle="dropdown" id="<?php echo $_SESSION["usuario"]["ID_usuario"];?>" class=" correo_user"><?php echo $_SESSION["usuario"]["Nombre"];?><span> <i class="fa fa-user" aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu  p-2" style="width: 387px">
                       <div class="card mb-0">

                       
                       <?php if($_SESSION["usuario"]["Tipo_user"]==2){?>
                     <div class="card-header">
                     <div class="card-title m-1"> <h5 class="default-text text-uppercase m-0" ><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $_SESSION["empresa"]["nombre_empresa"];?></h5></div>
                     </div>
                     <div class="card-body">
                     
                          <div class="row">
                              <div class="col-lg-3 col-md-3 col-xl-3 col-sm-3 col-3">
                              <img src="data:image/jpg;base64,<?php echo $_SESSION["empresa"]["img"];?>" 
                          class = "rounded-circle " style="max-width: 100%; height: auto;" alt = "Rounded Image" >
                              </div>
                              <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 col-9">
                                  <h6 class="text-uppercase"><?php echo $_SESSION["usuario"]["Nombre"];?> <?php echo @$_SESSION["usuario"]["Apellido"];?></h6>
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                                     <a href="Perfil_empresa.php" class="btn btn-success p-1" > Perfil</a>
                                 
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                                     <a href="cerrar-sesion.php" class="btn btn btn-danger p-0 ml-1 mt-4 mb-0 mr-0 btn-sm" >Cerrar sesion</a>
                                     </div>
                                 </div>
                                </div>
                              
                          </div>
                     </div>
                       <?php } else{ ?>

                        <div class="card-header">
                     <div class="card-title m-1"> <h5 class="default-text text-uppercase m-0" ><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION["usuario"]["Nombre"];?> </h5></div>
                     </div>
                     <div class="card-body">
                     
                          <div class="row">
                              <div class="col-lg-3 col-md-3 col-xl-3 col-sm-3 col-3">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              </div>
                              <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 col-9">
                                  <h6 class="text-uppercase"><?php echo $_SESSION["usuario"]["Nombre"];?> <?php echo @$_SESSION["usuario"]["Apellido"];?></h6>
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                                     <a href="Perfil_empresa.php" class="btn btn-success p-1" > Perfil</a>
                                 
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-xl-6 col-sm-6 col-6">
                                     <a href="cerrar-sesion.php" class="btn btn btn-danger p-0 ml-1 mt-4 mb-0 mr-0 btn-sm" >Cerrar sesion</a>
                                     </div>
                                 </div>
                                </div>
                              
                          </div>
                     </div>

                        <?php }?>

                       </div>
                    </ul>
                </li>
             
                <?php }?>

                </ul> 
                </nav>
                </div>

          
            </div>
        </div>
    </div>


    <div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-2">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>





    