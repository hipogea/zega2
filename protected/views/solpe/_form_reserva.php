<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>
<div style="overflow:auto;">
<div class="division">
<div class="wide form">



		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>TRUE,
			'clientOptions' => array(
				'validateOnSubmit'=>TRUE,
				'validateOnChange'=>TRUE  ,
			),
	'enableAjaxValidation'=>FALSE,
	



)); ?>
		<?php echo $form->errorSummary($model); ?>

	<div id="miarea">
		</div>

	<div class="row">
		<?php  //  var_dump($model->attributes);yii::app()->end();
		$botones=array(
			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array(ESTADO_CREADO),
			),

				'tacho'=>array(
				'type'=>'D',
				'ruta'=>array($this->id.'/anulareserva',array()),
				'opajax'=>array(
					'type'=>'POST',
					'url'=>Yii::app()->createUrl($this->id.'/anulareserva',array()),
					//'success'=>'js:function(data) { $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
					'replace'=>"#miarea",
					'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
				),
					'visiblex'=>array(  (($model->cantidad_atendida+0) ==0)?ESTADO_CREADO :''  ),

			),

			'minus'=>array(
				'type'=>'D',
				'ruta'=>array($this->id.'/detienereserva',array()),
				'opajax'=>array(
					'type'=>'POST',
					'url'=>Yii::app()->createUrl($this->id.'/detienereserva',array()),
					//'success'=>'js:function(data) { $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
					'replace'=>"#miarea",
					'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
				),
				'visiblex'=>array(  (($model->cantidad_atendida+0) >0)?ESTADO_CREADO:''   ),

			),

		);
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>ESTADO_CREADO,

			)
		);?>

	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'iddesolpe'); ?>
		</div>
	<div class="row">
		<?php echo $form->hiddenField($model,'idreserva'); ?>
	</div>
  <div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>12,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>3,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desum'); ?>
		<?php echo $form->textField($model,'desum',array('size'=>3,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'desum'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>10,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'txtmaterial'); ?>
		<?php echo $form->textField($model,'txtmaterial',array('size'=>40,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'txtmaterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reserva'); ?>
		<?php echo $form->textField($model,'fecha_reserva',array('size'=>16,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'fecha_reserva'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'usuario_reserva'); ?>
		<?php echo $form->textField($model,'usuario_reserva',array('size'=>10,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'usuario_reserva'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_reservada'); ?>
		<?php echo $form->textField($model,'cantidad_reservada',array('size'=>6,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'cantidad_reservada'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_atendida'); ?>
		<?php echo $form->textField($model,'cantidad_atendida',array('size'=>6,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'cantidad_atendida'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_pendiente'); ?>
		<?php echo $form->textField($model,'cantidad_pendiente',array('size'=>6,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'cantidad_pendiente'); ?>
	</div>





<?php $this->endWidget(); ?>

</div><!-- form -->
