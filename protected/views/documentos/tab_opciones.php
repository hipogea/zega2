<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentosop-grid',
	'dataProvider'=>Opcionescamposdocu::model()->search_por_docu($model->coddocu),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
//'filter'=>$model,
	'columns'=>array(
		'codocu',
		
		'campo',
		'nombrecampo',
		'tipodato',
		'longitud',
		'nombredelmodelo',
		//'primercampolista',
		//'segundocampolista',
		'seleccionable',
		/*
		'modificadopor',
		'modificadoel',
		'coddocupadre',
		'tabla',
		'anuladesde',
		'cactivo',
		'abreviatura',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


  <div class="row">
                <?php
                $botones=array(
                     'add'=>array(
                        'type'=>'C',
                        'ruta'=>array($this->id.'/creadetalle',array(
                            'id'=>$model->coddocu,
                            //'cest'=>$model->{$this->campoestado},
                            //"id"=>$model->n_direc,
                            "asDialog"=>1,
                            "gridId"=>'documentosop-grid',
                        )
                        ),
                        'dialog'=>'cru-dialog3',
                        'frame'=>'cru-frame3',
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

            </div>
			
			
			
			
