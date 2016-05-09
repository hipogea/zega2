
<h1>Maestro de materiales</h1>




<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maestrocompo-grid',
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codigo',
		'descripcion',
		'marca',
		'modelo',
		'nparte',
		'codpadre',
		'um',
		/*
		'descripcion',
		'detalle',
		'modificadopor',
		'modificadoel',
		'creadoel',
		'creadopor',
		'clase',
		'codmaterial',
		'flag',
		'codtipo',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
