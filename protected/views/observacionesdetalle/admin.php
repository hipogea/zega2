<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'observacionesdetalle-grid',
	'dataProvider'=>$proveedorobs,
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'hidobservaciones',
		'comentario',
		'usuario',
		'fecha',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
