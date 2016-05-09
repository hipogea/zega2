<?php
/* @var $this MaestroserviciosController */
/* @var $model Maestroservicios */



$this->menu=array(
//	array('label'=>'List Maestroservicios', 'url'=>array('index')),
	array('label'=>'Crear servicio maestro', 'url'=>array('create')),
	//array('label'=>'View Maestroservicios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado de servicios', 'url'=>array('admin')),
);
?>


	<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."hammer.png");?> Editar maestro servicios</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>