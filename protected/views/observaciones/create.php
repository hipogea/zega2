<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Observaciones', 'url'=>array('index')),
	array('label'=>'Manage Observaciones', 'url'=>array('admin')),
);
?>

<h1>Hacer una  Observacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modeloinventario'=>$modeloinventario,
	//'misfotos'=>$misfotos,'ruta'=>Yii::app()->params['rutafotosinventario_'],'fot'=>$fot
)); ?>