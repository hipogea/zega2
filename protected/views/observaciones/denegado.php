<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Ver observaciones', 'url'=>array('admin')),
);
?>



<?php echo "No puede modificar una observacion de otro usuario"; ?>