<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */

$this->breadcrumbs=array(
	'Cc Gastoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CcGastos', 'url'=>array('index')),
	array('label'=>'Create CcGastos', 'url'=>array('create')),
	array('label'=>'View CcGastos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CcGastos', 'url'=>array('admin')),
);
?>

<h1>Update CcGastos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>