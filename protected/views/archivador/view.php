<?php
/* @var $this ArchivadorController */
/* @var $model Archivador */

$this->breadcrumbs=array(
	'Archivadors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Archivador', 'url'=>array('index')),
	array('label'=>'Create Archivador', 'url'=>array('create')),
	array('label'=>'Update Archivador', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Archivador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Archivador', 'url'=>array('admin')),
);
?>

<h1>View Archivador #<?php echo $model->id; ?></h1>

<?php
echo $_GET['rutita'];

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'desarchivo',
		'obsarchivo',
		'fechasubida',
		'ndescargas',
		'autor',
		'nombre',
		'peso',
	),
)); ?>
