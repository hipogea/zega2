<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">


		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos1 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		echo $form->DropDownList($model,'codocu',$datos1, array('empty'=>'--Seleccione un documento--')  )  ;
		?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codimpuesto'); ?>
		<?php  $datos1 = CHtml::listData(Impuestos::model()->findAll(array('order'=>'descripcion')),'codimpuesto','descripcion');
		echo $form->DropDownList($model,'codimpuesto',$datos1, array('empty'=>'--Seleccione un impuesto--')  )  ;
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->