<?php
/* @var $this IgvController */
/* @var $model Igv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'igv-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'finicio'); ?>
		<?php

			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				//'name'=>'my_date',
				'model'=>$model,
				'attribute'=>'finicio',
				'language'=>Yii::app()->language=='es' ? 'es' : null,
				'options'=>array(
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'button', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>'width:60px;vertical-align:top',
					'readonly'=>'readonly',
				),
			));

		?>
		<?php echo $form->error($model,'finicio'); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'ffin'); ?>
		<?php

		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'ffin',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		));

		?>
		<?php echo $form->error($model,'ffin'); ?>

	</div>






	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->