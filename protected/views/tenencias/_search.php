<?php
/* @var $this TenenciasController */
/* @var $model Tenencias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<

	<div class="row">
		<?php echo $form->label($model,'deste'); ?>
		<?php echo $form->textField($model,'deste',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	
<?php $this->endWidget(); ?>

</div><!-- search-form -->