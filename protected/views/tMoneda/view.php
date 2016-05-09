<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	$model->codmoneda,
);

$this->menu=array(
	array('label'=>'List TMoneda', 'url'=>array('index')),
	array('label'=>'Create TMoneda', 'url'=>array('create')),
	array('label'=>'Update TMoneda', 'url'=>array('update', 'id'=>$model->codmoneda)),
	array('label'=>'Delete TMoneda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codmoneda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TMoneda', 'url'=>array('admin')),
);
?>

<h1>View TMoneda #<?php echo $model->codmoneda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codmoneda',
		'simbolo',
		'desmon',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
