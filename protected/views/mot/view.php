<?php
/* @var $this MotController */
/* @var $model Mot */

$this->breadcrumbs=array(
	'Mots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mot', 'url'=>array('index')),
	array('label'=>'Create Mot', 'url'=>array('create')),
	array('label'=>'Update Mot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mot', 'url'=>array('admin')),
);
?>

<h1>View Mot #<?php echo $model->id; ?></h1>

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
		'codep',
	),
)); ?>
