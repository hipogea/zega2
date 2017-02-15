<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */

$this->breadcrumbs=array(
	'Objetos Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('creaequipo')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#equipos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Listado de Equipos', 'basket')  ?>




<div class="search-form" >
<?php $this->renderPartial('_searchequipo',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'equipos-grid',
      'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
            array('name'=>'id','header'=>'Numero','type'=>'raw','value'=>'CHtml::link($data->id,yii::app()->createurl("ObjetosCliente/modificaequipo",array("id"=>$data->id)),array("target"=>"_blank"))'),
		'codpro',
            'despro',
		'codobjeto',
		'nombreobjeto',
		'descripcion',
		//'tipoobjeto',
		//'estado',
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
