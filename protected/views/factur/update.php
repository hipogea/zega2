<?php
/* @var $this FacturController */
/* @var $model Factur */

$this->breadcrumbs=array(
	'Facturs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Factur', 'url'=>array('index')),
	array('label'=>'Create Factur', 'url'=>array('create')),
	array('label'=>'View Factur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Factur', 'url'=>array('admin')),
);
?>

<h1>Update Factur <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>