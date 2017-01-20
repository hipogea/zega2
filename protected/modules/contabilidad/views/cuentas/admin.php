<?php
/* @var $this CuentasController */
/* @var $model Cuentas */

$this->breadcrumbs=array(
	'Cuentases'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Crear cuenta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cuentas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?PHP  
MiFactoria::titulo('Plan Contable', 'gear.png')
?>



<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuentas-grid',
	'dataProvider'=>$model->search(),
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'codcuenta',
		'descuenta',
		'clase',
		//'contrapartida',
		'grupo',
		'codigo',
		/*
		'n2',
		'n3',
		'registro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
$this->renderExportGridButton($gridWidget,'Exportar resultados',array('class'=>'btn btn-info pull-right'));
?>