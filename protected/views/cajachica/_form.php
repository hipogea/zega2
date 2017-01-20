<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
	
	
	<div class="row">

			<div class="row">
				<?php
				$botones=array(
					
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array(NULL,ESTADO_PREVIO,ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO,ESTADO_LIQUIDADO),
					),


					'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>2)),
						'visiblex'=>array(ESTADO_CREADO),
					),
					
					'undo'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>64)),
						'visiblex'=>array(ESTADO_AUTORIZADO),
					),
					
					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>35)),
						'visiblex'=>array(ESTADO_CREADO),

					),
					
					
					
					
					
					'money'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>37)),
						'visiblex'=>array(ESTADO_AUTORIZADO),
				
					),
					
					
					
					
					'print'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/imprimirsolo',array('id'=>$model->id)),
						'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO, ESTADO_LIQUIDADO),
					              ),
					
					'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
						'visiblex'=>array(ESTADO_CREADO,ESTADO_ANULADO,ESTADO_LIQUIDADO,ESTADO_AUTORIZADO),
					),

				);





				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>$model->{$this->campoestado},

					)
				);?>

			</div>









		<div class="row">
			<?php echo $form->labelEx($model,'serie'); ?>
			<?php if($model->isNewRecord) {?>
			<?php  $datos1 = array('100'=>'100','200'=>'200','300'=>'300','400'=>'400');
			echo $form->DropDownList($model,'serie',$datos1, array('empty'=>'--Seleccione la serie--')  )  ;
			?>
			<?php }else{?>
				<?php echo $form->textField($model,'serie',ARRAY('size'=>6,'disabled'=>'disabled')); ?>

			<?php }?>

			<?php echo $form->error($model,'serie'); ?>
		</div>
	
	
		<div class="row">
		<?php echo $form->labelEx($model,'codarea'); ?>
		<?php  $datos1 = CHtml::listData(Areas::model()->findAll(),'codarea','area');
		  echo $form->DropDownList($model,'codarea',$datos1, array('empty'=>'--Seleccione un area--')  )  ;
		?>
		<?php echo $form->error($model,'codarea'); ?>
	</div>
	


	<div class="row">
		<?php echo $form->labelEx($model,'hidfondo'); ?>
<?php if($model->isNewRecord) {?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'hidfondo',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fherdfa34jfdxxsfdf',
		)); ?>

		<?php }else{?>
			<?php echo $form->textField($model,'hidfondo',ARRAY('size'=>6,'disabled'=>'disabled')); ?>

		<?php }?>
		<?php echo $form->error($model,'hidfondo'); ?>
	</div>






	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codtra',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fherdfa3gt4jfdxxsfdf',
		)); ?>
		<?php echo $form->error($model,'codtra'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'hidperiodo'); ?>
<?php if($model->isNewRecord) {?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
	'nombrecampo'=>'hidperiodo',
	'ordencampo'=>3,
	'controlador'=>$this->id,
	'relaciones'=>$model->relations(),
	'tamano'=>6,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'fhdfj',
	)); ?>
		<?php }else{?>
			<?php echo $form->textField($model,'hidperiodo',ARRAY('size'=>6,'disabled'=>'disabled')); ?>

		<?php }?>
		<?php echo $form->error($model,'hidperiodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',ARRAY('size'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fechaini'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'fechaini',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fechaini'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechafin'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'fechafin',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fechafin'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',ARRAY('value'=>($model->isNewRecord )?"":$model->estado->estado,'size'=>20,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'valornominal'); ?>
<?php if($model->isNewRecord) {?>
		<?php echo $form->textField($model,'valornominal',ARRAY('size'=>20,'disabled'=>'')); ?>
		<?php }else{?>
			<?php echo $form->textField($model,'valornominal',ARRAY('size'=>10,'disabled'=>'disabled')); ?>

		<?php }?>
		<?php echo $form->error($model,'valornominal'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'liquidada'); ?>
		<?php echo $form->checkBox($model,'liquidada',array('disabled'=>'disabled',
		) ) ; ?>
		<?php echo $form->error($model,'liquidada'); ?>
	</div>


	
	



	
	



</div><!-- form -->



<?PHP if(!$model->isNewRecord ){ ?>

<?php	$this->renderpartial('vw_detalle_caja',array('modelcabecera'=>$model)); ?>

<?php
  }
?>

	
<div class="row">

		<?php
		$botones1=array(
		
		
			'add'=>array(
				'type'=>'C',
				'ruta'=>array('cajachica/creadetalle',array(
					'idcabeza'=>$model->id,
					'cest'=>$model->{$this->campoestado},
					'asDialog'=>1,
					"gridId"=>'detalle-grid',
				)
				),
				'dialog'=>'cru-dialog3',
				'frame'=>'cru-frame3',
				'visiblex'=>array(ESTADO_CREADO),

			),
			
			
			
			
			'minus'=>array(
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
				'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO),

			),


			


		);





		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones1,
				'size'=>24,
				'extension'=>'png',
				'status'=>$model->{$this->campoestado},

			)
		);?>
	</div>


	<?php $this->endWidget(); ?>

</div>
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
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>