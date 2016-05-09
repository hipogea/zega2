<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */

$this->breadcrumbs=array(
	'Cmotivos'=>array('index'),
	$model->codmotivo,
);

$this->menu=array(
	array('label'=>'List CMotivo', 'url'=>array('index')),
	array('label'=>'Create CMotivo', 'url'=>array('create')),
	array('label'=>'Update CMotivo', 'url'=>array('update', 'id'=>$model->codmotivo)),
	array('label'=>'Delete CMotivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codmotivo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CMotivo', 'url'=>array('admin')),
);
?>

<h1>View CMotivo #<?php echo $model->codmotivo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codmotivo',
		'desmotivo',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
