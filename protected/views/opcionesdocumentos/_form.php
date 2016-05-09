<?php
/* @var $this OpcionesdocumentosController */
/* @var $model Opcionesdocumentos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opcionesdocumentos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="row">
		
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php  if(!empty($model->param->seleccionable)) {
			eval(trim($model->param->seleccionable));
				echo $form->DropDownList($model,'valor',$datos, array('empty'=>'--Seleccione --')  )  ;
			}else{
				echo $form->textField($model,'valor',array('size'=>30,'maxlength'=>30)); 
			}
		
		?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->