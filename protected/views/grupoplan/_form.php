<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="wide form">
		<div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupoplan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
            <?php $datosx=CHTml::listdata(Oficios::model()->findAll(),'codof','oficio'); ?>
		<?php echo $form->DropdownList($model,'codgrupo',$datosx,array('empty'=>'--Seleccione oficia--')); ?>
		
            
		<?php //echo $form->textField($model,'codgrupo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropdownList($model,'codmon',$datos,array('empty'=>'--Seleccione moneda--')); ?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	
	<div class="row">


		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php
		$datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro emisor--'));

		?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tarifa'); ?>
		<?php echo $form->textField($model,'tarifa',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'tarifa'); ?>
	</div>

          <div class="row">
		<?php echo $form->labelEx($model,'escenario'); ?>
		<?php  echo $form->DropDownList($model,'escenario', Grupoplan::getEscenarios(), array('empty'=>'--Llene el Escenario--')); ?>

		<?php echo $form->error($model,'escenario'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
		</div></div>
</div><!-- form -->