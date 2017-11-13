<?php
/* @var $this TrabajadoresController */
/* @var $model Trabajadores */

$this->breadcrumbs=array(
	'Trabajadores'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Trabajadores', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('trabajadores-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Trabajadores</h1>


<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trabajadores-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'codigotra',
		'ap',
		'am',
		'nombres',
		'dni',
		'codpuesto',

		//'oficio.oficio',
		array('name'=>'oficios_oficio','value'=>'$data->oficio->oficio'),
		//array('name'=>'iduser','value'=>'yii::app()->user->um->LoadUserById($data->iduser)->username'),
		/*
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		*/
		array(
			'htmlOptions'=>array('width'=>120),
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',

		),
	),
)); ?>
