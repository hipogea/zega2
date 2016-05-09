<?php
/* @var $this OpcionesdocumentosController */
/* @var $model Opcionesdocumentos */

$this->breadcrumbs=array(
	'Opcionesdocumentoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opcionesdocumentos', 'url'=>array('index')),
	array('label'=>'Create Opcionesdocumentos', 'url'=>array('create')),
	array('label'=>'View Opcionesdocumentos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Opcionesdocumentos', 'url'=>array('admin')),
);
?>

<h1>Update Opcionesdocumentos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>