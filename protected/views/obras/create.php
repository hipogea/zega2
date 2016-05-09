<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obrases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Obras', 'url'=>array('index')),
	array('label'=>'Manage Obras', 'url'=>array('admin')),
);
?>

<h1>Create Obras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>