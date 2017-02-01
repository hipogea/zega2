<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */

$this->breadcrumbs=array(
	'Cmotivos'=>array('index'),
	$model->codmotivo=>array('view','id'=>$model->codmotivo),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->codmotivo)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Editar motivo  de transporte ','package') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>