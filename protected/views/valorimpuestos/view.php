<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */

$this->breadcrumbs=array(
	'Valorimpuestoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Valorimpuestos', 'url'=>array('index')),
	array('label'=>'Create Valorimpuestos', 'url'=>array('create')),
	array('label'=>'Update Valorimpuestos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Valorimpuestos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Valorimpuestos', 'url'=>array('admin')),
);
?>

<h1>View Valorimpuestos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hcodimpuesto',
		'valor',
		'finicio',
		'ffinal',
	),
)); ?>
