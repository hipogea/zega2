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



		<?php echo $form->hiddenField($model,'hidobjeto'); ?>




<div class="row">
     <?php echo $form->labelEx($model,'hcodobmaster'); ?>
	<?php $this->widget('ext.matchcode.MatchCode',array(
	'nombrecampo'=>'hcodobmaster',
	'ordencampo'=>2,
	'controlador'=>'Objetosmaster',
	'relaciones'=>$model->relations(),
	'tamano'=>14,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'fhdfssesj',
	));
	?>
<?php echo $form->error($model,'hcodobmaster'); ?>
</div>

	<div class="row">
           
		<?php
		$opajax=array(
			'type'=>'POST',
			'url'=>Yii::app()->createUrl('/Objetoscliente/ajaxpintadescripcion'
			),
			'data'=>array('codigo'=>'js:Objetosmaster_hcodobmaster','identificador'=>'js:Objetosmaster_identificador'),
			"replace"=>"#descripcionlarga",
		) ;



		?>
		<?php echo $form->labelEx($model,'identificador'); ?>
		<?php echo $form->textField($model,'identificador',array()); ?>
		<?php echo $form->error($model,'identificador'); ?>

	</div>
         <div class="row">
             <?php $opajax=array(
                 'type'=>'POST',
                 'url'=>yii::app()->createUrl($this->id.'/ajaxpintahijos'),
                 //'url'=>"#",
                 'update'=>'#zonahijos',
                 'data'=>array('codigoobjeto'=>'js:Objetosmaster_hcodobmaster.value'),
                 'ajaxComplete'=>'js:function(data){$("#Objetosmaster_insertahijo").attr("checked", true);}',
             ); ?>
		<?php echo $form->labelEx($model,'insertahijo'); ?>
		<?php echo $form->checkBox($model,'insertahijo'); ?>
		<?php // echo $form->error($model,'insertahijo'); ?>
            <?php echo CHtml::link("Ver Hijos...","#",array('ajax'=>$opajax)); ?>

	</div>
    <div id="zonahijos"></div>
	<div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie'); ?>
		<?php echo $form->error($model,'serie'); ?>


	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo'); ?>
		<?php echo $form->error($model,'textolargo'); ?>

	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar'); ?>
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
