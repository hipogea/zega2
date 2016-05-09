<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */

$this->breadcrumbs=array(
	'Temporadases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Temporadas', 'url'=>array('index')),
	array('label'=>'Manage Temporadas', 'url'=>array('admin')),
);
?>

<h1>Create Temporadas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>