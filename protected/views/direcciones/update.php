<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */

$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	$model->n_direc=>array('view','id'=>$model->n_direc),
	'Update',
);


?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'codigoproveedor'=>$codigoproveedor)); ?>