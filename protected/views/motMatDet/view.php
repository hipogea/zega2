<?php
/* @var $this MotMatDetController */
/* @var $model MotMatDet */

$this->breadcrumbs=array(
	'Mot Mat Dets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MotMatDet', 'url'=>array('index')),
	array('label'=>'Create MotMatDet', 'url'=>array('create')),
	array('label'=>'Update MotMatDet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MotMatDet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MotMatDet', 'url'=>array('admin')),
);
?>

<h1>View MotMatDet #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidmot',
		'item',
		'codigo',
		'descripcion',
		'obs',
		'um',
		'codigoequipo',
		'creadopor',
		'creadoel',
		'modificadoel',
		'modificadopor',
		'estado',
		'codocu',
	),
)); ?>
