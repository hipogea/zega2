<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	$model->codlugar,
);

$this->menu=array(
	//array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->codlugar)),
	//array('label'=>'Delete Lugares', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codlugar),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lugares', 'url'=>array('admin')),
);
?>

<h1>View Lugares #<?php echo $model->codlugar; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codlugar',
		'deslugar',
		'provincia',
		'claselugar',
		'codpro',
		'n_direc',
	),
)); ?>
