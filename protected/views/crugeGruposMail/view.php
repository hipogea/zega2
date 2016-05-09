<?php
/* @var $this CrugeGruposMailController */
/* @var $model CrugeGruposMail */

$this->breadcrumbs=array(
	'Cruge Grupos Mails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CrugeGruposMail', 'url'=>array('index')),
	array('label'=>'Create CrugeGruposMail', 'url'=>array('create')),
	array('label'=>'Update CrugeGruposMail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CrugeGruposMail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CrugeGruposMail', 'url'=>array('admin')),
);
?>

<h1>View CrugeGruposMail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'desgrupo',
		'deslarga',
	),
)); ?>
