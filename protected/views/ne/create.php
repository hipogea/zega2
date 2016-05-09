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
<div>
<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'caja.png',"hola",array('width'=>'50','height'=>'50')); ?>Recepcion</h1>

</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>