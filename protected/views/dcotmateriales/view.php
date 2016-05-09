<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */

$this->breadcrumbs=array(
	'Dcotmateriales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dcotmateriales', 'url'=>array('index')),
	array('label'=>'Create Dcotmateriales', 'url'=>array('create')),
	array('label'=>'Update Dcotmateriales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dcotmateriales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dcotmateriales', 'url'=>array('admin')),
);
?>

<h1>View Dcotmateriales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numcot',
		'codart',
		'disp',
		'cant',
		'punit',
		'item',
		'descri',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'stock',
		'detalle',
		'tipoitem',
		'estadodetalle',
		'coddocu',
		'um',
		'hidguia',
		'codservicio',
	),
)); ?>
