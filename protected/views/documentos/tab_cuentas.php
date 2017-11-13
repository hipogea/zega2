<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentosop-grid',
	'dataProvider'=>Cuentasdoc::model()->search_por_docu($model->coddocu),
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
            'debehaber',
		'cuentas.descuenta',		
		'codcuenta',		
		//array(
			//'class'=>'CButtonColumn',
		//),
	),
)); ?>



                <?php
                $botones=array(
                     'add'=>array(
                        'type'=>'C',
                        'ruta'=>array('contabilidad/cuentas/createByDoc',array(
                            'codocu'=>$model->coddocu,
                            //'cest'=>$model->{$this->campoestado},
                            //"id"=>$model->n_direc,
                            "asDialog"=>1,
                            "gridId"=>'documentosop-grid',
                        )
                        ),
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

          
			
			
			
			
			