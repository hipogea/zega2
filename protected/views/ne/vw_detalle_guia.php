<?php
/* @var $this MotController */
/* @var $model Mot */
/* @var $form CActiveForm */
?>

<div class="form">


	

<?php

  //$this->renderPartial('llena_materiales', array('model'=>$model,'form'=>$form,'naleatorio'=>$naleatorio,),false);
														
		
		 
		 
?>

 
 <?php
       $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable));
	
	?>
	
	
	
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>900,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>


	<div class="row">

		<?php
		$botones=array(
			'add'=>array(
				'type'=>'C',
				'ruta'=>array('ne/creadetalle',array(
					'idcabeza'=>$modelcabecera->id,
					'cest'=>$modelcabecera->{$this->campoestado},
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
                                                "tipo"=>"M",
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO),

			),
                                                
                            'tool'=>array(
				'type'=>'C',
				'ruta'=>array('ne/Creadetalle',array(
					'idcabeza'=>$modelcabecera->id,
					'cest'=>$modelcabecera->{$this->campoestado},
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
                                                "tipo"=>"C",
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO),

			),                    
                                                
                                                
			'asset'=>array(
				'type'=>'C',
				'ruta'=>array('ne/creadetalle',array(
					'idcabeza'=>$modelcabecera->id,
					'cest'=>$modelcabecera->{$this->campoestado},
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
                                                "tipo"=>"A",
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO),

			),


			'minus'=>array(
				'type'=>'D',
				'ruta'=>array($this->id.'/borraitems',array()),
				'opajax'=>array(
					'type'=>'POST',
					'url'=>Yii::app()->createUrl($this->id.'/borraitems',array()),
					'success'=>'js:function(data) { $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
					'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
				),
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO,$this::ESTADO_ANULADO,$this::ESTADO_CONFIRMADO),

			),


			'checklist'=>array(
				'type'=>'C',
				'ruta'=>array($this->id.'/agregardespacho',array(
					'id'=>$modelcabecera->id,
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO),
			),
			'pack2'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>35)),
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO),

			),
			'adddoc'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>64)),
				'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CONFIRMADO),

			),


		);





		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>$modelcabecera->{$this->campoestado},

			)
		);?>
	</div>




</div><!-- form -->


<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('detalle-grid');
	alert('ok todo bien '+data+ ' ');
}
</script>