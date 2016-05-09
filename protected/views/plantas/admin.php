<?php
/* @var $this PlantasController */
/* @var $model Plantas */


$this->menu=array(
	//array('label'=>'List Plantas', 'url'=>array('index')),
	array('label'=>'Crear Planta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('plantas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listado de plantas</h1>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'plantas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codplanta',
		'desplanta',
		'id',
		'codigozona',
		'capacidad',
		'factor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
