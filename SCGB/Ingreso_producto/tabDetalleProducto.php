<!--<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />-->
 <link href="../assets/css/style.css" rel="stylesheet" />
 
                    <div id="tabDetalleProducto">                               
                                  <!-- Inico de la TAB-->    
                  <div class="widget widget-tabs">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Detalle Producto</h4>
                        <div class="actions">
                           <a href="#" class="btn btn-primary"><i class="icon-plus"></i> Imprimir</a>
                        </div>
                     </div>
                     <div class="widget-body">
                          <div id="tbDetalleProducto" class="table table-striped table-hover"></div> 
                     </div>
                  </div>             
                      <!--Fin de la TAB--> 
                </div>               
                    
 <script>
      jQuery(document).ready(function() {       
         $("#tbDetalleProducto").load("tbDetalleProducto.php");
      });
 </script>