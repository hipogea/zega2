<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="wide form">
		<div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'masterequipo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('disabled'=>'disabled','size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('disabled'=>'disabled','size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
				<?php } ?>
	</div>

	<div class="row">
		<?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('disabled'=>'disabled',)); ?>
		<?php echo $form->error($model,'marca'); ?>
		<?php } ?>
	</div>
			<div class="row">

					<?php echo $form->labelEx($model,'cant'); ?>
					<?php echo $form->textField($model,'cant'); ?>
					<?php echo $form->error($model,'cant'); ?>

			</div>

	<div class="row">
		<?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('disabled'=>'disabled',)); ?>
		<?php echo $form->error($model,'modelo'); ?>
		<?php } ?>
	</div>

	<div class="row">
		<?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'numeroparte'); ?>
		<?php echo $form->textField($model,'numeroparte',array('disabled'=>'disabled','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numeroparte'); ?>
		<?php } ?>
	</div>




			<div class="row">
				<?php echo $form->labelEx($model,'codart'); ?>
				<?php


					$this->widget('ext.matchcode.MatchCode',array(
							'nombrecampo'=>'codart',
							'ordencampo'=>6,
							'controlador'=>$this->id,
							'relaciones'=>$model->relations(),
							'tamano'=>10,
							'model'=>$model,
							'form'=>$form,
							'nombredialogo'=>'cru-dialog3',
							'nombreframe'=>'cru-frame3',
							'nombrearea'=>'fehdaaafj',
						)

					);

				?>
				<?php echo $form->error($model,'codart'); ?>

			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'codigopadre'); ?>
				<?php


				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codigopadre',
						'ordencampo'=>3,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>14,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombrecamporemoto'=>'codigo',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehdxaaafj',
					)

				);

				?>
				<?php echo $form->error($model,'codigopadre'); ?>

			</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

		</div>
	</div>
</div><!-- form -->


<?php

if($model->canthijos > 0){
 $this->widget('CTreeView',array(
		'id'=>'unitX-treeview',
		'url'=>yii::app()->createUrl('request/llenaEquipos',array('rootId'=>$model->id)),
		'htmlOptions'=>array(
			'class'=>'treeview-red'
		)
	));
}


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