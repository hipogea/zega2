<?php
/* @var $this CargamasivaController */
/* @var $model Cargamasiva */

$this->breadcrumbs=array(
	'Cargamasivas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cargamasiva', 'url'=>array('index')),
	array('label'=>'Create Cargamasiva', 'url'=>array('create')),
	array('label'=>'View Cargamasiva', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cargamasiva', 'url'=>array('admin')),
);
?>

<h1>Actualizar  Cargamasiva <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>