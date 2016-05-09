

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mot-mat-det-grid',
	'dataProvider'=>$model->search_pedido($conector),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'hidmot',
		'item',
		'codigo',
		'descripcion',
		'maestrito.descripcion',
		'obs',
		/*
		'um',
		'codigoequipo',
		'creadopor',
		'creadoel',
		'modificadoel',
		'modificadopor',
		'estado',
		'codocu',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
