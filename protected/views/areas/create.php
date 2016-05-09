<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Areases'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Area</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>