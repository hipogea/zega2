<?php


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alkardex-grid',
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>VwDetalleStockReservado::model()->search_por_inventario($model->id),
	//'filter'=>$model,
	'columns'=>array(
		'numsolpe',
		'item',
		'tipimputacion',
		'imputacion' ,
		'desum',
		'cantreservada',
		'usuariodesolpe',
		'fechaent',
		'cantres',
		'cantlibre',

    ),
)); ?>
