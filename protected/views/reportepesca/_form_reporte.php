<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */
/* @var $form CActiveForm */
?>

<div class="form">
	
	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reportepesca-form',
	'enableAjaxValidation'=>false,
)); ?>	



 <?php
     $this->renderPartial('vw_reportehora',array('form'=>$form,'model'=>$model));
	 
 ?>
	
	<div >
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Grabar'); ?>
	</div>

	
	
	

<?php $this->endWidget(); ?>

</div><!-- form -->