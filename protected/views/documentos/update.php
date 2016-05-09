<?php
/* @var $this DocumentosController */
/* @var $model Documentos */

$this->breadcrumbs=array(
	'Documentoses'=>array('index'),
	$model->coddocu=>array('view','id'=>$model->coddocu),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	array('label'=>'Crear Documento', 'url'=>array('create')),
	//array('label'=>'View Documentos', 'url'=>array('view', 'id'=>$model->coddocu)),
	array('label'=>'Documentos', 'url'=>array('admin')),
);
?>

<h1>Editar Documento <?php echo $model->coddocu; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>