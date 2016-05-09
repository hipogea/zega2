<?php
/* @var $this GrupoventasController */
/* @var $model Grupoventas */

$this->breadcrumbs=array(
	'Grupoventases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grupoventas', 'url'=>array('index')),
	array('label'=>'Manage Grupoventas', 'url'=>array('admin')),
);
?>

<h1>Create Grupoventas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>