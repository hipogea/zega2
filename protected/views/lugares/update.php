<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	$model->codlugar=>array('view','id'=>$model->codlugar),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Lugares', 'url'=>array('view', 'id'=>$model->codlugar)),
	array('label'=>'Lugares', 'url'=>array('admin')),
);
?>

<h1>Update Lugares <?php echo $model->codlugar; ?></h1>

<?php echo $this->renderPartial('_form_crear', array('model'=>$model)); ?>