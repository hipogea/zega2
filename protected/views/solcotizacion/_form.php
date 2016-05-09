<?php
/* @var $this SolcotizacionController */
/* @var $model Solcotizacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solcotizacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidesolpe'); ?>
		<?php echo $form->textField($model,'hidesolpe',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'hidesolpe'); ?>
	</div>

	<div class="row">
		            <?php echo $form->labelEx($model,'codpro'); ?>
					<?php
					
					
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codpro',												
												'ordencampo'=>1,
												'controlador'=>'Solcotizacion',
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-detalle',
												'nombrearea'=>'fehdfxderej',
													)
													
								);
							
									
			   ?>
 </div>

	<div class="row">
		<?php echo $form->labelEx($model,'preciounit'); ?>
		<?php echo $form->textField($model,'preciounit'); ?>
		<?php echo $form->error($model,'preciounit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dispo'); ?>
		<?php echo $form->textField($model,'dispo'); ?>
		<?php echo $form->error($model,'dispo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacrea'); ?>
		<?php echo $form->textField($model,'fechacrea'); ?>
		<?php echo $form->error($model,'fechacrea'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php  $datos1 = CHtml::listData(TMoneda::model()->findAll(),'codmoneda','desmon');
		  echo $form->DropDownList($model,'codmon',$datos1, array('empty'=>'--Seleccione moneda--' ) ) ;
		?>
	
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		
		
		<?php echo $form->DropDownList($model,'um',Alconversiones::Listadoums($model->desolpe->codart), array('empty'=>'--Um--', 'disabled'=>$habilitado, 'maxlength'=>4)  )  ; ?>
		
		
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frespuesta'); ?>
		<?php echo $form->textField($model,'frespuesta'); ?>
		<?php echo $form->error($model,'frespuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Proveedor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>500,
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