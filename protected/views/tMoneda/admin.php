<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Establecer Cambio', 'url'=>array('updatecambio')),
);

?>

<h1>Tipo de cambio entre monedas</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tmoneda-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'summaryText'=>'',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codmon1',
		//'codmon2',
		
		array('name'=>'compra','value'=>'$data->compra'),
                array('name'=>'venta','value'=>'$data->venta'),
            array('name'=>'ultima','header'=>'Ultima modificacion','value'=>'MiFactoria::tiempopasado($data->ultima)','htmlOptions'=>array('width'=>300)),
 array(
                    'name'=>'seguir',
                   // 'filter'=>ARRAY('1'=>'Habilitado',''=>'deshabilitado'),
        'header'=>'Seguimiento',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->seguir",
                                   $data->seguir,
                                   array(
                                    
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
			'buttons'=>array(
                            
                            'view'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("TMoneda/activalog", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("tmoneda-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."check16.png",
	   'label'=>'Activar log',
	   ),
                            
                            
                            
                            
                            'update'=>
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
