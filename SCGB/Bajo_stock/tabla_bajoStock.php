<?php
include '../Conexion.php';
$cn = new Conexion();
$cn2 = new Conexion();
$cn3 = new Conexion();
$cn->Conectar();
$cn2->Conectar();
$cn3->Conectar();
$obtiene = array();
$guarda1 = array();
$guarda2 = array();
$COMPARA="";
$res = $cn->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,s.S_CANTIDAD - s.S_CANTIDADMINIMA AS RESTA,s.S_CANTIDAD,s.S_CANTIDADMINIMA FROM PRODUCTO p,STOCK s WHERE p.CODIGOPRODUCTO=s.CODIGOPRODUCTO AND p.P_ESTADO=1 ORDER BY RESTA ASC");
while($row = $cn->getRespuesta($res)){
	
	array_push($obtiene, $row['CODIGOPRODUCTO']);
	$cantidad=$row['S_CANTIDAD']."/".$row['S_CANTIDADMINIMA'];
	array_push($guarda2, $cantidad);
	}
$i = 0;
while ($i < count($obtiene)) {
    $consulta=$obtiene[$i];
	$resta=$guarda2[$i];
	$res2 = $cn2->Consulta("SELECT P_IDENTIFICADOR FROM PRODUCTO WHERE CODIGOPRODUCTO='$consulta'");
	while($row2 = $cn2->getRespuesta($res2)){
    $IDENTIFICADOR=$row2['P_IDENTIFICADOR'];
	
	if($COMPARA!==$consulta){
    $COMPARA=$consulta;
	if($IDENTIFICADOR=="H"){
		 $res3 = $cn3->Consulta("
SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,h.H_TIPOHERRAMIENTA,h.H_FRECUENCIA,h.H_POTENCIAMAXIMA FROM PRODUCTO p,HERRAMIENTA h WHERE p.CODIGOPRODUCTO=h.CODIGOPRODUCTO AND p.CODIGOPRODUCTO='$consulta'"); 
		 while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Tipo:".$row3['H_TIPOHERRAMIENTA']." Frecuencia:".$row3['H_FRECUENCIA']." PotenciaMax:".$row3['H_POTENCIAMAXIMA']);
			   array_push($guarda1, $resta);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 } 
		}
	   else if($IDENTIFICADOR=="V"){
		     $res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,v.V_PERMISO,v.V_YEAR,v.V_CONDICION,v.V_PATENTE FROM VEHICULO v,PRODUCTO p WHERE p.CODIGOPRODUCTO=v.CODIGOPRODUCTO  AND p.CODIGOPRODUCTO='$consulta'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Condición:".$row3['V_CONDICION']." FechaPermisoCirculación:".$row3['V_PERMISO']." Año:".$row3['V_YEAR']);
			   array_push($guarda1, $resta);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 }
	       }
		else if($IDENTIFICADOR=="R"){
			$res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,r.R_TALLA,r.R_COLOR,r.R_MATERIAL FROM ROPA r,PRODUCTO p WHERE p.CODIGOPRODUCTO=r.CODIGOPRODUCTO  AND p.CODIGOPRODUCTO='$consulta'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Talla:".$row3['R_TALLA']." Color:".$row3['R_COLOR']." Material:".$row3['R_MATERIAL']);
			   array_push($guarda1, $resta);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 }
			
			}
		else if($IDENTIFICADOR=="I"){
			$res3 = $cn3->Consulta("SELECT p.CODIGOPRODUCTO,p.P_NOMBRE,p.P_MARCA,p.P_MODELO,p.P_OBSERVACION,p.P_IDENTIFICADOR,i.I_MEDIDA,i.I_TIPOMEDIDA,i.I_TIPOUNIDAD,i.I_CANTIDAD FROM INSUMO i,PRODUCTO p WHERE p.CODIGOPRODUCTO=i.CODIGOPRODUCTO  AND p.CODIGOPRODUCTO='$consulta'"); 
		      while($row3 = $cn3->getRespuesta($res3)){
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			   array_push($guarda1, $row3['P_NOMBRE']);
			   array_push($guarda1, $row3['P_MARCA']);
			   array_push($guarda1, $row3['P_MODELO']);
			   array_push($guarda1, $row3['P_OBSERVACION']);
			   array_push($guarda1, "Medida:".$row3['I_MEDIDA']." Tipo Medida:".$row3['I_TIPOMEDIDA']." Tipo Unidad:".$row3['I_TIPOUNIDAD']." Cantidad:".$row3['I_CANTIDAD']);
			   array_push($guarda1, $resta);
			   array_push($guarda1, $row3['CODIGOPRODUCTO']);
			 }
			
			}
		}
	
	
	}
	$i++; 
}
?>
<table id='tablaBajoStock' class="table table-striped table-bordered table-hover" >
    <thead>
        <tr >
            <th>Codigo Producto</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Observación</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th>C/CM</th>
            <th>Ver</th>
           
        </tr>
    </thead>
    <tbody>
          <?php $j=0; while($j < count($guarda1)){ ?>
        <tr>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
             <td>
               <div>
			      <progress id="html5" max="100" value="0"></progress>
			      <span></span>
		         </div>
            </td>
            <td><?php echo $guarda1[$j]; $j++; ?></td>
           
            <td style="width:100px;" align="center">
                <a href="bajoStock_ver.php?id=<?php echo $guarda1[$j]; $j++;?>"><img src="../Imagenes/1408264939_old-zoom-original.png" style="vertica-align: middle;" /> </a>
            </td>
            <?php } ?>
        </tr>
       
    </tbody>
</table>

<script type="text/javascript"> 
		$.getJSON("obtCantidad.php", function(data) {   
			  for (var x = 0 ; x < data.length ; x++) {
				  porcentaje=Math.round((data[x].CANTIDADMINIMA / 100) * data[x].CANTIDAD);
				  if(porcentaje >= 100 || porcentaje=="infinity" ){
					     porcentaje=0;
					  }
				  document.getElementById("html5").id='uno1'+x;
				  animateprogress("#uno1"+x,porcentaje);
               }
          })	
</script>  
