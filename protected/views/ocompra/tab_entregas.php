<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-gridx',
	//'dataProvider'=>Alentregas::model()->search_por_detcompra($filtro),
	'dataProvider'=>Alentregas::model()->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'iddetcompra',
		'cant',
		'fecha',
		'idkardex',
		'usuario',		 
				),
						)

						); 
		?>
