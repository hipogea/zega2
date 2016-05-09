<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */

$this->breadcrumbs=array(
	'Almacenmovimientoses'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear Transaccion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#almacenmovimientos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Transacciones de Almacén</h1>


<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacenmovimientos-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'codmov',
		'movimiento',
		'signo',
		'actualizaprecio',
	//	'codigo_objeto',
		'escontable',
		'permcodcondicion',
		'permiteparciales',
		'campoafectadoinv',
		'campodestino',
		'permitereversiones',
		'esconsumo',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
