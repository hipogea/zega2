<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */

$this->breadcrumbs=array(
	'Temporadases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Ver Temporadas', 'url'=>array('admin')),
);
?>

<h1>Modifica temporada </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>