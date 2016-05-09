<?php
/* @var $this CargamasivaController */
/* @var $model Cargamasiva */

$this->breadcrumbs=array(
	'Cargamasivas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cargamasiva', 'url'=>array('index')),
	array('label'=>'Manage Cargamasiva', 'url'=>array('admin')),
);
?>

<h1>Crear plantilla</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>