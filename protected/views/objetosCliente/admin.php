<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */

$this->breadcrumbs=array(
	'Objetos Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#objetos-cliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Objetos tecnicos</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'objetos-cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codpro',
		'codobjeto',
		'nombreobjeto',
		'descripcionobjeto',
		'tipoobjeto',
		'estado',
		/*
		'creadoel',
		'modificadopor',
		'modificadoel',
		'creadopor',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
