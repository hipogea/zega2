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
		<?php echo $form->labelEx($model,'codcuenta'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codcuenta',
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
		<?php echo $form->error($model,'codcuenta'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'debehaber'); ?>
		<?php  $datos = array('D'=>'Debe','H'=>'Haber');
		  echo $form->DropDownList($model,'debehaber',$datos, array('empty'=>'--Seleccione un documento--')  )  ;
		?>
		<?php echo $form->error($model,'debehaber'); ?>
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
