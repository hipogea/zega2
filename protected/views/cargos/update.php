<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargoses'=>array('index'),
	$model->cnumcargo=>array('view','id'=>$model->cnumcargo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cargos', 'url'=>array('index')),
	array('label'=>'Create Cargos', 'url'=>array('create')),
	array('label'=>'View Cargos', 'url'=>array('view', 'id'=>$model->cnumcargo)),
	array('label'=>'Manage Cargos', 'url'=>array('admin')),
);
?>

<h1>Update Cargos <?php echo $model->cnumcargo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>