<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Noticias', 'url'=>array('index')),
	array('label'=>'Create Noticias', 'url'=>array('create')),
	array('label'=>'Update Noticias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Noticias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Noticias', 'url'=>array('admin')),
);
?>

<h1>Ver Noticia</h1>

<?php echo $this->renderPartial('_view', array('model'=>$model)); ?>
