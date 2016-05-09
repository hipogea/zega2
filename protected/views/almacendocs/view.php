<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */

$this->breadcrumbs=array(
	'Almacendocs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Almacendocs', 'url'=>array('index')),
	array('label'=>'Create Almacendocs', 'url'=>array('create')),
	array('label'=>'Update Almacendocs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Almacendocs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Almacendocs', 'url'=>array('admin')),
);
?>

<h1>View Almacendocs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fechavale',
		'creadopor',
		'modificadopor',
		'creadoel',
		'modificadoel',
		'codmovimiento',
		'numvale',
		'codtipovale',
		'codtrabajador',
		'codalmacen',
		'codcentro',
		'cestadovale',
		'correlativo',
		'codocu',
		'id',
		'fechacont',
		'fechacre',
		'numdocref',
		'posic',
		'codocuref',
	),
)); ?>
