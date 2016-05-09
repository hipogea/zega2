<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Areases'=>array('index'),
	$model->codarea=>array('view','id'=>$model->codarea),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear Area', 'url'=>array('create')),

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Modificar Area   :  <?php echo $model->codarea; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>