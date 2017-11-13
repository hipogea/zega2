<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
/* @var $form CActiveForm */
?>
<div class="form">
<div class="division">
	<div class="wide form">


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
						'visiblex'=>array(NULL,$this::ESTADO_PREVIO,$this::ESTADO_CREADO,$this::ESTADO_AUTORIZADO,$this::ESTADO_ANULADO,$this::ESTADO_LIQUIDADO),
					),


						
					'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/cierracaja',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_AUTORIZADO,  $this::ESTADO_ANULADO),

					),
					
					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/anularcaja',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_PREVIO),

					),
					
					
					
					
					
					'book' => array(
                            'type' => 'C',
                            'ruta' => array($this->id.'/liquidadeuda', array("id"=>$model->id)
                                            ),
                            'dialog' => 'cru-dialog3',
                            'frame' => 'cru-frame3',
                            'visiblex' => array($this::ESTADO_CREADO),

                        ),
                        
					
					
					
					'join'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/updatececos',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_AUTORIZADO, $this::ESTADO_LIQUIDADO),
					              ),
					'print'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/imprimirsolo',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_AUTORIZADO, $this::ESTADO_LIQUIDADO),
					              ),
					'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_ANULADO,$this::ESTADO_LIQUIDADO,$this::ESTADO_AUTORIZADO),
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
				); ?>

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
			'tamano'=>2,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fherdfa34jfdxxsfdf',
		)); ?>

		<?php }else{?>
			<?php echo $form->textField($model,'hidfondo',ARRAY('VALUE'=>$model->fondo->desfondo,'size'=>26,'disabled'=>'disabled')); ?>

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
			'tamano'=>4,
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
<?php 
$datos1 = CHtml::listData(Periodos::model()->findAll("activo='1'"),'id','desperiodo');
		  	echo $form->DropDownList($model,'hidperiodo',$datos1, array('empty'=>'--SelecciXone un Periodo--',
				 ) ) ;
?>
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
				'style'=>'width:80px;vertical-align:top',
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
				'style'=>'width:80px;vertical-align:top',
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
		<?php echo CHtml::label('Rendido','Rendido'); ?>
		<?php echo CHtml::openTag("span",array("class"=>"label badge-error")).$model->monto_rendido.Chtml::closeTag("span"); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'liquidada'); ?>
		<?php echo $form->checkBox($model,'liquidada',array('disabled'=>'disabled',
		) ) ; ?>
		<?php echo $form->error($model,'liquidada'); ?>
	</div>


	
	



	
	
<?php $this->endWidget(); ?>


</div><!-- form -->



<?PHP if(!$model->isNewRecord ){ ?>
<?php  //$this->renderPartial('vw_detalle_grilla', array("idcabecera"=>$modelcabecera->id,'eseditable'=>$eseditable),false, false);
 ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form2',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<?php  	echo $this->renderpartial('vw_detalle_grilla',array('modelcabecera'=>$model,"idcabecera"=>$model->id),FALSE,false); ?>
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
				'visiblex'=>array($this::ESTADO_CREADO),

			),
			
			
			
			
			'minus'=>array(
				'type'=>'D',
				'ruta'=>array($this->id.'/borraitems',array()),
				'opajax'=>array(
					'type'=>'POST',
					'url'=>Yii::app()->createUrl($this->id.'/borraitems',array()),
					'success'=>"function(data) {
							 $.fn.yiiGridView.update('detallecaja-grid');  $.growlUI(' Aviso ', data, 0, 0, 0); return false;
                                                                       }",
					'beforeSend' => 'js:function(){
                                  				 var r = confirm("Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
				),
				'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_AUTORIZADO,$this::ESTADO_ANULADO),

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
		); ?>
	</div>


	<?php $this->endWidget(); ?>
<?php
  }
?>

	


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