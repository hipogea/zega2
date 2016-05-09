<?php
/* @var $this DocumentosController */
/* @var $model Documentos */

$this->breadcrumbs=array(
	'Documentoses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	array('label'=>'Documentos', 'url'=>array('admin')),
);
?>

<h1>Crear Documento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>