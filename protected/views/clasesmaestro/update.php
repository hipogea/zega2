<?php
/* @var $this ClasesmaestroController */
/* @var $model Clasesmaestro */

$this->breadcrumbs=array(
	'Clasesmaestros'=>array('index'),
	$model->codclasema=>array('view','id'=>$model->codclasema),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Clasesmaestro', 'url'=>array('index')),
	array('label'=>'Crear Clase', 'url'=>array('create')),
	//array('label'=>'View Clasesmaestro', 'url'=>array('view', 'id'=>$model->codclasema)),
	array('label'=>'Clases', 'url'=>array('admin')),
);
?>

<h1>Actualizar clase <?php echo $model->codclasema; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>