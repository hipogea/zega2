<?php
/* @var $this TipoproductoController */
/* @var $model VentasTipoproducto */

$this->breadcrumbs=array(
	'Ventas Tipoproductos'=>array('index'),
	$model->codtipo=>array('view','id'=>$model->codtipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List VentasTipoproducto', 'url'=>array('index')),
	array('label'=>'Create VentasTipoproducto', 'url'=>array('create')),
	array('label'=>'View VentasTipoproducto', 'url'=>array('view', 'id'=>$model->codtipo)),
	array('label'=>'Manage VentasTipoproducto', 'url'=>array('admin')),
);
?>

<h1>Update VentasTipoproducto <?php echo $model->codtipo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>