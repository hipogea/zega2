<?php$conta=(Yii::app()->hasModule('contabilidad'))?array('label'=>'Contabilidad', 'url'=>'#',    'items'=>array(        array('label'=>'Operadores', 'url'=>yii::app()->baseUrl.'/contabilidad/opcontables/admin'),        array('label'=>'Determinar operadores', 'url'=>yii::app()->baseUrl.'/contabilidad/detercuentas/admin'),    )):array();$logh= is_array(Yii::app()->user->loginUrl)?Yii::app()->user->loginUrl[0]:Yii::app()->user->loginUrl; if(!stripos(Yii::app()->request->getUrl() ,$logh)!==false) {    if(!Yii::app()->user->isGuest){    if(!(Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'externo')=='1'))            {        ?>        <div class="navbar navbar-inverse navbar-fixed-top">            <div class="navbar-inner">                <div class="container">                                                          <div class="nav-collapse">                                    <div id="myslidemenu" class="barrademenu">                        <?php $this->widget('application.extensions.emenu.EMenu',array(                                 'theme'=>'flickr', //adobe, mtv, lwis,flickr,nvidia,vimeo                            'encodeLabel'=>false,                            'items'=>array(                                array('label'=>' Catálogos', 'url'=>'#',                                    'items'=>array(                                        array('label'=>'Layout', 'url'=>yii::app()->baseUrl.'/site/maestros'),                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'orga.png" /> Corporativos', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Sociedades', 'url'=>yii::app()->baseUrl.'/sociedades/admin'),                                                array('label'=>'Centros', 'url'=>yii::app()->baseUrl.'/centros/admin'),                                                array('label'=>'Areas', 'url'=>yii::app()->baseUrl.'/areas/admin'),                                                array('label'=>'Acreedores', 'url'=>yii::app()->baseUrl.'/clipro/admin'),                                            ),                                        ),                                        array('label'=>'Logistica', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'logi.png" />Almacen', 'url'=>'#',                                                    'items'=>array(                                                        array('label'=>'Almacenes', 'url'=>yii::app()->baseUrl.'/almacenes/admin'),                                                        array('label'=>'Transacciones', 'url'=>yii::app()->baseUrl.'/almacenmovimientos/admin'),                                                        array('label'=>'Canales de despacho', 'url'=>yii::app()->baseUrl.'/canales/admin'),                                                        array('label'=>'Acreedores', 'url'=>yii::app()->baseUrl.'/clipro/admin'),                                                        array('label'=>'Objetos externos', 'url'=>yii::app()->baseUrl.'/objetoscliente/admin'),                                                             ),                                                ),                                                 array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'car.png" /> Transporte', 'url'=>'#',                                                     'items'=>array(                                                         array('label'=>'Vehiculos', 'url'=>yii::app()->baseUrl.'/embarcaciones/admin'),                                                         array('label'=>'Ptos Transporte', 'url'=>yii::app()->baseUrl.'/direcciones/admin'),                                                         array('label'=>'Lugares', 'url'=>yii::app()->baseUrl.'/lugares/admin'),                                                         array('label'=>'Tipos mov', 'url'=>yii::app()->baseUrl.'/paraqueva/admin'),                                                         array('label'=>'Motivos traslado', 'url'=>yii::app()->baseUrl.'/CMotivo/admin'),                                                     ),                                                     ),                                            ),                                        ),                                        array('label'=>'Analisis y costeo', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Colectores', 'url'=>'#',                                                    'items'=>array(                                                        array('label'=>'Grupos', 'url'=>yii::app()->baseUrl.'/grupocc/admin'),                                                        array('label'=>'Colectores', 'url'=>yii::app()->baseUrl.'/cc/admin'),                                                        array('label'=>'Crear Colector', 'url'=>yii::app()->baseUrl.'/cc/create'),                                                    ),                                                ),                                                    array('label'=>'Impuestos', 'url'=>'#',                                                         'items'=>array(                                                                            array('label'=>'Definir impuestos', 'url'=>yii::app()->baseUrl.'/impuestos/admin'),                                                                            array('label'=>'Valorizacion de impuestos', 'url'=>yii::app()->baseUrl.'/valorimpuestos/admin'),                                                                             array('label'=>'Asignar Impuestos', 'url'=>yii::app()->baseUrl.'/impuestosdocu/admin'),                                                                    ),                                                                ),                                                         array('label'=>'Tipo cambio', 'url'=>yii::app()->baseUrl.'/TMoneda/colocacambio'),                                                array('label'=>'Formas de pago', 'url'=>yii::app()->baseUrl.'/Tipofacturacion/admin'),                                                array('label'=>'Fondo Fijo', 'url'=>yii::app()->baseUrl.'/fondofijo/admin'),                                                  ),                                             ),                                        array('label'=>'Comerciales', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Contactos', 'url'=>yii::app()->baseUrl.'/Contactos/admin'),                                                array('label'=>'Disponibilidad', 'url'=>yii::app()->baseUrl.'/Disponibilidad/admin'),                                                array('label'=>'Grupo ventas', 'url'=>yii::app()->baseUrl.'/Grupoventas/admin'),                                            ),                                        ),                                        array('label'=>'Documentos', 'url'=>yii::app()->baseUrl.'/Documentos/admin'),                                        array('label'=>'Servicios', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Crear servicio', 'url'=>yii::app()->baseUrl.'/maestroservicios/create'),                                                array('label'=>'Servicios', 'url'=>yii::app()->baseUrl.'/maestroservicios/admin'),                                                ),                                        ),                                        array('label'=>'Estados', 'url'=>yii::app()->baseUrl.'/Estado/admin'),                                        array('label'=>'Eventos', 'url'=>yii::app()->baseUrl.'/Eventos/admin'),                                        array('label'=>'Grupo compras', 'url'=>yii::app()->baseUrl.'/Grupocompras/admin'),                                        array('label'=>'Objetos tecnicos', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Crear Material', 'url'=>yii::app()->baseUrl.'/maestrocompo/create'),                                                array('label'=>'Tipos mater.', 'url'=>yii::app()->baseUrl.'/maestrotipos/admin'),                                                array('label'=>'Materiales', 'url'=>yii::app()->baseUrl.'/maestrocompo/admin'),                                                array('label'=>'Detalle Materiales', 'url'=>yii::app()->baseUrl.'/maestrocompo/listadetalle'),                                                array('label'=>'Tipos AF', 'url'=>yii::app()->baseUrl.'/Tipoactivos/admin'),                                                array('label'=>'Unidades med', 'url'=>yii::app()->baseUrl.'/ums/admin'),                                                array('label'=>'Catalogo equipos', 'url'=>yii::app()->baseUrl.'/masterequipo/admin'),                                                array('label'=>'Lista de materiales', 'url'=>yii::app()->baseUrl.'/listamateriales/admin')                                            ),                                        ),                                        array(                                            'label'=>'Trabajadores', 'url'=>'#',                                            'items'=>array(                                                 array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'user_business.png" /> Trabajadores', 'url'=>yii::app()->baseUrl.'/Trabajadores/admin',),                                                    array('label'=>'Mano de obra', 'url'=>yii::app()->baseUrl.'/Grupoplan/admin'),                                                                                              ),                                                                                        ),                                                                                  // array('label'=>'Trabajadores', 'url'=>yii::app()->baseUrl.'/Trabajadores/admin'),                                        array('label'=>'Cargos', 'url'=>yii::app()->baseUrl.'/Oficios/admin'),                                        array('label'=>'Periodos', 'url'=>yii::app()->baseUrl.'/Periodos/admin'),                                        array('label'=>'Monedas', 'url'=>yii::app()->baseUrl.'/TMoneda/admin'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                array('label'=>'Operaciones ', 'url'=>'#', //'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                                   array('label'=>'Ordenes servicio ', 'url'=>'#',                                               'items'=> array(                                                   array('label'=>'Crear Orden', 'url'=>yii::app()->baseUrl.'/ot/creadocumento'),                                                   array('label'=>'Ordenes', 'url'=>yii::app()->baseUrl.'/ot/admin'),                                                        array('label'=>'Grupos plan', 'url'=>yii::app()->baseUrl.'/grupoplan/'),                                                   //array('label'=>'Ordenes', 'url'=>yii::app()->baseUrl.'/solpe/admin'),                                                              )                                                  ),                                           array('label'=>'Solicitudes ', 'url'=>'#',                                               'items'=> array(                                                   array('label'=>'Crear Solicitud', 'url'=>yii::app()->baseUrl.'/solpe/create'),                                                   array('label'=>'Solicitudes', 'url'=>yii::app()->baseUrl.'/solpe/admin'),                                                                )                                                  ),                                            array('label'=>'Compras ', 'url'=>'#',                                                'items'=> array(                                                array('label'=>'Tomar Solicitudes', 'url'=>yii::app()->baseUrl.'/solpe/tomarcompras'),                                                array('label'=>'Crear Sol Cotizac', 'url'=>yii::app()->baseUrl.'/solcot/create'),                                                array('label'=>'Solicitudes Cotizac', 'url'=>yii::app()->baseUrl.'/solcot/admin'),                                                array('label'=>'Crear Orden compra', 'url'=>yii::app()->baseUrl.'/ocompra/creaDocumento'),                                                array('label'=>'Ordenes de  compra', 'url'=>yii::app()->baseUrl.'/ocompra/admin'),                                                array('label'=>'Servicios', 'url'=>'#',                                                    'items'=>array(                                                        array('label'=>'Crear servicio', 'url'=>yii::app()->baseUrl.'/maestroservicios/create'),                                                        array('label'=>'Dar conformidad', 'url'=>yii::app()->baseUrl.'/maestroservicios/creaconformidad'),                                                        array('label'=>'Servicios', 'url'=>yii::app()->baseUrl.'/maestroservicios/admin'),                                                        array('label'=>'Visualizar Conformidades', 'url'=>yii::app()->baseUrl.'/maestroservicios/conformidades'),                                                    ),                                                ),                                            ),                                            ),                                            ),                                        array('label'=>'Servicios', 'url'=>'#',                                            'items'=>array(                                            array('label'=>'Crear Oferta', 'url'=>yii::app()->baseUrl.'/peticion/create'),                                            array('label'=>'Ofertas', 'url'=>yii::app()->baseUrl.'/peticion/admin'),                                            array('label'=>'Ordenes de trabajo', 'url'=>'#',                                                'items'=>array(                                                    array('label'=>'Crear orden', 'url'=>yii::app()->baseUrl.'/ot/create'),                                                    array('label'=>'Ordenes trabajo', 'url'=>yii::app()->baseUrl.'/ot/admin'),                                                ),                                                 ) ),                                        'Aprobaciones'=>array(                                            array('label'=>'Solicitudes', 'url'=>yii::app()->baseUrl.'/solpe/liberacion'),                                        ),                                    ),                                    'visible'=>!Yii::app()->user->isGuest                                ),                               array('label'=>'Administracion ', 'url'=>'#',//'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'Novedades', 'url'=>yii::app()->baseUrl.'/noticias/admin'),                                        array('label'=>'Aprobar Docs', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Solicitudes Mat', 'url'=>yii::app()->baseUrl.'/solpe/liberacion'),                                                array('label'=>'Compras', 'url'=>yii::app()->baseUrl.'/Ocompra/liberacion'),                                                array('label'=>'Transporte', 'url'=>yii::app()->baseUrl.'/Guia/liberacion'),                                                array('label'=>'Noticias', 'url'=>yii::app()->baseUrl.'/noticias/poraprobar'),                                            ),                                        ),                                         array('label'=>'Tipo cambio', 'url'=>yii::app()->baseUrl.'/tipocambio/admin'),                                        array('label'=>'Maestros utiles', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Contactos', 'url'=>yii::app()->baseUrl.'/clipro/agenda'),                                                array('label'=>'Trabajadores', 'url'=>yii::app()->baseUrl.'/trabajadores/admin'),                                                array('label'=>'Proveedores', 'url'=>yii::app()->baseUrl.'/clipro/admin'),                                            ),                                        ),                                        array('label'=>'Recepcion doc.', 'url'=>yii::app()->baseUrl.'/docingresados/admin'),                                        array('label'=>'Caja menor.', 'url'=>yii::app()->baseUrl.'/cajachica/admin'),                                        array('label'=>'Vehiculos', 'url'=>yii::app()->baseUrl.'/Embarcaciones/admin'),                                        array('label'=>'Periodos', 'url'=>yii::app()->baseUrl.'/Periodos/admin'),                                        array('label'=>'Monedas', 'url'=>yii::app()->baseUrl.'/TMoneda/cambio'),                                        array('label'=>'Solicitar noticia', 'url'=>yii::app()->baseUrl.'/noticias/solicita'),                                        array('label'=>'Biblioteca', 'url'=>yii::app()->baseUrl.'/archivador/admin'),                                        array('label'=>'Recep Facturas', 'url'=>yii::app()->baseUrl.'/ingfactura/admin'),                                        array('label'=>'Costos', 'url'=>yii::app()->baseUrl.'/cc/reporte'),                                        array('label'=>'Registro Costos', 'url'=>yii::app()->baseUrl.'/ccGastos/admin'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                array('label'=>'Inventario', 'url'=>'#',//'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'materia.png" />Existencias', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Resumen', 'url'=>yii::app()->baseUrl.'/almacendocs/almacenes'),                                                array('label'=>'Listado stock ', 'url'=>yii::app()->baseUrl.'/alinventario/admin'),                                                array('label'=>'Supervisar Stock', 'url'=>yii::app()->baseUrl.'/alinventario/supervision'),                                            ),                                        ),                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'doc_table.png" />Doc Almacen', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Crear movimiento', 'url'=>yii::app()->baseUrl.'/almacendocs/crearvale'),                                                array('label'=>'Vales', 'url'=>yii::app()->baseUrl.'/almacendocs/admin'),                                                array('label'=>'Kardex', 'url'=>yii::app()->baseUrl.'/alkardex/admin'),                                            ),                                        ),                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'rq.png" />Requerimientos', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Ajuste de reservas', 'url'=>yii::app()->baseUrl.'/solpe/atiendesolpe'),                                                array('label'=>'Listado de solicitudes', 'url'=>yii::app()->baseUrl.'/almacendocs/admin'),                                                array('label'=>'Despachos', 'url'=>yii::app()->baseUrl.'/despacho/admin'),                                            ),                                        ),                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'chek.png" />Conteo', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Inv fisico', 'url'=>yii::app()->baseUrl.'/inventariofisicopadre/admin'),                                                array('label'=>'Crear conteo', 'url'=>yii::app()->baseUrl.'/inventariofisicopadre/create'),                                            ),                                        ),                                        array('label'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'noti01.png" />Reportes', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Analisis ABC', 'url'=>yii::app()->baseUrl.'/alinventario/pareto'),                                                array('label'=>'Reporte ABC', 'url'=>yii::app()->baseUrl.'/alinventario/adminpareto'),                                                array('label'=>'Reportes de inventario', 'url'=>yii::app()->baseUrl.'/alinventario/repinventario'),                                            ),                                        ),                                        array('label'=>'Actualizar materiales', 'url'=>yii::app()->baseUrl.'/alinventario/cargarmat'),                                       // array('label'=>'Importar Inventario', 'url'=>yii::app()->baseUrl.'/alinventario/import'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                                                                                                                 array('label'=>'Aplicacion', 'url'=>'#',//'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'Configuracion', 'url'=>'#',                                                'items'=>array(                                                                                                         array(                                                        'label'=>'Sistema ', 'url'=>'#',                                                         'items'=>array(                                                                            array('label'=>'Panel de control ', 'url'=>'#',                                                                        'items'=>array(                                                                                    array('label'=>'Editar ', 'url'=>yii::app()->baseUrl.'/configuracion/'),                                                                                    array('label'=>'Visualizar ', 'url'=>yii::app()->baseUrl.'/configuracion/ver'),                                                                                    array('label'=>'Crear variable ', 'url'=>yii::app()->baseUrl.'/configuracion/create'),                                                                             ),                                                                             ),                                                                        ),//fin de items                                                          ),                                                           array('label'=>'Objetos ', 'url'=>'#',                                                                'items'=>array(                                                                                    array('label'=>'Parametros ', 'url'=>'#',                                                                                                'items'=>array(                                                                                                                array('label'=>'Crear ', 'url'=>yii::app()->baseUrl.'/parametros/create'),                                                                                                                array('label'=>'Listado ', 'url'=>yii::app()->baseUrl.'/parametros/admin'),                                                                                                //array('label'=>'Crear variable ', 'url'=>yii::app()->baseUrl.'/configuracion/create'),                                                                                                         ),                                                                                        ),                                                                                    array('label'=>'Listado ', 'url'=>yii::app()->baseUrl.'/configuracion/admin'),                                                                                    array('label'=>'Crear Objeto ', 'url'=>yii::app()->baseUrl.'/configuracion/creaparametro'),                                                                             ),                                                            ),                                                    $conta,                                                    ),                                                ),                                                                                                                                                                    array('label'=>'Maestros Base', 'url'=>yii::app()->baseUrl.'/site/config'),                                                          array('label'=>'Valores defecto', 'url'=>yii::app()->baseUrl.'/opcionescamposdocu/admin'),                                                          array('label'=>'Reportes', 'url'=>'#',                                                              'items'=>array(                                                              array('label'=>'Administrar ', 'url'=>yii::app()->baseUrl.'/coordocs/admin'),                                                              array('label'=>'Tenores ', 'url'=>yii::app()->baseUrl.'/tenores/admin'),                                                              ),                                                              ),                                                   //$conta,                                      array('label'=>'Seguridad', 'url'=>'#',                                            'items'=>array(                                                array('label'=>'Gestion Usuarios', 'url'=>yii::app()->baseUrl.'/cruge/ui/usermanagementadmin'),                                                array('label'=>'Definir perfiles', 'url'=>yii::app()->baseUrl.'/cruge/ui/rbaclisttasks'),                                                array('label'=>'Definir Roles', 'url'=>yii::app()->baseUrl.'/cruge/ui/rbaclistroles'),                                                    array('label'=>'Gestion de Acceso', 'url'=>' /recurso/cruge/ui/systemupdate'),                                                    array('label'=>'Permisologia', 'url'=>yii::app()->baseUrl.'/cruge/ui/rbacusersassignments'),                                                array('label'=>'Reglas Negocio', 'url'=>yii::app()->baseUrl.'/Authobjetos/admin'),                                                array('label'=>'Backup', 'url'=>yii::app()->baseUrl.'/backup'),                                                    ),                                            ),                                        array('label'=>'Importacion de datos', 'url'=>yii::app()->baseUrl.'/cargamasiva/admin' ),                                        array('label'=>'Ediciones de usuario', 'url'=>yii::app()->baseUrl.'/site/bloqueos' ),                                        ),                                    'visible'=>!Yii::app()->user->isGuest                                                                ),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  array('label'=>'Transporte ', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'Crear Doc Transp', 'url'=>yii::app()->baseUrl.'/guia/creaDocumento'),                                        array('label'=>'Crear Doc Recep', 'url'=>yii::app()->baseUrl.'/ne/creadocumento'),                                        array('label'=>'Documentos', 'url'=>yii::app()->baseUrl.'/guia/admin'),                                        array('label'=>'Crear Conductores', 'url'=>yii::app()->baseUrl.'/choferes/create'),                                        array('label'=>'Crear Direccion', 'url'=>yii::app()->baseUrl.'/direcciones/create'),                                        array('label'=>'Crear Ubicaciones', 'url'=>yii::app()->baseUrl.'/lugares/create'),                                        array('label'=>'Canales de distr', 'url'=>yii::app()->baseUrl.'/canales/admin'),                                        array('label'=>'Centro expedicion', 'url'=>yii::app()->baseUrl.'/puntodespacho/admin'),                                        array('label'=>'Expedicion', 'url'=>yii::app()->baseUrl.'/despacho/admin'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                array('label'=>'G. Activos ', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'Inventario AF', 'url'=>yii::app()->baseUrl.'/Inventario/admin'),                                        array('label'=>'Crear AF', 'url'=>yii::app()->baseUrl.'/Inventario/create'),                                        array('label'=>'Observaciones', 'url'=>yii::app()->baseUrl.'/Observaciones/admin'),                                        array('label'=>'Crear AF', 'url'=>yii::app()->baseUrl.'/Inventario/create'),                                        array('label'=>'Tipos AF', 'url'=>yii::app()->baseUrl.'/tipoactivos/create'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                array('label'=>'Ayuda', 'url'=>yii::app()->baseUrl.'/site/ayuda'),                                array('label'=>'Login', 'url'=>Yii::app()->user->ui->loginUrl  , 'visible'=>Yii::app()->user->isGuest),                                array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>Yii::app()->user->ui->logoutUrl , 'visible'=>!Yii::app()->user->isGuest),                        )));   ?>                            <br style="clear: left" />                        </div>                    </div>                </div>            </div>        </div>    <?php    }  else   {      ?>        <div class="navbar navbar-inverse navbar-fixed-top">            <div class="navbar-inner">                <div class="container"> <!-- Be sure to leave the brand out there if you want it shown -->                    <a class="brand" href="#"><?php //echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'helius.png',"Helius",array("height"=>5)); ?></a>                    <div class="nav-collapse">                        <?php $this->widget('application.extensions.emenu.EMenu',array(                            'theme'=>'flickr', //adobe, mtv, lwis,flickr,nvidia,vimeo                            // 'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),   // esta opcion malogar la lista despelagable desactivarla                            /*'itemCssClass'=>'item-test',*/                            'encodeLabel'=>false,                            'items'=>array(                                array('label'=>'Inicio', 'url'=>array('/site/index'),'visible'=>!Yii::app()->user->isGuest),                                array('label'=>'Operaciones ', 'url'=>'#', //'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),                                    'items'=>array(                                        array('label'=>'Ver Peticiones Oferta', 'url'=>yii::app()->baseUrl.'/clipro/muestraofertas'),                                        array('label'=>'Ventas', 'url'=>yii::app()->baseUrl.'/Ocompra/admin'),                                    ) ,                                    'visible'=>!Yii::app()->user->isGuest                                ),                                array('label'=>'Login', 'url'=>Yii::app()->user->ui->loginUrl  , 'visible'=>Yii::app()->user->isGuest),                                array('label'=>'Cerrar sesion ('.Yii::app()->user->name.')', 'url'=>Yii::app()->user->ui->logoutUrl , 'visible'=>!Yii::app()->user->isGuest),                            ),                        )); ?>                    </div>                </div>            </div>        </div>    <?php    }} else  {    ?>    <div class="navbar navbar-inverse navbar-fixed-top">        <div class="navbar-inner">            <div class="container">                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">                    <span class="icon-bar"></span>                    <span class="icon-bar"></span>                    <span class="icon-bar"></span>                </a>                <!-- Be sure to leave the brand out there if you want it shown -->                <a class="brand" href="#"><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'helius.png',"Helius",array("height"=>5)); ?></a>                <div class="nav-collapse">                </div>            </div>        </div>    </div><?php}?> <?php }