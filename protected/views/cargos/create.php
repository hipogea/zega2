<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cargos', 'url'=>array('index')),
	array('label'=>'Manage Cargos', 'url'=>array('admin')),
);
?>

<h1>Create Cargos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>