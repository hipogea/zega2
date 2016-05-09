<?php
/* @var $this AuthobjetosController */
/* @var $model Authobjetos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'authobjetos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>


	<div class="row">
		<?php echo CHTml::label('Usuario','Usuario'); ?>
		<?php echo CHTml::textField('Usuario_c',$usuario->username,array('disabled'=>'disabled')); ?>

	</div>

	<div class="row">
		<?php echo CHTml::label('Email','Email'); ?>
		<?php echo CHTml::textField('Email_c',$usuario->email,array('disabled'=>'disabled')); ?>

	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->


<?PHP

$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => array(
			'Valores'=>array('id'=>'tab_general',
				'content'=>$this->renderPartial('tab_valores', array(
					'model'=>$model,'form'=>$form,'usuario'=>$usuario
				),TRUE)),
			'Rangos'=>array('id'=>'tab_logss',
				'content'=>$this->renderPartial('tab_rangos', array(
					'model'=>$model,'form'=>$form,'usuario'=>$usuario
				),TRUE)),

		),
		'options' => array(	'collapsible' => false,
			'heightStyle'=>'auto',
		),
		// set id for this widgets
		'id'=>'MyTabe',
	)
);

?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>