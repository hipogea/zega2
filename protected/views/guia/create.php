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


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>