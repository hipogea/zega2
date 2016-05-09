<?php
/* @var $this ValoracionController */
/* @var $model Catvaloracion */

$this->breadcrumbs=array(
	'Catvaloracions'=>array('index'),
	$model->codcatval=>array('view','id'=>$model->codcatval),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catvaloracion', 'url'=>array('index')),
	array('label'=>'Create Catvaloracion', 'url'=>array('create')),
	array('label'=>'View Catvaloracion', 'url'=>array('view', 'id'=>$model->codcatval)),
	array('label'=>'Manage Catvaloracion', 'url'=>array('admin')),
);
?>

<h1>Update Catvaloracion <?php echo $model->codcatval; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>