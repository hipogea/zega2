<?php
/* @var $this MaestrogruposController */
/* @var $model Maestrogrupos */

$this->breadcrumbs=array(
	'Maestrogruposes'=>array('index'),
	$model->codgrupo=>array('view','id'=>$model->codgrupo),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Maestrogrupos', 'url'=>array('index')),
	array('label'=>'Crear Grupo', 'url'=>array('create')),
	//array('label'=>'View Maestrogrupos', 'url'=>array('view', 'id'=>$model->codgrupo)),
	array('label'=>'Grupos', 'url'=>array('admin')),
);
?>

<h1>Actualizar grupo <?php echo $model->codgrupo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>