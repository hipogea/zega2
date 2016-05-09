<div STYLE="overflow:auto;">
	<div class="division">

	
	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--','disabled'=>$habilitado ) ) ;
		?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codean'); ?>

			<?php echo $form->TextField($model,'codean' ) ;?>

			<?php echo $form->error($model,'codean'); ?>
		</div>

	<div class="row">
	<?php echo $form->labelEx($model,'esrotativo'); ?>
	<?php
	echo $form->CheckBox($model,'esrotativo',array('disabled'=>($model->esmateriallibre())?'':'disabled'))  ;
	?>
	<?php echo $form->error($model,'esrotativo'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40,'disabled'=>$habilitado )); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>35,'maxlength'=>35,'disabled'=>$habilitado )); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>35,'maxlength'=>35,'disabled'=>$habilitado )); ?>
        <?php echo $form->error($model,'modelo'); ?>
	</div>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'nparte'); ?>
		<?php echo $form->textField($model,'nparte',array('size'=>35,'maxlength'=>35,'disabled'=>$habilitado )); ?>
		<?php echo $form->error($model,'nparte'); ?>
	</div>



		<div class="row">
			<?php echo $form->labelEx($model,'codigoosce'); ?>
			<?php echo $form->textField($model,'codigoosce',array('size'=>20,'maxlength'=>20,'disabled'=>$habilitado )); ?>
			<?php echo $form->error($model,'codigoosce'); ?>
		</div>



		<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php
$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--','disabled'=>($model->esmateriallibre())?$habilitado:'disabled' )  )  ;
 ?>
		<?php  echo $form->error($model,'um'); ?>
	</div>


    

  <?php
  	$form->hiddenField($model,'escompletar', array('value'=>'no'));
  ?>

	</div>
</div>


