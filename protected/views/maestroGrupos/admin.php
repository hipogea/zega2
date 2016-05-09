<?php
/* @var $this MaestrogruposController */
/* @var $model Maestrogrupos */

$this->breadcrumbs=array(
	'Maestrogruposes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Maestrogrupos', 'url'=>array('index')),
	array('label'=>'Crear Grupo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#maestrogrupos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maestrogrupos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codgrupo',
		'descri1',
		//'descri2',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
