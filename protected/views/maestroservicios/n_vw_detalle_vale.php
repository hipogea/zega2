<?php
?>
<div id="AjFlash" class="flash-regular"></div>
 <?php
       $this->renderPartial('n_vw_detalle_grilla', array('proveedor'=>$proveedor,'model'=>$model, 'campoestado'=>$campoestado,"idcabecera"=>$model->id,'eseditable'=>$eseditable));
		?>


<div class="row">
	<?php
	if($model->almacendocs_almacenmovimientos->itemsdeterministicos=='1')
			{ $arraybotonagrega=array(
					'type'=>'C',
					'ruta'=>array($this->id.'/creadetalle',array(
						'idcabeza'=>$model->id,
						'cest'=>$model->cestadovale,
						'asDialog'=>1,
						"gridId"=>'detalle-grid',
									)
											),
						'dialog'=>'cru-dialogdetalle',
					'frame'=>'cru-detalle',
					'visiblex'=>array(ESTADO_PREVIO,NUll,ESTADO_CREADO),

					);

			}else {
		$arraybotonagrega=array();
				}

	if($model->almacendocs_almacenmovimientos->borraritems=='1')
	{ $arraybotonmenos=array(
		'type'=>'D',
		'ruta'=>array($this->id.'/borraitems',array()),
		'opajax'=>array(
			'type'=>'POST',
			'url'=>Yii::app()->createUrl($this->id.'/borraitems',array()),
			'success'=>"function(data) {
										$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('detalle-grid'); return false;
                                        }",
			'beforeSend' => 'js:function(){
                                  				 var r = confirm("Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
		),
		'visiblex'=>array(ESTADO_PREVIO,NUll,ESTADO_CREADO),

	);

	}else {
		$arraybotonmenos=array();
	}



	$botones=array(
		'add'=>$arraybotonagrega,
		'minus'=>$arraybotonmenos,
		         );

	$this->widget('ext.toolbar.Barra',
		array(
			//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
			'botones'=>$botones,
			'size'=>24,
			'extension'=>'png',
			'status'=>$model->cestadovale,
		)
	);?>

</div>






















	
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>500,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" >
	hola
</iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>




