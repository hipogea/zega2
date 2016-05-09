
<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'caja.png',"hola",array('width'=>'50','height'=>'50')); ?>   Crear Ingreso referenciado</h1>



<div class="wide form">

	
<?php $form=$this->beginWidget('CActiveForm', array(
	
	'id'=>'ne-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>false,
     ),
	'enableAjaxValidation'=>false,
	
)); ?>


     <div class="row">
		<?php echo $form->labelEx($model,'c_numgui'); ?>
		<?php //echo $form->labelEx($model,'c_serie'); ?>
		<?php echo $form->textField($model,'c_serie',array('style'=>'font-size: 14px; color:red; font-weight:bold; ','size'=>3,'maxlength'=>3,'disabled'=>$this->eseditable($model->c_estgui))); ?>
		<?php echo $form->error($model,'c_serie'); ?>
	
		
				<?php echo $form->textField($model,'c_numgui',array('style'=>'font-size: 14px; color:red; font-weight:bold; ','size'=>8,'maxlength'=>8,'disabled'=>$this->eseditable($model->c_estgui))); 
				?>
		<?php echo $form->error($model,'c_numgui'); ?>
	</div>



<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Ingreso' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


