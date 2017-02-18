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
	<?php //echo $form->hiddenField($model,'hidot',array('value'=>$idcabeza)); ?>

	

<div class="row">
       
    
		<?php echo $form->labelEx($model,'hidlabor'); 	
		echo $form->DropDownList($model,'hidlabor',$datoscombo, 
                                        array(
                                            'ajax'=>array(
                                                        'type' => 'POST',  
                                                        'url' => CController::createUrl($this->id.'/ajaxmuestralistamateriales'), //  la acción que va a cargar el segundo div 
                                                        'update' => '#Tempdesolpe_hidsolpe', // el div que se va a actualizar
                                                        'data'=>array('datopost'=>'js:Tempdesolpe_hidlabor.value'), 
                                                        ),
                                            'empty'=>'--Seleccione una labor--'
                                            )
                                        )  ;
		 echo $form->error($model,'hidlabor'); ?>
	</div>

       <div class="row">
		<?php echo $form->labelEx($model,'hidsolpe'); 	
		echo $form->DropDownList($model,'hidsolpe',array(), array('empty'=>'--Seleccione una lista--'))  ;
		 echo $form->error($model,'hidsolpe'); ?>
	</div>
    
    
    
<div class="row">
		<?php echo $form->labelEx($model,'fechaent'); ?>
		<?php 
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechaent',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
												'showOn'=>'both', // 'focus', 'button', 'both'
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															'size'=>12,
															'disabled'=>$habilitado,
															),
															));

															
															
                            ?>		
		<?php echo $form->error($model,'fechaent'); ?>
	</div>
	
	

	

	<div class="row">

		<?php //echo $form->labelEx($model,'c_descri'); ?>
		<?php //echo $form->textField($model,'c_descri',array('size'=>40,'maxlength'=>40)); ?>
		<?php //echo $form->error($model,'c_descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'centro',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>$habilitado,
													    ) ) ;
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'textodetalle'); ?>
		<?php echo $form->textArea($model,'textodetalle',array( 'disabled'=>$habilitado,'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textodetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solicitanet'); ?>
		<?php echo $form->textField($model,'solicitanet',array( 'disabled'=>$habilitado,'size'=>25,'maxlenght'=>25)); ?>
		<?php echo $form->error($model,'solicitanet'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo ($habilitado=='')?CHtml::submitButton(($model->isNewRecord)?'Agregar' : 'Actualizar'):''; ?>
	</div>




<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>420,
        'border'=>0,
    ),
    ));
?>
<iframe id="cru-frame3" style="border:0px; width:100%; height:100%;" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
</div>
</div>
