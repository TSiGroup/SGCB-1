<?php
include '../Conexion.php';
$cn = new Conexion();
$id_usuario = $_GET['id_usuario'];
$cn->Conectar();
$return_arr = array();
$res = $cn->Consulta("SELECT u.U_LOGIN,u.CODIGOPERMISO,u.U_PASSWORD,u.U_NOMBRE,u.U_APELLIDO,u.U_TELEFONO,u.U_EMAIL,p.PROVEEDOR,p.PRODUCTO,p.PERSONAL,p.OBRA,p.BODEGA,p.INFORMEYGRAFICO,p.ADMINISTRACION FROM USUARIO u, PERMISO p WHERE u.CODIGOPERMISO=p.CODIGOPERMISO AND u.U_LOGIN='$id_usuario'");

while ($row = $cn->getRespuesta($res)){
	$array['CODIGOPERMISO'] = $row['CODIGOPERMISO'];
    $array['LOGIN'] = $row['U_LOGIN'];
	$array['PASSWORD'] = $row['U_PASSWORD'];
	$array['NOMBRE'] = $row['U_NOMBRE'];
    $array['APELLIDO'] = $row['U_APELLIDO'];
	$array['TELEFONO'] = $row['U_TELEFONO'];
	$array['EMAIL'] = $row['U_EMAIL'];
	$array['PROVEEDOR'] = $row['PROVEEDOR'];
	$array['PRODUCTO'] = $row['PRODUCTO'];
	$array['PERSONAL'] = $row['PERSONAL'];
	$array['OBRA'] = $row['OBRA'];
	$array['BODEGA'] = $row['BODEGA'];
	$array['INFORME'] = $row['INFORMEYGRAFICO'];
	$array['ADMINISTRACION'] = $row['ADMINISTRACION'];
 
    array_push($return_arr, $array);
}

$cn->Desconectar();
echo json_encode($return_arr);
?>