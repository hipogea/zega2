<div class="wide form">
    <div class="form">
        <div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
                <div class="row">
			<?php echo $form->labelEx($model,'serie'); ?>
			<?php echo $form->textField($model,'serie',ARRAY('size'=>6,'disabled'=>'disabled')); ?>
			
		</div>
	
	
		<div class="row">
		<?php echo $form->labelEx($model,'codarea'); ?>
		<?php  $datos1 = CHtml::listData(Areas::model()->findAll(),'codarea','area');
		  echo $form->DropDownList($model,'codarea',$datos1, array('disabled'=>'disabled')  )  ;
		?>
	
                </div>
	


	<div class="row">
		<?php echo $form->labelEx($model,'hidfondo'); ?>

			<?php echo $form->textField($model,'hidfondo',ARRAY('VALUE'=>$model->fondo->desfondo,'size'=>26,'disabled'=>'disabled')); ?>

		
	
	</div>






	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php
		
		echo $form->textField($model,'codtra',ARRAY('VALUE'=>$model->trabajadores->ap,'size'=>26,'disabled'=>'disabled')); ?>
 
		
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'hidperiodo'); ?>
                        <?php 
                                $datos1 = CHtml::listData(Periodos::model()->findAll("activo='1'"),'id','desperiodo');
		  	echo $form->DropDownList($model,'hidperiodo',$datos1, array('disabled'=>'disabled',
				 ) ) ;
                    ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',ARRAY('size'=>40,'disabled'=>'dosabled')); ?>
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fechaini'); ?>
		<?php	echo $form->textField($model,'fechaini',ARRAY('size'=>9,'disabled'=>'disabled')); ?>
 
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechafin'); ?>
		<?php	echo $form->textField($model,'fechafin',ARRAY('size'=>9,'disabled'=>'disabled')); ?>
 
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',ARRAY('value'=>($model->isNewRecord )?"":$model->estado->estado,'size'=>20,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'valornominal'); ?>

			<?php echo $form->textField($model,'valornominal',ARRAY('size'=>10,'disabled'=>'disabled')); ?>

		
		<?php echo $form->error($model,'valornominal'); ?>
	</div>



	

<?php $this->endWidget(); ?>

        </div>
  
        </div>  
</div>  