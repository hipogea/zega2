<?php
/* @var $this OpcionescamposdocuController */
/* @var $model Opcionescamposdocu */

$this->breadcrumbs=array(
	'Opcionescamposdocus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opcionescamposdocu', 'url'=>array('index')),
	array('label'=>'Create Opcionescamposdocu', 'url'=>array('create')),
	array('label'=>'View Opcionescamposdocu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Opcionescamposdocu', 'url'=>array('admin')),
);
?>

<h1>Update Opcionescamposdocu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>