<?php
/* @var $this LugaresController */
/* @var $model Lugares */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugares-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'codlugar',array('value'=>$codpro)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deslugar'); ?>
		<?php 
		  $modelito=Clipro::model()->findByPk($codpro);
		
		echo $form->textField($model,'deslugar',array('size'=>50,'maxlength'=>50, 'value'=>$model->isNewRecord ?$modelito->despro:$model->deslugar )); ?>
		<?php echo $form->error($model,'deslugar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provincia'); ?>
		<?php echo $form->textField($model,'provincia',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'provincia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claselugar'); ?>
		<?php echo $form->textField($model,'claselugar',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'claselugar'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'codpro',array('value'=>$codpro)); ?>
		
	</div>

	<div class="row">
	     
		<?php 
		//$documento='032';
		$criterial = new CDbCriteria;
		$criterial->condition='c_hcod=:docu';
		$criterial->params=array(':docu'=>$codpro);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		 $datos = CHtml::listData(Direcciones::model()->findall($criterial),'n_direc','c_direc');
		 				 echo $form->DropDownList($model,'n_direc',$datos, array('empty'=>'--Indique una direccion--')  )  ;
		
		?>
	
		<?php echo $form->error($model,'n_direc'); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->