<?php
/* @var $this MotMaterialesController */
/* @var $model MotMateriales */

$this->breadcrumbs=array(
	'Mot Materiales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MotMateriales', 'url'=>array('index')),
	array('label'=>'Create MotMateriales', 'url'=>array('create')),
	array('label'=>'Update MotMateriales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MotMateriales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MotMateriales', 'url'=>array('admin')),
);
?>

<h1>View MotMateriales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha',
		'id',
		'descripcion',
		'numero',
		'codcentro',
		'codplanta',
		'codtraba',
		'creadoel',
		'creadopor',
		'modificadoel',
		'modificadopor',
	),
)); ?>
