<h1>  Temporadas de Pesca  </h1>

<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */

$this->breadcrumbs=array(
	'Temporadases'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Temporadas', 'url'=>array('index')),
	array('label'=>'Crear Temporada', 'url'=>array('create')),
            array('label'=>'Administrar Objetos', 'url'=>array('embarcaciones/admin')),
	array('label'=>'Administrar plantas', 'url'=>array('plantas/admin')),
	array('label'=>'Administrar zarpes', 'url'=>array('tipozarpe/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('temporadas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temporadas-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
	array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/temporadas/update",
																					array("id"=>$data->id,																					       
																							
																							)
																				)',
                                    
                                ),
								'delete'=>
                            array(
                                    
                                ),
								'view'=>
                            array(
                                    'visible'=>'false',
                                ),
                            ),
		),
		array('name'=>'id','visible'=>false),
		array('name'=>'destemporada','header'=>'Descripcion','type'=>'raw','value'=>'CHtml::link("$data->destemporada"," ".Yii::app()->createurl(\'/temporadas/view\', array(\'id\'=> $data->id))."")'),
		array('name'=>'inicio', 'value'=>'date("d/m/Y",strtotime($data->inicio))'),
	    array('name'=>'termino', 'value'=>'date("d/m/Y",strtotime($data->termino))'),
		//'termino',
		'cuota_anchoveta',
		'cuota_global_anchoveta',
		
	),
)); ?>
