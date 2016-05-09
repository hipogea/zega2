<?php
/* @var $this DetguiController */
/* @var $model Detgui */

$this->breadcrumbs=array(
	'Detguis'=>array('index'),
	$model->n_detgui,
);

$this->menu=array(
	array('label'=>'List Detgui', 'url'=>array('index')),
	array('label'=>'Create Detgui', 'url'=>array('create')),
	array('label'=>'Update Detgui', 'url'=>array('update', 'id'=>$model->n_detgui)),
	array('label'=>'Delete Detgui', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_detgui),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Detgui', 'url'=>array('admin')),
);
?>

<h1>View Detgui #<?php echo $model->n_detgui; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_hguia',
		'c_itguia',
		'n_cangui',
		'c_codgui',
		'c_edgui',
		'c_descri',
		'm_obs',
		'c_um',
		'c_codep',
		'ndeenvio',
		'n_detgui',
		'l_libre',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'n_hconformidad',
		'c_estado',
		'n_libre',
		'n_idconformidad',
		'c_af',
		'c_codactivo',
		'c_img',
		'c_codsap',
		'docref',
		'docrefext',
		'hidref',
		'codocu',
	),
)); ?>
