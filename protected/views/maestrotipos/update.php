<?php
/* @var $this MaestrotiposController */
/* @var $model Maestrotipos */

$this->breadcrumbs=array(
	'Maestrotiposes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Maestrotipos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Maestrotipos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado de Tipos', 'url'=>array('admin')),
);
?>

<h1>Actualizar tipo de material  <?php echo $model->codtipo." : ".$model->destipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>