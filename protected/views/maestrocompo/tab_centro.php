<div STYLE="overflow:auto;">
    <div class="division">



            <?php  echo $form->hiddenField($modelodetallecentro,'codcen',array('value'=>$model->codcent)); ?>
            <?php echo $form->hiddenField($modelodetallecentro,'hcodart',array('value'=>$model->codigo)); ?>

        <div class="row">
		<?php echo $form->labelEx($modelodetallecentro,'catvalor'); ?>
		<?php echo $form->textField($modelodetallecentro,'catvalor',array('size'=>3,'maxlength'=>3 )); ?>
		<?php echo $form->error($modelodetallecentro,'catvalor'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($modelodetallecentro,'iqf'); ?>
		<?php echo $form->checkBox($modelodetallecentro,'iqf'); ?>
		<?php echo $form->error($modelodetallecentro,'iqf'); ?>
	</div>


    </div>
</div>


	