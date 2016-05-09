<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentosop-grid',
	'dataProvider'=>Opcionescamposdocu::model()->search_por_docu($model->coddocu),
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
			
			
			
			
			<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>850,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>