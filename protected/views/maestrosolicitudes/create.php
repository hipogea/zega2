<?php
/* @var $this MaestrosolicitudesController */
/* @var $model Maestrosolicitudes */

$this->breadcrumbs=array(
	'Maestrosolicitudes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Maestrosolicitudes', 'url'=>array('index')),
	array('label'=>'Ver  solicitudes', 'url'=>array('admin')),
);
?>

<h1>Crear solicitud de apertura </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>