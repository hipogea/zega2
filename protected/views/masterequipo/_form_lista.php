<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="wide form">
		<div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'masterequipolista-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>




			<div class="row">

					
					<?php echo $form->hiddenField($model,'codigo'); ?>
					

			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'hidlista'); ?>
				<?php


					$this->widget('ext.matchcode.MatchCode',array(
							'nombrecampo'=>'hidlista',
							'ordencampo'=>1,
							'controlador'=>$this->id,
							'relaciones'=>$model->relations(),
							'tamano'=>3,
							'model'=>$model,
							'form'=>$form,
							'nombredialogo'=>'cru-dialog3',
							'nombreframe'=>'cru-frame3',
							'nombrearea'=>'fehdaeraafj',
						)

					);

				?>
				<?php echo $form->error($model,'hidlista'); ?>

			</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

		</div>
	</div>
</div><!-- form -->











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