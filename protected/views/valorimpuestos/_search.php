<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'hcodimpuesto'); ?>
		<?php  $datos1 = CHtml::listData(Impuestos::model()->findAll(array('order'=>'descripcion')),'codimpuesto','descripcion');
		echo $form->DropDownList($model,'hcodimpuesto',$datos1, array('empty'=>'--Seleccione un impuesto--')  )  ;
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>6,'maxlength'=>6)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->