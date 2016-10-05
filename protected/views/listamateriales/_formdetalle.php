<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'listamateriales-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>



		<?php echo $form->hiddenField($model,'hidlista'); ?>




<div class="row">
	<?php $this->widget('ext.matchcode.MatchCode',array(
	'nombrecampo'=>'codigo',
	'ordencampo'=>6,
	'controlador'=>'Dlistamaeriales',
	'relaciones'=>$model->relations(),
	'tamano'=>10,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'fhdfsssj',
	));
	?>

</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>3,'maxlength'=>3, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>


		<?php  echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl('Ums/cargaum'), array(
				'type' => 'POST',
				'url' => CController::createUrl('Ums/cargaum'), //  la acci?n que va a cargar el segundo div
				'update' => '#Dlistamaeriales_um', // el div que se va a actualizar
				'data'=>array('codigomaterial'=>'js:Dlistamaeriales_codigo.value'),
			)

		);?>

		<?php IF($model->isNewRecord ){ ?>
<?php
//$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
			$datos=array();
			echo $form->DropDownList($model,'um',$datos, array( 'disabled'=>$habilitado, 'maxlength'=>4)  )  ;
			?>
		<?php }  else { ?>
			<?php echo $form->DropDownList($model,'um',Alconversiones::Listadoums($model->codigo), array('empty'=>'--Um--', 'disabled'=>$habilitado, 'maxlength'=>4)  )  ; ?>


		<?php   } ?>

		<?php echo $form->error($model,'um'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div><!-- form -->
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
		'width'=>400,
		'height'=>300,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>