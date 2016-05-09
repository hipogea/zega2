<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $model Maestrosolicitudescabecera */

$this->breadcrumbs=array(
	'Maestrosolicitudescabeceras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Maestrosolicitudescabecera', 'url'=>array('index')),
	array('label'=>'Create Maestrosolicitudescabecera', 'url'=>array('create')),
	array('label'=>'View Maestrosolicitudescabecera', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Maestrosolicitudescabecera', 'url'=>array('admin')),
);
?>

<h1>Update Maestrosolicitudescabecera <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>