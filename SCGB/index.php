<!DOCTYPE html>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
  <!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->  
  <script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>    
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!--[if lt IE 9]>
  <script src="assets/plugins/excanvas.js"></script>
  <script src="assets/plugins/respond.js"></script> 
  <![endif]-->  
   <script src="notificaciones/toastr.js" type="text/javascript"></script>
<link href="notificaciones/toastr.css" rel="stylesheet" type="text/css" />

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <title>Ingreso pagina administrativa</title>
   <link rel="shortcut icon" href="favicon.ico">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="Daniel Jara" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/style-responsive.css" rel="stylesheet" />
  <link href="assets/css/themes/default.css" rel="stylesheet" id="style_color" />
  <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="#" rel="stylesheet" id="style_metro" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->  
  <link href="assets/css/pages/login.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
  
  
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
  <!-- BEGIN LOGO -->
   <div id="logo" class="center">
    <img src="assets/img/logo.png" alt="logo" width="272" height="104" class="center" /> 
  </div> <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
 	 
	

  <form action="index2.php" method="POST">
      <p class="center">Introduzca su nombre de usuario y contraseña. </p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-user"></i></span><input name="USUARIO" type="text" id="USUARIO" placeholder="Username" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span><input name="PASSWORD" type="password" id="PASSWORD"  placeholder="Password" />
          </div>
        </div>
      </div>
      <div class="control-group remember-me">
        
      </div>
      <input name="Submit" type="submit" id="Submit"  class="btn btn-block btn-inverse" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        

  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
   <div id="login-copyright">
   
      Bureau Veritas|Cesmec S.C.G.B desarrollado por Daniel jara,Rodrigo muñoz.
     
   </div>
  
</body>

 
</html>