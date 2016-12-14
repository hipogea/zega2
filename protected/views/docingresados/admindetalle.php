<?php 
var_dump($_GET['VwDocuIngresados']);
$this->menu=array(
	//array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Nuevo', 'url'=>array('create')),
    array('label'=>'Listado rapido', 'url'=>array('certificadosdicapi')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('detalles-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
  
 
<?php MiFactoria::titulo('Detalle de Procesos','attach');
  ?>



<div class="search-form" >
<?php

$this->renderPartial('_searchdetalle',array('model'=>$model,)); 

?>
</div>

<?php $gridWidget=$this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'detalles-grid',      
      'mergeColumns' => array( 'id','desdocu','nomep','correlativo','monto','numero', 'tipodoc','despro'),
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'grid_pyy.css',  // your version of css file
	
	//'filter'=>$model,
	'columns'=>array(
		'idproceso',
		   array(
            'class'=>'CCheckBoxColumn',
           'selectableRows' => 120,
            'value'=>'$data->id',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]'),
            // 'id'=>'cajita' // the columnID for getChecked
                      ),
		
		//'desdocu',  
            'tipodoc',
		array('name'=>'correlativo','type'=>'raw','value'=>'CHTml::link($data->correlativo,yii::app()->createUrl("docingresados/update",array("id"=>$data->id)),array("target"=>"_blank"))','htmlOptions'=>array('width'=>70)),
		'id',
            array('name'=>'desdocu','value'=>'$data->desdocu'),
             array('name'=>'despro','value'=>'$data->despro'),
              array('name'=>'numero','value'=>'$data->numero'),
           // 'numero',
		'moneda',
		'monto',
           array('name'=>'codtenencia','type'=>'raw','value'=>'CHTml::openTag("span",array("class"=>"label label-1504")).$data->codtenencia.CHTml::closeTag("span")'),
		
		//'codprov',
		
             array('name'=>'nomep','type'=>'raw','value'=>'$data->nomep'),
	
		array(
			'name'=>'fecha',
			'value'=>'date("d.m.y", strtotime($data->fecha))','htmlOptions'=>array('width'=>'30')
		),
		array(
			'name'=>'fechain',
			'value'=>'date("d.m.y", strtotime($data->fechain))','htmlOptions'=>array('width'=>'30')
		),	
		'numdocref',
            
            // array('name'=>'falta','type'=>'raw','value'=>'($data->tiempofaltante())','htmlOptions'=>array('width'=>120)),
           
		'ap',
            'descripcion',
            
           // array('name'=>'ad','type'=>'raw','value'=>'$data->procesoactivo[0]->tenenciasproc->eventos->descripcion'),
		//'apoderado',
		//'estado',
	
		/*
		'moneda',
		'descorta',
		'codepv',
		'monto',
		'codgrupo',
		'codresponsable',
		'creadopor',
		'creadoel',
		'texv',
		'docref',
		*/
		array(
			'class'=>'CButtonColumn',
			
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl(
                                        "/Docingresados/update",
                                          array("id"=>$data->id),
                                            array("target"=>"_blank")
                                            )',
                                    
								'label'=>'Modificar', 
                                ),
								'delete'=>
                            array(
                                   
								'visible'=>'false',
                            ),
			
				),
			),
))); ?>


		<?php
				$botones=array(
					
					 'briefcase' => array(
                            'type' => 'D', //AJAX LINK
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/poneralcarro', array()),
                            'opajax'=>array(
                                'type'=>'POST',
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/poneralcarro', array()),
                                'success'=>"function(data) {
					$.growlUI('Growl Notification', data); 
                                    }",
                            ),                           
                            'visiblex' => array('10'),

                        ),		
'clear' => array(
                            'type' => 'D', //AJAX LINK
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/limpiarcarro', array()),
                            'opajax'=>array(
                                'type'=>'POST',
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/limpiarcarro', array()),
                                'success'=>"function(data) {
					$.growlUI('Growl Notification', data); 
                                    }",
                            ),                           
                            'visiblex' => array('10'),

                        ),
                                    
                            'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesavarios',array()),//apreuba guia
						'visiblex'=>array('10'),
                                            ),        
                                    

			);
				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>'10',

					)
				); ?>	






<?php
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
$this->renderExportGridButton($gridWidget,'Exportar resultados',array('class'=>'btn btn-info pull-right'));
?>


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Actualizar Ingreso',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>850,
        'height'=>510,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();


?>
