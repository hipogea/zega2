<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	'Manage',
);

$this->menu=array(

	  //array('label'=>'Ver tipo de cambio', 'url'=>array('cambio')),
    array('label'=>'Monedas', 'url'=>array('listamonedas')),
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
                                    
                                    "disabled"=>"disabled",
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
            
            array(
                    'name'=>'activa',
                   // 'filter'=>ARRAY('1'=>'Habilitado',''=>'deshabilitado'),
        'header'=>'Activa',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->activa",
                                   $data->activa,
                                   array(
                                    "disabled"=>"disabled",
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ), 
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}{otro}',
			'buttons'=>array(
                            
                            'view'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("TMoneda/activalog", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("tmoneda-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."check16.png",
	   'label'=>'Activar/Desactivar log', 
	   ),
                            
                            
                            
                            
                            'update'=>
				array(
					'url'=>'$this->grid->controller->createUrl("/TMoneda/actualizacambio/",
										    array("moneda1"=>$data->codmon1,"moneda2"=>$data->codmon2)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'coins.png',
					'label'=>'Actualizar cambio',
				),
                            
                            'otro'=>
				array(
					'url'=>'$this->grid->controller->createUrl("/TMoneda/desactivamoneda/",
										    array("id"=>$data->id)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'cross.png',
					'label'=>'Desactivar moneda',
				),
			),

		),
	),
)); ?>


<?php  
  $dias=yii::app()->tipocambio->vacanciastotales(date('Y-m-d',time()-14*24*60*60),date('Y-m-d',time()-24*60*60));
   
  if(count($dias)>0){
       MiFactoria::titulo('Vacancias Halladas  ('.count($dias).')', 'basket');
       //var_dump($dias);die();
       $this->renderpartial('vacancias',array('dias'=>$dias));
   }


?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmoneda-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="division">
    <div class="wide form">

	<?php echo $form->errorSummary($logcambio); ?>

	<div class="row">
		<?php echo $form->labelEx($logcambio,'fecha'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
            array(
                'model'=>$logcambio,
                'attribute'=>'fecha',
                'value'=>$logcambio->fecha,
                'language' => 'es',
                'htmlOptions' => array('readonly'=>"readonly"),
                'options'=>array(
                    'autoSize'=>true,
                    'defaultDate'=>date('Y-m-d',time()-24*60*60),
                    'dateFormat'=>'yy-mm-dd',
                    'showAnim'=>'fold',
                    //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                    //'buttonImageOnly'=>true,
                    //'buttonText'=>'Fecha',
                    'selectOtherMonths'=>true,
                    'showAnim'=>'slide',
                    'showButtonPanel'=>true,
                    'showOn'=>'button',
                    'showOtherMonths'=>true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                ),
            )
        );?>
		<?php echo $form->error($logcambio,'fecha'); ?>
            <?php //echo CHtml::submitButton($model->isNewRecord ? 'Ver' : 'Modificar');
            echo CHtml::ajaxButton('Ver', yii::app()->createUrl($this->id.DIRECTORY_SEPARATOR.'ajaxcambioporfecha'),
                    ARRAY(
                        'type'=>'POST',
                        'url'=>yii::app()->createUrl($this->id.DIRECTORY_SEPARATOR.'ajaxcambioporfecha'),
                        'data'=>array('fechita'=>'js:Logtipocambio_fecha.value'),
                        'update'=>'#panelcambio',
                    )
                    );
            ?>
	</div>

	
	
		
	

<?php $this->endWidget(); ?>

</div>
    </div>


<div id="panelcambio">
    
    
    
</div>


