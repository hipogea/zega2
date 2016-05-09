<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */
/* @var $form CActiveForm */
?>
<div class="division">


	<div class="wide form">
<div class="form">




		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valorimpuestos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hcodimpuesto'); ?>

		<?php  $datos1 = CHtml::listData(Impuestos::model()->findAll(array('order'=>'descripcion')),'codimpuesto','descripcion');
		echo $form->DropDownList($model,'hcodimpuesto',$datos1, array('empty'=>'--Seleccione un impuesto--')  )  ;
		?>

		<?php echo $form->error($model,'hcodimpuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'finicio'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'finicio',
			'language'=>'es',
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'both', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
				'changeMonth'=>true,
				'changeYear'=>true,
				'yearRange'=>'2000:2099',
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
			),
			'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				'readonly'=>'readonly',
			),
		));
		?>
		<?php echo $form->error($model,'finicio'); ?>
	</div>






	<div class="row">
		<?php echo $form->labelEx($model,'ffinal'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'ffinal',
			'language'=>'es',
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'both', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
				'changeMonth'=>true,
				'changeYear'=>true,
				'yearRange'=>'2000:2099',
				'minDate' => '2000-01-01',      // minimum date
				'maxDate' => '2099-12-31',      // maximum date
			),
			'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				'readonly'=>'readonly',
			),
		));
		?>
		<?php echo $form->error($model,'ffinal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>