<?php
/* @var $this FondofijoController */
/* @var $model Fondofijo */

$this->breadcrumbs=array(
	'Fondofijos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Fondofijo', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Fondofijo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Editar fondo fijo    <?php echo $model->desfondo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelito'=>$modelito)); ?>