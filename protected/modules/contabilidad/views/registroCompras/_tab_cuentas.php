<div class="row">
                        <?php echo $form->hiddenField($model,'idkey'); ?>
			<?php //echo $form->textField($model,'idkey',array('size'=>14,'maxlength'=>14,'disabled'=>'disabled')); ?>
			
                </div>

<?php 
//VAR_DUMP($proveedor);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cuentas-grid',
	'dataProvider'=>$proveedor,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
//'filter'=>$model,
	'columns'=>array(
            array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 20,
            'value' => '$data->codcuenta',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]',
            ),
        ),
            
		'cuentas.descuenta',		
		'codcuenta',
           // 'tipo',
            //array('name'=>'debe','type'=>'raw','value'=>'($data->tipo=="H")?"":CHtml::textField("txt_".$data->idtemp,$data->debe,array("id"=>"txt_".$data->idtemp, "size"=>3,"ajax"=>Templibrodiario::opcionesajax("debe","txt_".$data->idtemp,$data->idtemp)))  '),
            array('name'=>'haber','value'=>'($data->tipo=="D")?"":$data->haber'),
            array('name'=>'debe','value'=>'($data->tipo=="D")?$data->debe:""'),
            
            //'haber',
		array(
			'htmlOptions'=>array('width'=>320),
			'class'=>'CButtonColumn',
			 'buttons'=>array(
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("registroCompras/updatetempcuentas/",
										    array("id"=>$data->idtemp,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
                                    'click'=>('function(){ 

							    $("#cru-dialog4").dialog("open");
										$("#cru-frame4").attr("src",$(this).attr("href"));
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
								'label'=>'Actualizar Item', 
                                ),

                            ),
		),
	),
)); ?>



                <?php
                $botones=array(
                     'add'=>array(
                        'type'=>'C',
                        'ruta'=>array(
                                Yii::app()->controller->module->id."/".$this->id."/createtempcuentas"
                                ,array("id"=>$model->id)),
                        'dialog'=>'cru-dialog4', 
                        'frame'=>'cru-frame4',
                        'visiblex'=>array('10'),

                    ),
                    
                    
                     'minus' => array(
		'type' => 'D', //AJAX LINK
		'ruta' => array('contabilidad/cuentas/deleteByDoc', array()),
		'opajax' => array(
		'type' => 'POST',//'data'=>array('codocu'=>$model->coddocu),
		'success' => 'function(){
                $("#sss").value=3333378;
                      }'
		),
                     'visiblex'=>array('10'),      
                         ),
                );

                $this->widget('ext.toolbar.Barra',
                    array(
                        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                        'botones'=>$botones,
                        'size'=>24,
                        'extension'=>'png',
                        'status'=>'10',

                    )
                );?>

          
			
			
			
			
			