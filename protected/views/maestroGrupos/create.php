<?php
/* @var $this MaestrogruposController */
/* @var $model Maestrogrupos */

$this->breadcrumbs=array(
	'Maestrogruposes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Maestrogrupos', 'url'=>array('index')),
	array('label'=>'Grupos', 'url'=>array('admin')),
);
?>

<h1>Crear grupo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>