<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */

$this->breadcrumbs=array(
	'Objetos Clientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete ObjetosCliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View ObjetosCliente #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codpro',
		'codobjeto',
		'nombreobjeto',
		'descripcionobjeto',
		'tipoobjeto',
		'estado',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'creadopor',
		'id',
	),
)); ?>
