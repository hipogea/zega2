<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */

$this->breadcrumbs=array(
	'Masterequipos'=>array('index'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Masterequipo', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear equipo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>