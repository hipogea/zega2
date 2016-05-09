<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */

$this->breadcrumbs=array(
	'Objetos Clientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar objeto  <?php echo $model->descripcionobjeto; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>