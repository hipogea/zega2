<?php
/* @var $this BorrarController */
/* @var $model Borrar */

$this->breadcrumbs=array(
	'Borrars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Borrar', 'url'=>array('index')),
	array('label'=>'Manage Borrar', 'url'=>array('admin')),
);
?>

<h1>Create Borrar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>