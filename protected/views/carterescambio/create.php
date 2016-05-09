<?php
/* @var $this CarterescambioController */
/* @var $model Carterescambio */

$this->breadcrumbs=array(
	'Carterescambios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Carterescambio', 'url'=>array('index')),
	array('label'=>'Manage Carterescambio', 'url'=>array('admin')),
);
?>

<h1>Create Carterescambio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>