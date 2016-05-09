<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */

$this->breadcrumbs=array(
	'Pescaterceroses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pescaterceros', 'url'=>array('index')),
	array('label'=>'Manage Pescaterceros', 'url'=>array('admin')),
);
?>

<h1>Create Pescaterceros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>