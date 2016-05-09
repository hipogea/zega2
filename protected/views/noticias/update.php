<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Tablon', 'url'=>array('admin')),
	array('label'=>'Pendientes', 'url'=>array('Adminusuariopendientes')),
	array('label'=>'Mis avisos y otros', 'url'=>array('useryaprobados')),
	array('label'=>'Avisos publicados', 'url'=>array('todosdeltablon')),
);
?>

<h1>Update Noticias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>