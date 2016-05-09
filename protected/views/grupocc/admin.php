<?php
/* @var $this GrupoccController */
/* @var $model Grupocc */

$this->breadcrumbs=array(
	'Grupoccs'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Grupocc', 'url'=>array('index')),
	array('label'=>'CreaR Grupo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grupocc-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Grupos de Colectores','package'); ?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grupocc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codgrupo',
		'codclase',
		'desgrupo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
