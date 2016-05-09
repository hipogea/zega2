<?php
/* @var $this LugaresController */
/* @var $model Lugares */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugares-form',
	'enableAjaxValidation'=>false,
)); ?>



	<div class="row">
		
		<?php echo $form->hiddenField($model,'codlugar',array('value'=>$codpro)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
		<?php


			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codpro',
					'ordencampo'=>1,
					'controlador'=>$this->id,
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehdfj',
				)

			);

		?>

	</div>

	<div class="row">

			<?php echo CHtml::ajaxLink('mostrar',
				$this->createUrl('/Lugares/display',array()	),
				array(
					'type'=>'GET',
					'data'=>"js:Lugares_codpro.value",
					'replace'=>'#pepin',

				)

			) ;

		?>

	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

</div><!-- form --><!-- form -->

	<div ID="pepin">



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