<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">Nautilus <small>Soluciones</small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Inicio', 'url'=>array('/site/index')),
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         array('label'=>'Maestros <span class="caret"></span>', 
                             'url'=>'#',
                             'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),
                             'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                          'items'=>array(
                            array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
							array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
                                 )
                             ),
                        
                        
                        array('label'=>' Catálogos <span class="caret"></span>', 
                            'url'=>'#',
                            'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),
                             'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                                  'items'=>array(

                                        array('label'=>'Layout', 'url'=>yii::app()->baseUrl.'/site/maestros'),

                                        array('label'=>' Corporativos <span class="caret"></span>',
                                            'url'=>'#',
                                            'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),
                                            'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                                             'items'=>array(
                                                array('label'=>'Sociedades', 'url'=>yii::app()->baseUrl.'/sociedades/admin'),
                                                array('label'=>'Centros', 'url'=>yii::app()->baseUrl.'/centros/admin'),
                                                array('label'=>'Areas', 'url'=>yii::app()->baseUrl.'/areas/admin'),
                                                array('label'=>'Acreedores', 'url'=>yii::app()->baseUrl.'/clipro/admin'),

                                            ),

                                        ),

                                        array('label'=>'Logistica', 'url'=>'#',

                                            'items'=>array(

                                                array('label'=>' Almacen', 'url'=>'#',

                                                    'items'=>array(

                                                        array('label'=>'Almacenes', 'url'=>yii::app()->baseUrl.'/almacenes/admin'),

                                                        array('label'=>'Transacciones', 'url'=>yii::app()->baseUrl.'/almacenmovimientos/admin'),

                                                        array('label'=>'Canales de despacho', 'url'=>yii::app()->baseUrl.'/canales/admin'),

                                                        array('label'=>'Acreedores', 'url'=>yii::app()->baseUrl.'/clipro/admin'),

                                                        array('label'=>'Objetos externos', 'url'=>yii::app()->baseUrl.'/objetoscliente/admin'),

                                                             ),

                                                ),

                                                 array('label'=>' Transporte', 'url'=>'#',

                                                     'items'=>array(

                                                         array('label'=>'Vehiculos', 'url'=>yii::app()->baseUrl.'/embarcaciones/admin'),

                                                         array('label'=>'Ptos Transporte', 'url'=>yii::app()->baseUrl.'/direcciones/admin'),

                                                         array('label'=>'Lugares', 'url'=>yii::app()->baseUrl.'/lugares/admin'),

                                                         array('label'=>'Tipos mov', 'url'=>yii::app()->baseUrl.'/paraqueva/admin'),

                                                         array('label'=>'Motivos traslado', 'url'=>yii::app()->baseUrl.'/Cmotivo/admin'),

                                                     ),



                                                     ),



                                            ),

                                        ),

                                        array('label'=>'Analisis y costeo', 'url'=>'#',

                                            'items'=>array(



                                                array('label'=>'Colectores', 'url'=>'#',

                                                    'items'=>array(

                                                        array('label'=>'Grupos', 'url'=>yii::app()->baseUrl.'/grupocc/admin'),

                                                        array('label'=>'Colectores', 'url'=>yii::app()->baseUrl.'/cc/admin'),

                                                        array('label'=>'Crear Colector', 'url'=>yii::app()->baseUrl.'/cc/create'),

                                                    ),

                                                ),

                                                    array('label'=>'Impuestos', 'url'=>'#',

                                                         'items'=>array(

                                                                            array('label'=>'Definir impuestos', 'url'=>yii::app()->baseUrl.'/impuestos/admin'),

                                                                            array('label'=>'Valorizacion de impuestos', 'url'=>yii::app()->baseUrl.'/valorimpuestos/admin'),

                                                                             array('label'=>'Asignar Impuestos', 'url'=>yii::app()->baseUrl.'/impuestosdocu/admin'),

                                                                    ),

                                                                ),
                                                
                                                array('label'=>'Moneda', 'url'=>'#',

                                                         'items'=>array(

                                                                            array('label'=>'Monedas', 'url'=>yii::app()->baseUrl.'/TMoneda/listamonedas'),

                                                                            array('label'=>'Tipo Cambios', 'url'=>yii::app()->baseUrl.'/TMoneda/cambio'),

                                                                             array('label'=>'Actualizar cambios', 'url'=>yii::app()->baseUrl.'/TMoneda/updatecambio'),

                                                                    ),

                                                                ),

                                                        // array('label'=>'Tipo cambio', 'url'=>yii::app()->baseUrl.'/TMoneda/colocacambio'),

                                                array('label'=>'Formas de pago', 'url'=>yii::app()->baseUrl.'/Tipofacturacion/admin'),
                                                array('label'=>'Fondo Fijo', 'url'=>yii::app()->baseUrl.'/fondofijo/admin'),

                                                  ),

                                             ),

                                        array('label'=>'Comerciales', 'url'=>'#',

                                            'items'=>array(

                                                array('label'=>'Contactos', 'url'=>yii::app()->baseUrl.'/Contactos/admin'),

                                                array('label'=>'Disponibilidad', 'url'=>yii::app()->baseUrl.'/Disponibilidad/admin'),

                                                array('label'=>'Grupo ventas', 'url'=>yii::app()->baseUrl.'/Grupoventas/admin'),

                                            ),

                                        ),
                                            $conta2,
                                        array('label'=>'Documentos', 'url'=>yii::app()->baseUrl.'/Documentos/admin'),

                                        array('label'=>'Servicios', 'url'=>'#',

                                            'items'=>array(

                                                array('label'=>'Crear servicio', 'url'=>yii::app()->baseUrl.'/maestroservicios/create'),

                                                array('label'=>'Servicios', 'url'=>yii::app()->baseUrl.'/maestroservicios/admin'),

                                                ),

                                        ),

                                        array('label'=>'Estados', 'url'=>yii::app()->baseUrl.'/Estado/admin'),

                                        array('label'=>'Eventos', 'url'=>yii::app()->baseUrl.'/Eventos/admin'),

                                        array('label'=>'Grupo compras', 'url'=>yii::app()->baseUrl.'/Grupocompras/admin'),

                                        array('label'=>'Objetos tecnicos', 'url'=>'#',

                                            'items'=>array(

                                                array('label'=>'Crear Material', 'url'=>yii::app()->baseUrl.'/maestrocompo/create'),

                                                array('label'=>'Tipos mater.', 'url'=>yii::app()->baseUrl.'/maestrotipos/admin'),

                                                array('label'=>'Materiales', 'url'=>yii::app()->baseUrl.'/maestrocompo/admin'),

                                                array('label'=>'Detalle Materiales', 'url'=>yii::app()->baseUrl.'/maestrocompo/listadetalle'),
                                                array('label'=>'Tipos AF', 'url'=>yii::app()->baseUrl.'/Tipoactivos/admin'),

                                                array('label'=>'Unidades med', 'url'=>yii::app()->baseUrl.'/ums/admin'),

                                                array('label'=>'Catalogo equipos', 'url'=>yii::app()->baseUrl.'/masterequipo/admin'),

                                                array('label'=>'Lista de materiales', 'url'=>yii::app()->baseUrl.'/listamateriales/admin')

                                            ),

                                        ),

                                        array(
                                            'label'=>'Trabajadores', 'url'=>'#',
                                            'items'=>array(
                                                 //array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'user_business.png" /> Trabajadores', 'url'=>yii::app()->baseUrl.'/Trabajadores/admin',),
                                                    array('label'=>'<span class="icon icon-man" > </span>Trabajadores', 'url'=>yii::app()->baseUrl.'/Trabajadores/admin',),
                                                   
                                                array('label'=>'Mano de obra', 'url'=>yii::app()->baseUrl.'/Grupoplan/admin'),
                                                
                                              ),
                                            
                                            ),

                                       
                                           // array('label'=>'Trabajadores', 'url'=>yii::app()->baseUrl.'/Trabajadores/admin'),

                                        array('label'=>'Cargos', 'url'=>yii::app()->baseUrl.'/Oficios/admin'),

                                        array('label'=>'Periodos', 'url'=>yii::app()->baseUrl.'/Periodos/admin'),

                                        array('label'=>'Monedas', 'url'=>yii::app()->baseUrl.'/TMoneda/admin'),

                                    ) ,

                                    'visible'=>!Yii::app()->user->isGuest

                                ),
                        
                        
                        
                        
                        
                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
                        array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
						array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                        array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
							array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

