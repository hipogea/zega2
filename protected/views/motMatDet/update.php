<?php
/* @var $this MotMatDetController */
/* @var $model MotMatDet */

$this->breadcrumbs=array(
	'Mot Mat Dets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MotMatDet', 'url'=>array('index')),
	array('label'=>'Create MotMatDet', 'url'=>array('create')),
	array('label'=>'View MotMatDet', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MotMatDet', 'url'=>array('admin')),
);
?>

<h1>Actualizar item <?php echo $model->item; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'naleatorio'=>$naleatorio),true); ?>