<?php
/* @var $this UmsController */
/* @var $model Ums */

$this->breadcrumbs=array(
	'Ums'=>array('index'),
	$model->um=>array('view','id'=>$model->um),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Ums', 'url'=>array('index')),
	array('label'=>'Crear Unidad', 'url'=>array('create')),
	//array('label'=>'View Ums', 'url'=>array('view', 'id'=>$model->um)),
	array('label'=>'Unidades', 'url'=>array('admin')),
);
?>

<h1>Modificar  <?php echo $model->desum; ?></h1>

<?php  echo $this->renderPartial('_form', array('model'=>$model)); ?>