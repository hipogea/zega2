<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nombrereporte'); ?>
		<?php echo $form->textField($model,'nombrereporte'); ?>
	</div>




	<div class="row">
		<?php echo $form->label($model,'codocu'); ?>
		<?php  $datos=CHTml::listData(Documentos::model()->findAll(),'coddocu','desdocu');  ?>
		<?php echo $form->dropDownList($model,'codocu',$datos,array('prompt'=>'Seleccione un Documento')); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton( 'Buscar',array('onClick'=>'Loading.show();Loading.hide();')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div><!-- search-form -->