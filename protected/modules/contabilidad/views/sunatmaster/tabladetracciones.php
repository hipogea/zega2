<?PHP  
MiFactoria::titulo('Tabla de detracciones', 'check16')
?>



<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detracciones-grid',
	'dataProvider'=>$model->search(),
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codigo',
		'descripcion',
		array('name'=>'texto','value'=>'$data->texto'),
		//'contrapartida',
		//'grupo',
		'tasa',
		/*
		'n2',
		'n3',
		'registro',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>