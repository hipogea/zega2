<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="wide form">
    <div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-_form_config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
			<?php echo $form->labelEx($model,'codocu'); ?>
			<?php $data=CHTml::listData(Documentos::model()->findall(),'coddocu','desdocu'); ?>
			<?php echo $form->dropDownList($model,'codocu',$data,array('disabled'=>'disabled','empty'=>'Seleccione un documento')); ?>
			<?php echo $form->error($model,'codocu'); ?>
		</div>
        
        <div class="row">
			<?php echo $form->labelEx($model,'codcen'); ?>
			<?php $data=CHTml::listData(Centros::model()->findall(),'codcen','nomcen'); ?>
			<?php echo $form->dropDownList($model,'codcen',$data,array('disabled'=>'disabled','empty'=>'Seleccione el centro')); ?>
			<?php echo $form->error($model,'codcen'); ?>
		</div>
        
    <div class="row">
		<?php echo $form->labelEx($model,'codparam'); ?>
		<?php echo $form->textField($model,'codparam',array('size'=>4,'disabled'=>'disabled'));echo $form->textField($model,'codparam',array('size'=>40,'disabled'=>'disabled','value'=>$model->parametros->desparam)); ?>
		<?php echo $form->error($model,'codparam'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60)); ?>
            
           		
			
		<?php echo $form->error($model,'valor'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'explicacion'); ?>
		<?php echo $form->textArea($model,'explicacion'); ?>
		<?php echo $form->error($model,'explicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lista'); ?>
		<?php echo $form->textArea($model,'lista'); ?>
		<?php echo $form->error($model,'lista'); ?>
	</div>
	


	<div class="row buttons">
		<?php echo CHtml::submitButton('Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
    </div>
</div><!-- form -->

<?php
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
		




		<?php $this->endWidget(); ?>