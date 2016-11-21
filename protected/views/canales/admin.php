<?php
/* @var $this CanalesController */
/* @var $model Canales */

$this->breadcrumbs=array(
	'Canales'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Canales', 'url'=>array('index')),
	array('label'=>'Crear Canal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#canales-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Canales de transporte','camion');?>


<?php echo CHtml::link('Filtra','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="division">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'canales-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'codcanal',
		'canal',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>


<?php
$this->widget('CTreeView',array(
    'id'=>'menu-treeview',
    'data'=>Menu::model()->getTreeItems(),
    'control'=>'#treecontrol',
    'animated'=>'fast',
    'collapsed'=>true,
    'htmlOptions'=>array(
        'class'=>'filetree'
    )
));



$this->widget('CTreeView',array(
    'id'=>'unit-treeview',
    'url'=>array('request/fillTree'),
    'htmlOptions'=>array(
        'class'=>'treeview-red'
    )
));






?>