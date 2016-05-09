<?php
/* @var $this GrupocomprasController */
/* @var $model Grupocompras */

$this->breadcrumbs=array(
	'Grupocomprases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grupocompras', 'url'=>array('index')),
	array('label'=>'Manage Grupocompras', 'url'=>array('admin')),
);
?>

<h1>Create Grupocompras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>