<?php
/* @var $this MaestroValoresController */
/* @var $model MaestroValores */

$this->breadcrumbs=array(
	'Maestro Valores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MaestroValores', 'url'=>array('index')),
	array('label'=>'Manage MaestroValores', 'url'=>array('admin')),
);
?>

<h1>Create MaestroValores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>