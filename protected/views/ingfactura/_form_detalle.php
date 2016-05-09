
<div class="division">
<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
   
	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidfactura',array('value'=>Ingfactura::model()->findbypk($idcabeza)->id)):''; ?>

	</div>

	<div class="row">
		<?php echo CHtml::label('Item',false); ?>

		<?php echo CHtml::textField('dhfkdkfdkf',$model->entregas->alentregas_docompra->materiales->descripcion,array('disabled'=>'disabled')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('CANTIDAD ENTREGADA',false); ?>
		<?php echo CHtml::textField('dhhhffkdkfdkf',$model->entregas->alentregas_docompra->cant,array('disabled'=>'disabled')); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'cant',false); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->


	</div>