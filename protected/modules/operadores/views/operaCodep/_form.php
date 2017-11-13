<?php
/* @var $this OperaCodepController */
/* @var $model OperaCodep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opera-codep-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
           	<?php echo $form->labelEx($model,'c_codep'); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codep',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>'',
													   'options'=>array()  ) ) ;
		?>
		<?php echo $form->error($model,'c_codep'); ?>
            
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
					'nombrearea'=>'fehdfddj',
				)

			);
		?>
               <?php echo $form->error($model,'codtra'); ?>
	</div>

	<div class="row">
		 <?php echo $form->labelEx($model,'codof'); ?>

        <?php  $datos = CHtml::listData(Oficios::model()->findAll(array('order'=>'oficio')),'codof','oficio');
                    echo $form->DropDownList($model,'codof',$datos, array('empty'=>'--Seleccione un oficio --')  );
                    ?>



        <?php //echo $form->textField($model,'codpuesto',array('size'=>3,'maxlength'=>3)); ?>
        <?php echo $form->error($model,'codof'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->