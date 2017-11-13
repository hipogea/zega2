<?php
/* @var $this OperaCodepController */
/* @var $model OperaCodep */

$this->breadcrumbs=array(
	'Opera Codeps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OperaCodep', 'url'=>array('index')),
	array('label'=>'Create OperaCodep', 'url'=>array('create')),
	array('label'=>'Update OperaCodep', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OperaCodep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OperaCodep', 'url'=>array('admin')),
);
?>

<h1>View OperaCodep #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codep',
		'codtra',
		'id',
		'finicio',
		'codof',
	),
)); ?>
