<?php
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">

		<div class='botones'>
			<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/bino.png',array('value'=>'Buscar','onClick'=>'Loading.show();Loading.hide();'));?>
		</div>
	</div>
	<div class="division">
	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--','disabled'=>'') ) ;
		?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>60)); ?>
	</div>

		<div class="row">
			<?php echo $form->label($model,'esrotativo'); ?>
			<?php echo $form->checkBox($model,'esrotativo'); ?>
		</div>

	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->