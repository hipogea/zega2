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



<?php echo $this->renderPartial('_form', array(
					'model'=>$model,'modeloinventario'=>$modeloinventario,'misfotos'=>$misfotos,'ruta'=>Yii::app()->params['rutafotosinventario_'],'fot'=>$fot,
					)); ?>