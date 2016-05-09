<?php
/* @var $this MotController */
/* @var $model Mot */

$this->breadcrumbs=array(
	'Pedidos de materiales'=>array('index'),
	'Crear solicitud',
);

$this->menu=array(
	//array('label'=>'List Mot', 'url'=>array('index')),
	array('label'=>'Ver Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Crear Solicitud</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'naleatorio'=>$naleatorio)); ?>