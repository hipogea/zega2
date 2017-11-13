<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Ver tipo de cambio', 'url'=>array('cambio')),
    array('label'=>'Monedas', 'url'=>array('listamonedas')),
	array('label'=>'Establecer Cambio', 'url'=>array('updatecambio')),
);

?>

<?php MiFactoria::titulo("Monedas Disponibles", "money"); ?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'monedas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codmoneda',
		'desmon',
            'simbolo',
                array(
                    'name'=>'habilitado',
                    'filter'=>ARRAY('1'=>'Habilitado',''=>'deshabilitado'),
        'header'=>'Status',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->habilitado",
                                   $data->habilitado,
                                   array(
                                    
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
             
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{otro}',
			'buttons'=>array('update'=>
				array(
					'url'=>'$this->grid->controller->createUrl("TMoneda/activamoneda",
										    array("codmon"=>$data->codmoneda)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'coins.png',
					'label'=>'Reservar',
				),
                            
                            'otro'=>
				array(
					'url'=>'$this->grid->controller->createUrl("TMoneda/actualiza",
										    array("codmon"=>$data->codmoneda)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'Edit.png',
					'label'=>'Reservar',
				),
			),

		),
	),
)); ?>



