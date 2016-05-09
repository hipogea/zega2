<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $model Maestrosolicitudescabecera */

$this->breadcrumbs=array(
	'Maestrosolicitudescabeceras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Maestrosolicitudescabecera', 'url'=>array('index')),
	array('label'=>'Manage Maestrosolicitudescabecera', 'url'=>array('admin')),
);
?>

<h1>Create Maestrosolicitudescabecera</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>