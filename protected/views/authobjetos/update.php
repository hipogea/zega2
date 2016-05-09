<?php
/* @var $this AuthobjetosController */
/* @var $model Authobjetos */

$this->breadcrumbs=array(
	'Authobjetoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Authobjetos', 'url'=>array('index')),
	array('label'=>'Create Authobjetos', 'url'=>array('create')),
	array('label'=>'View Authobjetos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Authobjetos', 'url'=>array('admin')),
);
?>

<h1>Update Authobjetos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario)); ?>