
<div class="row">
	<?php echo $form->labelEx($model,'email_smtpdebug'); ?>
	<?php echo $form->textField($model,'email_smtpdebug',array("size"=>1)); ?>
	<?php echo $form->error($model,'email_smtpdebug'); ?>
</div>
<BR>

<div class="row">
	<?php echo $form->labelEx($model,'email_smtpauth'); ?>
	<?php echo $form->checkBox($model,'email_smtpauth'); ?>
	<?php echo $form->error($model,'email_smtpauth'); ?>
</div>
<BR>



	<div class="row">
		<?php echo $form->labelEx($model,'email_servemail'); ?>
				<?php echo $form->textField($model,'email_servemail',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email_servemail'); ?>
	</div>

<div class="row">
	<?php echo $form->labelEx($model,'email_cuentahost'); ?>
	<?php echo $form->textField($model,'email_cuentahost',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'email_cuentahost'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'email_nombrewebmaster'); ?>
	<?php echo $form->textField($model,'email_nombrewebmaster',array('size'=>60,'maxlength'=>60)); ?>
	<?php echo $form->error($model,'email_nombrewebmaster'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'email_passwordhost'); ?>
	<?php echo $form->passwordField($model,'email_passwordhost',array('value'=>'','size'=>20,'maxlength'=>20)); ?>
	<?php echo $form->error($model,'email_passwordhost'); ?> 
</div>

<div class="row">
	<?php echo $form->labelEx($model,'email_adminemail'); ?>
	<?php echo $form->textField($model,'email_adminemail',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'email_adminemail'); ?>
</div>


<div class="row">
	<?php echo $form->labelEx($model,'email_usamaildeusuario'); ?>
	<?php echo $form->checkBox($model,'email_usamaildeusuario'); ?>
	<?php echo $form->error($model,'email_usamaildeusuario'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'email_rutaficherosdeplantillas').'  '.yii::app()->getBaseUrl(false); ?>
	<?php echo $form->textField($model,'email_rutaficherosdeplantillas',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'email_rutaficherosdeplantillas'); ?>
</div>


<div class="row">
	<?php echo $form->labelEx($model,'email_tiempodeespera'); ?>
	<?php echo $form->textField($model,'email_tiempodeespera',array('size'=>2,'maxlength'=>2)); ?>
	<?php echo $form->error($model,'email_tiempodeespera'); ?>
</div>



