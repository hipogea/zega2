

	<BR>
	
        <div class="row">
		<?php echo $form->labelEx($model,'conta_montodetraccion'); ?>
		<?php echo $form->textField($model,'conta_montodetraccion',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'conta_montodetraccion'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'conta_patroncuentas'); ?>
		<?php echo $form->textField($model,'conta_patroncuentas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'conta_patroncuentas'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'conta_nperiodosabiertos'); ?>
		<?php echo $form->textField($model,'conta_nperiodosabiertos',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'conta_nperiodosabiertos'); ?>
	</div>

	 <div class="row">
		<?php echo $form->labelEx($model,'conta_formatonumerocomprobantes'); ?>
		<?php echo $form->textField($model,'conta_formatonumerocomprobantes',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'conta_formatonumerocomprobantes'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'conta_multisociedad'); ?>
		<?php echo $form->checkBox($model,'conta_multisociedad'); ?>
		<?php echo $form->error($model,'conta_multisociedad'); ?>
	</div>
  <div class="row">
		<?php echo $form->labelEx($model,'conta_cajachicadevuelvefondo'); ?>
		<?php echo $form->checkBox($model,'conta_cajachicadevuelvefondo'); ?>
		<?php echo $form->error($model,'conta_cajachicadevuelvefondo'); ?>
	</div>
	 <div class="row">
		<?php echo $form->labelEx($model,'conta_abrecajasinrequisitos'); ?>
		<?php echo $form->checkBox($model,'conta_abrecajasinrequisitos'); ?>
		<?php echo $form->error($model,'conta_abrecajasinrequisitos'); ?>
	</div>
        
	<BR>



