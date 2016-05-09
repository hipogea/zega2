<?php
/* @var $this ClasesmaestroController */
/* @var $model Clasesmaestro */

$this->breadcrumbs=array(
	'Clasesmaestros'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Clasesmaestro', 'url'=>array('index')),
	array('label'=>'Clases', 'url'=>array('admin')),
);
?>

<h1>Crear Clase</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>