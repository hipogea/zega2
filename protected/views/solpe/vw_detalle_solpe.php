
 <?php  $this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable),false, true);
 ?>



 <div class="row">
	 <?php
	 $botones1=array(
		 'add'=>array(
			 'type'=>'C',
			 'ruta'=>array($this->id.'/creadetalle',array(
				 'idcabeza'=>$modelcabecera->id,
				 "cest"=>$modelcabecera->estado,
				 //"id"=>$model->n_direc,
				 "asDialog"=>1,

			 ),


			 ),
			 'dialog'=>'cru-dialogdetalle',
			 'frame'=>'cru-detalle',
			 'visiblex'=>array(ESTADO_CREADO,ESTADO_PREVIO),

		 ),



		 'tool'=>array(
			 'type'=>'C',
			 'ruta'=>array($this->id.'/creaservicio',array(
				 'idcabeza'=>$modelcabecera->id,
				 'cest'=>$modelcabecera->estado,
				 "asDialog"=>1,

			 ),
			 ),
			 'dialog'=>'cru-dialogdetalle',
			 'frame'=>'cru-detalle',
			 'visiblex'=>array(ESTADO_CREADO,ESTADO_PREVIO),

		 ),









		 'minus'=>array(
			 'type'=>'D',
			 'ruta'=>array($this->id.'/borraitems',array()),
			 'opajax'=>array(
				 'type'=>'POST',
				 'url'=>Yii::app()->createUrl($this->id.'/borraitems',array()),
				 'success'=>'js:function(data) { $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
				 'beforeSend' => 'js:function(){
									 var r = confirm("¿Esta seguro de Eliminar estos Items?");
 										if(!r){return false;}
 										}
 								',
			 					),
			 'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_PREVIO),
		 				),

		 'adddoc'=>array(
			 'type'=>'C',
			 'ruta'=>array($this->id.'/cargafavorito',array(
				 'id'=>$modelcabecera->id,
				 //"id"=>$model->n_direc,
				 "asDialog"=>1,

			 )
			 ),
			 'dialog'=>'cru-dialogdetalle',
			 'frame'=>'cru-detalle',
			 'visiblex'=>array(ESTADO_CREADO,ESTADO_PREVIO),

		 ),


		 'checklist'=>array(
			 'type'=>'C',
			 'ruta'=>array($this->id.'/verificadispo',array(
				 'idcabeza'=>$modelcabecera->id,

			 ),


			 ),
			 'dialog'=>'cru-dialogdetalle',
			 'frame'=>'cru-detalle',
			 'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_PREVIO),

		 ),

	 );

	 if($modelcabecera->escompra=='O'){
		 UNSET($botones1['add']);UNSET($botones1['tool']);UNSET($botones1['minus']);
		 UNSET($botones1['adddoc']);

	 }


	 $this->widget('ext.toolbar.Barra',
		 array(
			 //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
			 'botones'=>$botones1,
			 'size'=>24,
			 'extension'=>'png',
			 'status'=>$modelcabecera->estado,

		 )
	 );?>

 </div>


















	<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'cru-dialogdetalle',
		'options'=>array(
			//'title'=>'Item',
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>800,
			'height'=>500,
			'show'=>'Transform',
		),
	));
	?>
	<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
	<?php
	$this->endWidget();	//--------------------- end new code --------------------------
	?>

	<?php
	//--------------------- begin new code --------------------------
	// add the (closed) dialog for the iframe
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'cru-dialogfavorito',
		'options'=>array(
			'title'=>'Favorito',
			'autoOpen'=>false,
			'modal'=>true,
			'width'=>600,
			'height'=>200,
			'show'=>'Transform',
		),
	));
	?>
<iframe id="cru-detallefav" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>



				<div id="division_entregas">
				</div>

            			<div id="jipi">
             			</div>
