<?php


$this->menu=array(
	//array('label'=>'List Eventos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#eventos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'eventos-grid',
	'dataProvider'=>$model->search(),
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'desdocu',
		'estadoinicial',
		'estadofinal',
		'descripcion',
		'codocu',
		'einicial',		
		'efinal',		
		array('name'=>'id','header'=>'Editar','type'=>'raw','value'=>'CHtml::link("Editar",array("/eventos/update", "id"=>$data->id)); '),
		
		
	),
)); ?>

