<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temporadas-form',
	//'enableClientValidation'=>FALSE,
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'destemporada'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'cuota_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_anchoveta',array('size'=>8,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'cuota_anchoveta'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cuota_global_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_global_anchoveta',array('size'=>8,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'cuota_global_anchoveta'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'zonalitoral'); ?>
		<?php echo $form->textField($model,'zonalitoral',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'zonalitoral'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'inicio',
				'language'=>'es',
				'value'=>$model->inicio,
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',				
					)));
		?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'termino',
				'language'=>'es',
				'value'=>$model->termino,
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',				
					)));
		?>
		<?php echo $form->error($model,'termino'); ?>
	</div>
      <?php //echo $form->hiddenField($model,'idespecie', array('value'=>'1')); //para wevadior la validacion d elmodelo  ?>
	  <?php // echo $form->hiddenField($model,'fechadehoy', array('value'=>'0001-01-01')); //para evadir la valiadaicon del modelo  ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->