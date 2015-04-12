                    <div id="prueba">                               
                                  <!-- Inico de la TAB-->    
                       <div class="widget widget-tabs">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i>Productos</h4>
                           <span class="tools">
                           </span>                    
                        </div>
                        <div class="widget-body">
                           <div class="tabbable portlet-tabs">
                              <ul class="nav nav-tabs">
                                 <li><a href="#portlet_tab2" data-toggle="tab">Vehiculo</a></li>
                                 <li class="active"><a href="#portlet_tab1" data-toggle="tab">Herramientas</a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="portlet_tab1">
                                       <div id="tbHerramienta" class="table table-striped table-bordered table-hover"></div>  <!--tabla herramientas--> 
                                 </div>
                               <div class="tab-pane" id="portlet_tab2">
                                      <div id="tbVehiculo" class="table table-striped table-bordered table-hover"></div> <!--tabla ropa-->    
                               </div>
                             </div>
                          </div>
                         </div>
                         </div>
                      <!--Fin de la TAB--> 
                       </div>              
 <script>
      jQuery(document).ready(function() {       
         $("#tbHerramienta").load("tbHerramienta_ip.php");
		 $("#tbVehiculo").load("tbVehiculo_ip.php");
      });
 </script>