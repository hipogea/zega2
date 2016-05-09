<?php
/* @var $this CoordreporteController */
/* @var $model Coordreporte */

$this->breadcrumbs=array(
	'Coordreportes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coordreporte', 'url'=>array('index')),
	array('label'=>'Create Coordreporte', 'url'=>array('create')),
	array('label'=>'Update Coordreporte', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coordreporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coordreporte', 'url'=>array('admin')),
);
?>

<h1>View Coordreporte #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'left_',
		'top',
		'font_size',
		'font_family',
		'font_weight',
		'font_color',
		'nombre_campo',
		'lbl_left',
		'lbl_top',
		'lbl_font_size',
		'lbl_font_weight',
		'lbl_font_family',
		'lbl_font_color',
		'visiblelabel',
		'visiblecampo',
	),
)); ?>
