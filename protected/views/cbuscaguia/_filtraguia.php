<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'filtra-form',	
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
)); ?>



	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'d_fectra'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'d_fectra',
				'value'=>$model->d_fectra,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					)));
		?>
		<?php echo $form->error($model,'d_fectra'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'d_fectra1'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'d_fectra1',
				'value'=>$model->d_fectra1,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					)));
		?>
		<?php echo $form->error($model,'d_fectra1'); ?>
	</div>
	
	
		
	<div class="row buttons">
		<?php echo CHtml::submitButton( 'Filtrar' ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->