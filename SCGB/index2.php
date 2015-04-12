<?php
@session_start(); 
 include ("include/conectar.php");
 if(isset($_POST['Submit'])){
		$USUARIO=$_POST['USUARIO'];
	$PASSWORD=$_POST['PASSWORD'];
		//Crear la conexion
		conectar();
       $sql="select CODIGOPERMISO,count(*) cant from usuario where U_LOGIN='$USUARIO' AND  U_PASSWORD = '$PASSWORD'";
	    $row=mysql_fetch_array(mysql_query($sql,$conexion));
		if($row["cant"]>0){
			$permiso=$row["CODIGOPERMISO"];
	$_SESSION["PERMISO"]=$permiso;
			$_SESSION["USUARIO"]=$USUARIO;
			header("location:inicio.php");
		}	
				else {
				}
	 }
  ?>