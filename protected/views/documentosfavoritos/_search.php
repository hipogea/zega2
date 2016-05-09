<?php
/* @var $this DocumentosfavoritosController */
/* @var $model Documentosfavoritos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php
echo "<div class='botones'>";
echo CHtmL::imageButton(Yii::app()->getTheme()->baseUrl.'/img/bino.png', array ( ));
echo "</div>";
?>

	<div class="row">
		<?php echo $form->label($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>60)); ?>
	</div>





<?php $this->endWidget(); ?>

</div><!-- search-form -->