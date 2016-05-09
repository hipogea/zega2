<?php
/* @var $this DocumentosfavoritosController */
/* @var $model Documentosfavoritos */

$this->breadcrumbs=array(
	'Documentosfavoritoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar listado favorito :    <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>