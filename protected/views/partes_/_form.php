<?php
/* @var $this PartesController */
/* @var $model Partes */
/* @var $form CActiveForm */
?>

<div class="form">
<DIV>
 <?php  ECHO " ".Yii::app()->getModule('user')->user()->profile->lastname."-".Yii::app()->getModule('user')->user()->profile->amaterno."-".Yii::app()->getModule('user')->user()->profile->firstname."-".Yii::app()->getModule('user')->user()->email; ?>
</DIV>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partes-form',
	'enableClientValidation'=>false,
    //'clientOptions' => array(
       //  'validateOnSubmit'=>true,
       //  'validateOnChange'=>true       
    // ),
	'enableAjaxValidation'=>true,
)); ?>
	<p class="note">Campos marcados con  <span class="required">*</span> Son obligatorios.</p>
	<?php echo $form->errorSummary($model); ?>
	
	
	<div  style="float: left; width:700px; border :1px;"> 
					<div style="float: left; width:350px;">
						 <?php echo $form->labelEx($model,'numero'); ?>
						<?php echo $form->textField($model,'numero',array('disabled'=>'disabled', 'border'=>0,'value'=>$model->numero)); ?>
						<?php echo $form->error($model,'numero'); ?>  
					</div>
					<div style="float: left; clear:right; width:350px;">
						<?php echo $form->labelEx($model,'fecha'); ?>
					
								<?php echo $form->error($model,'fecha'); ?>
							
							<?php
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecha',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

								?>					
							
							
							
							
							
					</div>
	</div>
	
	<div class="row">
		
		<?php echo $form->hiddenField($model,'numeroauxiliar',array('value'=>$model->numeroauxiliar,'border'=>0)); ?>
		
	</div>

    <div class="row">
	       <?php  
				$codigobarco=$codep;
		   if(  ($codigobarco=='000' )) {
		
			
		 } else {
		  $nino=Embarcaciones::model()->find('codep=:codigo',array(':codigo'=>$codigobarco));
		  echo "Embarcacion: ". $nino->nomep."\n.";
		 }
                  
		 ?>
	</div>
	
	
	<div class="row">
		
	</div>
	
	
	
<?PHP 
   
$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
									//'StaticTab 1' => 'Content for tab 1',
									//'StaticTab 2' => array('content' => 'Content for tab 2', 'id' => 'tab2'),
        // panel 3 contains the content rendered by a partial view
									//'AjaxTab' => array('ajax' => $this->createUrl('..')),
									'Zarpe'=>array('id'=>'tab_zarpe',
														'content'=>$this->renderPartial('_llena_zarpe', array('model'=>$model,'form'=>$form,'ptipo'=>$ptipo,'codep'=>$codep,),TRUE)
																			),
									//'StaticTab 21' => array('content' => 'Content for tab 23', 'id' => 'tab23'),
									'Motor y caja'=>array('id'=>'tab_motorycaja',
														'content'=>$this->renderPartial('_llena_motorycaja', array('model'=>$model,'form'=>$form,'codep'=>$codep,),TRUE)
																			),
									'Panga'=>array('id'=>'tab_panga',
														'content'=>$this->renderPartial('_llena_panga', array('model'=>$model,'form'=>$form,'codep'=>$codep,),TRUE)
																			),
									'Combustible'=>array('id'=>'tab_combustible',
														'content'=>$this->renderPartial('_llena_combustible', array('model'=>$model,'form'=>$form,'codep'=>$codep,),TRUE)
																			),
									'Aceite y grasa'=>array('id'=>'tab_acylu',
														'content'=>$this->renderPartial('_llena_acylu', array('model'=>$model,'form'=>$form,'codep'=>$codep,),TRUE)
																			),
									'Cambios de aceite'=>array('id'=>'tab_cambios',
														'content'=>$this->renderPartial('_llena_cambios', array('model'=>$model,'form'=>$form,'ptipo'=>$ptipo,'codep'=>$codep,),TRUE)
																			),
									'Novedades'=>array('id'=>'tab_novedades',
														'content'=>$this->renderPartial('_llena_novedades', array('model'=>$model,'form'=>$form,'modelonovedades'=>$modelonovedades,'proveedornovedades'=>$proveedornovedades,'codep'=>$codep,),TRUE)
																			),									
									'Observaciones finales'=>array('id'=>'tab_obs',
														'content'=>$this->renderPartial('_llena_obs', array('model'=>$model,'form'=>$form,'codep'=>$codep,),TRUE)
																			),									
									//'Mis activos'=>array('id'=>'activos',
													//	'content'=>$this->renderPartial('_listado', array('model'=>$model,'form'=>$form),TRUE)
																			//),
									),
								 
    // additional javascript options for the tabs plugin
					'options' => array(	'collapsible' => false,),
    // set id for this widgets
					'id'=>'MyTab',
												)
			);


		 
		 
		 
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->