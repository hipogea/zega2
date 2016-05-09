<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detercuentas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcatval'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codcatval',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>6,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fehgffdfj',
			)

		);
		?>
		<?php echo $form->error($model,'codcatval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codop'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codop',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>6,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fe5656hdfj',
			)

		);
		?>
		<?php echo $form->error($model,'codop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuentadebe'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'cuentadebe',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>18,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fe5343hdfj',
			)

		);
		?>
		<?php echo $form->error($model,'cuentadebe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuentahaber'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'cuentahaber',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>18,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'feju77hdfj',
			)

		);
		?>
		<?php echo $form->error($model,'cuentahaber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hcodmov'); ?>
		<?php echo $form->textField($model,'hcodmov',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'hcodmov'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>

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
