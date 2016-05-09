<?php
/* @var $this GuiaController */
/* @var $model Guia */

$this->breadcrumbs=array(
	'Guias'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Guia', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'carro.png',"hola",array('width'=>'60','height'=>'30')); ?>Crear Doc Transporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>