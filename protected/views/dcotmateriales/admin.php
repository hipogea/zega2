

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dcotmateriales-grid',
	'dataProvider'=>Dcotmateriales::model()->search_($idcoti),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'numcot',
		'codart',
		'disp',
		'cant',
		'punit',
		/*
		'item',
		'descri',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'stock',
		'detalle',
		'tipoitem',
		'estadodetalle',
		'coddocu',
		'um',
		'hidguia',
		'codservicio',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
