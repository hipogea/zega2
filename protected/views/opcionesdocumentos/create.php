<?php
/* @var $this OpcionesdocumentosController */
/* @var $model Opcionesdocumentos */

$this->breadcrumbs=array(
	'Opcionesdocumentoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opcionesdocumentos', 'url'=>array('index')),
	array('label'=>'Manage Opcionesdocumentos', 'url'=>array('admin')),
);
?>

<h1>Create Opcionesdocumentos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>