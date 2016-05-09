<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Manage Lugares', 'url'=>array('admin')),
);
?>


<?php echo $this->renderPartial('_form_crear', array('model'=>$model)); ?>