<div STYLE="overflow:auto;">
    <div class="division">

        <?php echo $form->hiddenField($modelodetalle,'codart',array('value'=>$model->codigo)); ?>



        <div class="row">
		<?php echo $form->labelEx($modelodetalle,'codcentro'); ?>
		<?php echo $form->textField($modelodetalle,'codcentro',array('size'=>4,'maxlength'=>4,'disabled'=>'disabled' )); ?>
		<?php echo $form->error($modelodetalle,'codcentro'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($modelodetalle,'codal'); ?>
		<?php echo $form->textField($modelodetalle,'codal',array('size'=>3,'maxlength'=>3, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($modelodetalle,'codal'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'supervisionautomatica'); ?>
        <?php echo $form->checkBox($modelodetalle,'supervisionautomatica'); ?>
        <?php echo $form->error($modelodetalle,'supervisionautomatica'); ?>
    </div>


    <div class="row">
		<?php echo $form->labelEx($modelodetalle,'canteconomica'); ?>
		<?php echo $form->textField($modelodetalle,'canteconomica',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'canteconomica'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($modelodetalle,'sujetolote'); ?>
            <?php echo $form->checkBox($modelodetalle,'sujetolote',array('disabled'=>($model->esmateriallibrecentro($model->codcent))?'':'disabled')); ?>
            <?php echo $form->error($modelodetalle,'sujetolote'); ?>
        </div>



    <div class="row">
		<?php echo $form->labelEx($modelodetalle,'cantreposic'); ?>
		<?php echo $form->textField($modelodetalle,'cantreposic',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'cantreposic'); ?>
    </div>




   <div class="row">
		<?php echo $form->labelEx($modelodetalle,'cantreorden'); ?>
		<?php echo $form->textField($modelodetalle,'cantreorden',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'cantreorden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelodetalle,'leadtime'); ?>
		<?php echo $form->textField($modelodetalle,'leadtime',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'leadtime'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'catval'); ?>
        <?php echo $form->textField($modelodetalle,'catval',array('size'=>4,'maxlength'=>4,'disabled'=>$habilitado )); ?>
        <?php echo $form->error($modelodetalle,'catval'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'punitv'); ?>
        <?php echo $form->textField($modelodetalle,'punitv',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
        <?php echo $form->error($modelodetalle,'punitv'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'punitstd'); ?>
        <?php echo $form->textField($modelodetalle,'punitstd',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
        <?php echo $form->error($modelodetalle,'punitstd'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'controlprecio'); ?>
        <?php echo $form->textField($modelodetalle,'controlprecio',array('size'=>1,'maxlength'=>1,'disabled'=>$habilitado )); ?>
        <?php echo $form->error($modelodetalle,'controlprecio'); ?>
    </div>

    </div>
</div>

	