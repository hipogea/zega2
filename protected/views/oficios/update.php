<?php
/* @var $this OficiosController */
/* @var $model Oficios */

$this->breadcrumbs=array(
	'Oficioses'=>array('index'),
	$model->codof=>array('view','id'=>$model->codof),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Oficios', 'url'=>array('index')),
	array('label'=>'Crear Oficio', 'url'=>array('create')),
	//array('label'=>'View Oficios', 'url'=>array('view', 'id'=>$model->codof)),
	array('label'=>'Oficios', 'url'=>array('admin')),
);
?>

<h1>Modificar oficio <?php echo $model->codof; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>