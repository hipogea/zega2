<?php
/* @var $this IgvController */
/* @var $model Igv */

$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	array('label'=>'Impuestos', 'url'=>array('admin')),
);
?>

<h1>Crear Impuesto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>