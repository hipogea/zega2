<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->breadcrumbs=array(
	'Noticiases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Tablon', 'url'=>array('admin')),
	array('label'=>'Publicar', 'url'=>array('solicita')),
	array('label'=>'Mis avisos Pendientes', 'url'=>array('adminusuariopendientes')),
	array('label'=>'Mis avisos y otros', 'url'=>array('useryaprobados')),
	array('label'=>'Todos del tablon', 'url'=>array('todosdeltablon')),
);
?>
<h1>Create Noticias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>