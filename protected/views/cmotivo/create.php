<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */

$this->breadcrumbs=array(
	'Cmotivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CMotivo', 'url'=>array('index')),
	array('label'=>'Manage CMotivo', 'url'=>array('admin')),
);
?>

<h1>Create CMotivo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>