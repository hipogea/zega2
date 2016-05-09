<?php
/* @var $this GrupocomprasController */
/* @var $model Grupocompras */

$this->breadcrumbs=array(
	'Grupocomprases'=>array('index'),
	$model->codgrupo,
);

$this->menu=array(
	array('label'=>'List Grupocompras', 'url'=>array('index')),
	array('label'=>'Create Grupocompras', 'url'=>array('create')),
	array('label'=>'Update Grupocompras', 'url'=>array('update', 'id'=>$model->codgrupo)),
	array('label'=>'Delete Grupocompras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codgrupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupocompras', 'url'=>array('admin')),
);
?>

<h1>View Grupocompras #<?php echo $model->codgrupo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codgrupo',
		'codalm',
		'nomgru',
		'desgru',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codsociedad',
	),
)); ?>
