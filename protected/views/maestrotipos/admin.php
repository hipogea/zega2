<div class="division">

<?php
/* @var $this MaestrotiposController */
/* @var $model Maestrotipos */

$this->breadcrumbs=array(
	'Maestrotiposes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('Create')),
	//array('label'=>'Create Maestrotipos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#maestrotipos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Tipos de materiales</h1>


<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maestrotipos-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		//'id',
		'codtipo',
		'destipo',
		array(
			'template'=>'{view}{update}',
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div><!-- panel division -->
