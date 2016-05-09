<?php
/* @var $this CcController */
/* @var $model Cc */

$this->breadcrumbs=array(
	'Ccs'=>array('index'),
	$model->codc=>array('view','id'=>$model->codc),
	'Update',
);

$this->menu=array(
	
	array('label'=>'Crear', 'url'=>array('create')),
	
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar centro de costo   <?php echo $model->codc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>