<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parametroses'=>array('index'),
	$model->codparam=>array('view','id'=>$model->codparam),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parametros', 'url'=>array('index')),
	array('label'=>'Create Parametros', 'url'=>array('create')),
	array('label'=>'View Parametros', 'url'=>array('view', 'id'=>$model->codparam)),
	array('label'=>'Manage Parametros', 'url'=>array('admin')),
);
?>

<h1>Update Parametros <?php echo $model->codparam; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>