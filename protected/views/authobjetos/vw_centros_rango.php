<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacenes-form',
'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true
     ),

)); ?>


	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'iduser'); ?>
	<?php
	$comboList = array();
	foreach(Yii::app()->user->um->listUsers() as $user){
		$comboList[$user->primaryKey] = $user->username;
	}
	echo $form->dropDownList($model,'iduser',$comboList, array('empty'=>'--Seleccione usuario--'));
	?>
	<?php echo $form->error($model,'iduser'); ?>




	<div class="row">
		<?php echo $form->labelEx($model,'valor1'); ?>
		<?php echo $form->textField($model,'valor1',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'valor1'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'valor2'); ?>
		<?php echo $form->textField($model,'valor2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'valor2'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

