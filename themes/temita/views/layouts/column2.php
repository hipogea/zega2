<?php $this->beginContent('//layouts/main'); ?>    <div class="row-fluid">        <div class="span3">		        <div class="sidebar-nav">                                 <?php if(!Yii::app()->user->isGuest) { ?>                <!-- INICIO DEL WIDGET TIPO DE CAMMBIO!-->                                         <div>                    <?php                    $this->beginWidget('zii.widgets.CPortlet', array(                        'title'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'coins.png" /> Tipo cambio  ('.Yii::app()->params['monedaalternativa'].')',                        'titleCssClass'=>'portlet-title'                    ));                    ?>                    <?php                    $rutabase=Yii::app()->getTheme()->baseUrl;                    $createUrlx = $this->createUrl('/site/Colocatipocambio',ARRAY()                       /* array(                            'maccion'=>$this->getAction()->id,                            'mcontrolador'=>$this->getId(),                            "asDialog"=>1,                            "gridId"=>'favoritos-grid',                        )*/                    );  ?>                    <?php                    $monedaalterna=Yii::app()->params['monedaalternativa'];                  //  $model=Tipocambio::model()->find("codmon2='".$monedaalterna."'");                    ?>                    <div  id="zonacompra"> <?php echo (!Yii::app()->user->isGuest)?CHtml::link(CHtml::image($rutabase.'/img/dinero.png',"hola",array('width'=>'20','height'=>'20')),'#',array('onclick'=>"$('#cru-framegeneral').attr('src','$createUrlx '); $('#cru-dialoggeneral').dialog('open');")):""; ?>                        <span class="label badge-info" >Compra : <?php  echo ROUND(yii::app()->tipocambio->getcompra($monedaalterna),2)  ;  ?> </span>..<span class="label badge-info " >  Venta  : <?php  echo round(1/yii::app()->tipocambio->getventa($monedaalterna),2)  ;  ?></span></div>                    <?php $this->endWidget(); ?>                </div>                <!-- FIN EL WIDGET TIPO CAMBIO !-->                                     <?php  }  ?>		  <div>              <?php              $this->beginWidget('zii.widgets.CPortlet', array(                  'title'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'options.png" /> Opciones',                 'titleCssClass'=>'portlet-title'              ));              ?>		    <?php $this->widget('zii.widgets.CMenu', array(			/*'type'=>'list',*/			'encodeLabel'=>false,			'items'=>array(				array('label'=>'','items'=>$this->menu),			),			));?>              <?php $this->endWidget(); ?>          </div>		        </div>            <?php if(!Yii::app()->user->isGuest) { ?>                <div> <!--INICIA DIV DE USUARIO -->                    <?php                    $rutabase=Yii::app()->getTheme()->baseUrl;                    ///Inicia le portlet de usuario                    $this->beginWidget('zii.widgets.CPortlet', array(                        'title'=>'<img src="'.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'user_business_boss.png" /> ('.Yii::app()->user->name .') - Conectado ',                        'titleCssClass'=>'portlet-title'                    ));                    ?>                    <?php $createUrl = $this->createUrl('/site/agregafavorito',                        array(                            'maccion'=>$this->getAction()->id,                            'mcontrolador'=>$this->getId(),                            "asDialog"=>1,                            "gridId"=>'favoritos-grid',                        )                    );  ?>                    <?php echo CHtml::image($rutabase.'/img/estrella.png',"hola",array('width'=>'15','height'=>'15')); ?>                    Mis Accesos Directos                    <?php echo CHtml::link(CHtml::image($rutabase.'/img/mas.png',"hola",array('width'=>'15','height'=>'15')),'#',array('onclick'=>"$('#cru-framegeneral').attr('src','$createUrl '); $('#cru-dialoggeneral').dialog('open');")); ?>                      <?php $this->widget('zii.widgets.grid.CGridView', array(                        'id'=>'favoritos-grid',                        'dataProvider'=>Usuariosfavoritos::model()->search_usuario(Yii::app()->user->id),                        'enablePagination' => false,                        'summaryText'=>'',                        'itemsCssClass'=>'table table-striped table-bordered table-hover',                       // 'cssFile'=>'false',                        'hideHeader'=>true,                        //'filter'=>$modelodirecciones,                        'columns'=>array(                            array('name'=>'chapa','type'=>'raw', 'value'=>'CHtml::link($data->chapa,$data->url)'),                            array(                                'class'=>'CButtonColumn',                                'buttons'=>array(                                    'update'=>                                        array(                                            'visible'=>'false',                                        ),                                    'delete'=>                                        array(                                            'visible'=>'true',                                            'url'=>'$this->grid->controller->createUrl("/usuariosfavoritos/borrar", array("id"=>$data->id))',                                            'options' => array( 'ajax' => array('type' => 'GET',  'success' => 'js:function(data) { $.fn.yiiGridView.update("favoritos-grid")}' ,'url'=>'js:$(this).attr("href")')) ,                                            'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',                                            'label'=>'Borrar',                                        ),                                    'view'=>                                        array(                                            'visible'=>'false',                                        ),                                ),                            ),                        ), // Columns                    ))                    ; ?>                    <div id="maletin">                        <?php                        $rutabase=Yii::app()->getTheme()->baseUrl;                        $createUrly = $this->createUrl('/site/revisamaletin',                            array(                                'maccion'=>$this->getAction()->id,                                'mcontrolador'=>$this->getId(),                                "asDialog"=>1,                            )                        );                        ///verificando que no haya sesiones de maletin                        $cantidad=0;                        /*var_dump(Yii::app()->session['DOC350']);                        yii::app()->end();*/                        if(isset(Yii::app()->session['DOC350']) or isset(Yii::app()->session['DOC220']) ) //Detalles de solpe o detalles de compras                            $cantidad=count(Yii::app()->session['DOC350'])+count(Yii::app()->session['DOC220']);                        ?>                        <?php //echo (!Yii::app()->user->isGuest)?CHtml::link(CHtml::image($rutabase.'/img/dinero.png',"hola",array('width'=>'30','height'=>'30')),'#',array('onclick'=>"$('#cru-framegeneral').attr('src','$createUrlx '); $('#cru-dialoggeneral').dialog('open');")):""; ?>                        <?php echo CHtml::link(CHtml::image($rutabase.'/img/maletin.png',"hola",array('width'=>'20','height'=>'20')),'#',array('onclick'=>"$('#cru-framegeneral').attr('src','$createUrly '); $('#cru-dialoggeneral').dialog('open');"))."( ".$cantidad." )"." - Mi maletin"; ?>                    </div>                    <div id="documentosfavoritos">                        <?php echo CHtml::image($rutabase.'/img/disponible.png',"hola");echo CHtml::link('Listados de Materiales',Yii::app()->baseUrl.'/listamateriales/admin') ?>                    </div>                        <div>                            <?php echo CHtml::image($rutabase.'/img/safe.png',"hola");echo CHtml::link('Doc. Bloqueados :',Yii::app()->baseUrl.'/usuariosfavoritos/misbloqueos') ?>                            <span class="label badge-warning">                        <?php echo Bloqueos::conteo(yii::app()->user->id) ?>                        </span>                          </div>                    <div>                        <?php echo CHtml::link(CHtml::image($rutabase.'/img/page_white_gear.png',"hola"),'#',''); ?>                        <?php echo CHtml::link('Opciones Documentos',Yii::app()->baseUrl.'/documentos/prefdoc',  ''); ?>                    </div>                    <div>                    <?php echo CHtml::link(CHtml::image($rutabase.'/img/ruler_triangle.png',"hola"),Yii::app()->user->ui->userManagementAdminUrl,''); ?>                    <?php echo CHtml::link(' Mi cuenta',Yii::app()->baseUrl.'/trabajadores/perfil',  ''); ?>                    </div>                   <?php if(Noticias::isAdminTablon()) { ?>                            <div>                                 <?php echo CHtml::link(CHtml::image($rutabase.'/img/sound.png',"hola"),Yii::app()->baseUrl.'/noticias/poraprobar',''); ?>                                <?php echo CHtml::link(' Avisos por aprobar ',Yii::app()->baseUrl.'/noticias/poraprobar',  ''); ?>                                <span class="label badge-warning">                        <?php echo Noticias::Numeroavisosporaprobar(); ?>                        </span>                            </div>                  <?php } ?>                    <div>                        <?php echo CHtml::link(CHtml::image($rutabase.'/img/sound.png',"hola"),Yii::app()->baseUrl.'/noticias/adminusuariopendientes',''); ?>                        <?php echo CHtml::link(' Avisos pendientes ',Yii::app()->baseUrl.'/noticias/adminusuariopendientes',  ''); ?>                        <span class="label badge-warning">                        <?php echo Noticias::Numeroavisospendientes(); ?>                        </span>                    </div>                    <div>                    <?php echo CHtml::image($rutabase.'/img/clock.png',"hola"); ?>                     <?php  echo CHtml::link(" Quedan : ". Mifactoria::statusession()['minutosrestantes']."   Minutos","#","");?>                    <div class="progress progress-<?php echo MiFactoria::getcolor(Mifactoria::statusession()['porcentaje'],60,80,95);?>">                        <div class="bar" style="width: <?php echo (100-Mifactoria::statusession()['porcentaje'])."";?>%"></div>                    </div>                    </div>                    <!--FINALIZA EL PORTLET DE USUARIO -->                    <?php $this->endWidget(); ?>                </div> <!--FINALIZA EL DIV USUARIO -->                                 <?php  }   ?>                                                     <table class="table table-striped table-bordered">          <tbody>            <tr>              <td width="50%">Ancho de banda usado</td>              <td>              	<div class="progress progress-right">                  <div class="bar" style="width: 10%"></div>                </div>              </td>            </tr>            <tr>              <td>Espacio en Disco</td>              <td>                  <?php $this->widget('ext.semaforo.Semaforo',                      array(                          'valores'=>ARRAY(45,70,90),                              'asc'=>1,                             'valor'=>46,                      )                  );?>              </td>            </tr>            <tr>              <td>Ventas cerradas</td>              <td>              	<div class="progress progress-info">                  <div class="bar" style="width: 20%"></div>                </div>              </td>            </tr>          </tbody>        </table>        </div><!--/span3-->    <div class="span9">        <?php       // var_dump(count(yii::app()->tipocambio->cambiospasados()));die();          if(count(yii::app()->tipocambio->cambiospasados())>0){MiFactoria::mensaje('notice','El tipo de cambio no se ha actualizado');}        $flashMessages = Yii::app()->user->getFlashes(false);if ($flashMessages) { $this->widget('ext.flashes.Flashes', array() );   }        ?>        <?php        $docbloqueados=Bloqueos::conteo(yii::app()->user->id);        //var_dump(yii::app()->settings->get('documentos','documentos_numeromaxbloqueos'));yii::app()->end();        if($docbloqueados >(yii::app()->settings->get('documentos','documentos_numeromaxbloqueos')+0))        {            yii::app()->user->setFlash('error','Ha excedido el numero de documentos editados permitidos ('.$docbloqueados.'/'.yii::app()->settings->get('documentos','documentos_numeromaxbloqueos').') Si no los va a editar, por favor salga del modo edicion de estos documentos '.CHTml::link('hiidi','#'));            //echo CHTml::link('',yii::app()->createUrl('/usuariosfavoritos/misbloqueos'),array('target'=>'_blank'));            //yii::app()->end();            //$this->redirect('/recurso/site/index');        }        ?>    <!-- Include content pages -->    <?php echo $content; ?>	</div><!--/span-->  </div><!--/row fuid --><?php $this->endContent(); ?><?php$this->beginWidget('zii.widgets.jui.CJuiDialog', array(    'id'=>'cru-dialoggeneral',    'options'=>array(        'title'=>'',        'autoOpen'=>false,        'modal'=>true,        'width'=>600,        'height'=>420,        'border'=>0,    ),));?><iframe id="cru-framegeneral" style="border:0px; width:100%; height:100%;" ></iframe><?php$this->endWidget();?>