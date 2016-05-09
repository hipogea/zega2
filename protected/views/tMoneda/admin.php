<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Establecer Cambio', 'url'=>array('colocacambio')),
);

?>

<h1>Tipo de cambio entre monedas</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tmoneda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codmon1',
		'codmon2',
		array('name'=>'ultima','value'=>'MiFactoria::tiempopasado($data->ultima)','htmlOptions'=>array('width'=>300)),

		array('name'=>'cambio','value'=>'($data->cambio==1)?"":(($data->cambio<1)?round((1/$data->cambio),2):$data->cambio)'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array('update'=>
				array(
					'url'=>'$this->grid->controller->createUrl("/TMoneda/actualizacambio/",
										    array("moneda1"=>$data->codmon1,"moneda2"=>$data->codmon2)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'coins.png',
					'label'=>'Reservar',
				),
			),

		),
	),
)); ?>
