<?php
/* @var $this MaestroValoresController */
/* @var $model MaestroValores */

$this->breadcrumbs=array(
	'Maestro Valores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaestroValores', 'url'=>array('index')),
	array('label'=>'Create MaestroValores', 'url'=>array('create')),
	array('label'=>'View MaestroValores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MaestroValores', 'url'=>array('admin')),
);
?>

<h1>Update MaestroValores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>