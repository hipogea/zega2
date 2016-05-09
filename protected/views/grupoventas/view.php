<?php
/* @var $this GrupoventasController */
/* @var $model Grupoventas */

$this->breadcrumbs=array(
	'Grupoventases'=>array('index'),
	$model->codgrupo,
);

$this->menu=array(
	array('label'=>'List Grupoventas', 'url'=>array('index')),
	array('label'=>'Create Grupoventas', 'url'=>array('create')),
	array('label'=>'Update Grupoventas', 'url'=>array('update', 'id'=>$model->codgrupo)),
	array('label'=>'Delete Grupoventas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codgrupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupoventas', 'url'=>array('admin')),
);
?>

<h1>View Grupoventas #<?php echo $model->codgrupo; ?></h1>

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
