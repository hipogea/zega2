<?php
/* @var $this MaestrotiposController */
/* @var $model Maestrotipos */

$this->breadcrumbs=array(
	'Maestrotiposes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Maestrotipos', 'url'=>array('index')),
	array('label'=>'Listado de Tipos', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de material</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>