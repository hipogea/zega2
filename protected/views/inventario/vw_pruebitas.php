

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'action'=>Yii::app()->createurl('/inventario/recibevalor'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	


	<div class="row">
		
		<?php echo $form->passwordField($model,'valortexto'); ?>
		
		
	</div>

	<div class="row rememberMe">
		
		
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Ingresar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->