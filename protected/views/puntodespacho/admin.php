<?php
/* @var $this PuntodespachoController */
/* @var $model Puntodespacho */

$this->breadcrumbs=array(
	'Puntodespachos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Puntodespacho', 'url'=>array('index')),
	array('label'=>'Crear Punto despacho', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#puntodespacho-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php MiFactoria::titulo('Puntos de expedicion','camion');?>




<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'puntodespacho-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'hcodcanal',
		'nombrepunto',
		'pesaje',
		'codcen',
		'maxhorasespera',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
