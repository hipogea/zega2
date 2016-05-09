<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */

$this->breadcrumbs=array(
	'Sociedades'=>array('index'),
	$model->socio=>array('view','id'=>$model->socio),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Sociedades', 'url'=>array('index')),
	array('label'=>'Crear Sociedad', 'url'=>array('create')),
	//array('label'=>'View Sociedades', 'url'=>array('view', 'id'=>$model->socio)),
	array('label'=>'Sociedades', 'url'=>array('admin')),
);
?>

<h1>Modificar Sociedad <?php echo $model->socio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>