<?php
/* @var $this MaestrogruposController */
/* @var $model Maestrogrupos */

$this->breadcrumbs=array(
	'Maestrogruposes'=>array('index'),
	$model->codgrupo,
);

$this->menu=array(
	//array('label'=>'List Maestrogrupos', 'url'=>array('index')),
	array('label'=>'Crear grupo', 'url'=>array('create')),
	array('label'=>'Actualizar grupo', 'url'=>array('update', 'id'=>$model->codgrupo)),
	//array('label'=>'Delete Maestrogrupos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codgrupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Grupos', 'url'=>array('admin')),
);
?>

<h1>Grupo #<?php echo $model->descri1; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codgrupo',
		'descri1',
		
	),
)); ?>
