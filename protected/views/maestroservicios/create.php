<?php
/* @var $this MaestroserviciosController */
/* @var $model Maestroservicios */



$this->menu=array(
	//array('label'=>'List Maestroservicios', 'url'=>array('index')),
	array('label'=>'Listado servicios', 'url'=>array('admin')),
);
?>


	<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."hammer.png");?> Crear servicio maestro</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>