<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */

$this->breadcrumbs=array(
	'Coordocs'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Listado reportes', 'url'=>array('admin')),
);
?>

<h1>Crear Reporte</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>