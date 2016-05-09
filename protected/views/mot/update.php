<?php
/* @var $this MotController */
/* @var $model Mot */

$this->breadcrumbs=array(
	'Mots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mot', 'url'=>array('index')),
	array('label'=>'Create Mot', 'url'=>array('create')),
	array('label'=>'View Mot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Mot', 'url'=>array('admin')),
);
?>

<h1>Actualizar pedido <?php echo $model->numero; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'naleatorio'=>$naleatorio)); ?>