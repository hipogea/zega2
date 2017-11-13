<?php
/* @var $this OperaCodepController */
/* @var $model OperaCodep */

$this->breadcrumbs=array(
	'Opera Codeps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OperaCodep', 'url'=>array('index')),
	array('label'=>'Create OperaCodep', 'url'=>array('create')),
	array('label'=>'View OperaCodep', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OperaCodep', 'url'=>array('admin')),
);
?>

<h1>Update OperaCodep <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>