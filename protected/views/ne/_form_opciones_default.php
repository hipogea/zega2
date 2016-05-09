<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo CHtml::label('c_codep','trtur'); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo CHtml::DropDownList('c_codep','',$datos1, array('empty'=>'--Seleccione una referencia--' ) ) ;
		?>
		
	</div>

	<div class="row">
		<?php echo CHtml::label('c_edgui','ieyietiette'); ?>
		<?php  $datos1 = CHtml::listData(Paraqueva::model()->findAll(array('order'=>'motivo')),'cmotivo','motivo');
		  echo CHtml::DropDownList('c_edgui','',$datos1, array('empty'=>'--Seleccione un destino--' ))  ;
		?>
		
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Establecer'); ?>
	</div>
   	
<?php $this->endWidget(); ?>

</div><!-- form -->