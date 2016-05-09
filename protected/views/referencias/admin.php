<?php
/* @var $this EmbarcacionesController */
/* @var $model Embarcaciones */


$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Crear nueva', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('embarcaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>





<h1>Vehiculos</h1>


<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'embarcaciones-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'codep',
		'nomep',
		'matricula',
		'cbodega',
		'activa',
		/*'codsap',*/
		/*
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codcentro',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
