<?php
/* @var $this ContactosController */
/* @var $model Contactos */

$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Contactos', 'url'=>array('index')),
	array('label'=>'Contactos', 'url'=>array('admin')),
);
?>

<h1>Crear Contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>