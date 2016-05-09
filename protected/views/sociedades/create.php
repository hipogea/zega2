<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */

$this->breadcrumbs=array(
	'Sociedades'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Sociedades', 'url'=>array('index')),
	array('label'=>'Sociedades', 'url'=>array('admin')),
);
?>

<h1>Crear Sociedad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>