<?php
/* @var $this ControlActivosController */
/* @var $model ControlActivos */

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	//array('label'=>'Observaciones ', 'url'=>array('observaciones')),	
	//array('label'=>'Confirmar movimientos', 'url'=>array('/VwLoginventari')),
	//array('label'=>'Ver procesos', 'url'=>array('controlactivos/admin')),
	//array('label'=>'Ver carteres', 'url'=>array('partes/muestracarteres')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#control-activos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<H1>Solicitudes </h1>
<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'control-activos-grid',
	'dataProvider'=>VwControlactivos::model()->search(),
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file
	
	//'filter'=>$model,
	'columns'=>array(
	   //'idactivo' ,
	        'numformato' ,
			'nomcen',
			//'tipo' ,
			'fecha',
			'codigoaf',
			'descripcion',
			'marca' ,
			'modelo',
			'serie',
			'barcoanterior',
			'barcoactual' ,
			//'codobraencurso' ,			
			//'comentario' ,			
			'estado' ,			
			//'codigosap' ,
			
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/controlactivos/update",
																					array("id"=>$data->idformato,																					      
																							)
																				)',
                                   
								'label'=>'Actualizar', 
                                ),
								
								 'delete'=>
                            array(
                                   
								'visible'=>'false',
                                ),
								
                            ),
							
		),
	),
)); ?>
