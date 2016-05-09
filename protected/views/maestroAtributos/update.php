<?php
/* @var $this MaestroAtributosController */
/* @var $model MaestroAtributos */

$this->breadcrumbs=array(
	'Maestro Atributoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaestroAtributos', 'url'=>array('index')),
	array('label'=>'Create MaestroAtributos', 'url'=>array('create')),
	array('label'=>'View MaestroAtributos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MaestroAtributos', 'url'=>array('admin')),
);
?>

<h1>Update MaestroAtributos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>