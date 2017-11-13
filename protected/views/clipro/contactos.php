<?php
/* @var $this ContactosController */
/* @var $model Contactos */

$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contactos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Contactos</h1>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search2',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contactos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'id','header'=>'.','type'=>'raw', 'value'=>'CHtml::link(\'Editar\', array(\'/contactos/update\', \'id\'=>$data->id))','htmlOptions'=>array('width'=>20)),
		//'id',
		//'c_hcod',
		ARRAY('name'=>'c_nombre','header'=>'Nombres','value'=>'$data->c_nombre','htmlOptions'=>array('width'=>300)),
		ARRAY('name'=>'despro','header'=>'Empresa','value'=>'$data->despro','htmlOptions'=>array('width'=>300)),
		//'despro',
		//'c_cargo',
		'c_tel',
		'c_mail',
		
		//'creadopor',
		/*
		'creadoel',
		'modificadopor',
		'modificadoel',
		'correlativo',
		'fecnacimiento',
		'calificacion',
		'id',
		*/
		
	),
)); ?>
