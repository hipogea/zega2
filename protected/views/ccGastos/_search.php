<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
		<div class="row">
			<?php
			$botones=array(
				'search'=>array(
					'type'=>'A',
					'ruta'=>array(),
					'visiblex'=>array('OK'),
				),

				'print'=>array(
					'type'=>'B',
					'ruta'=>array($this->id.'/imprimirsolo',array()),
					'visiblex'=>array('OK'),
				),

				'pie'=>array(
					'type'=>'D', //AJAX LINK
					'ruta'=>array($this->id.'/generapie',array()),
					'opajax'=>array(
						'type'=>'POST',
						'replace'=>'#graficox',
						'ruta'=>array($this->id.'/generapie',array()),
						'beforeSend' => 'js:function(){
                          						 $("#myDivision").addClass("procesandoajax");
                               							 }',
						'complete' => 'function(){
                                         $("#myDivision").removeClass("procesandoajax");
                                         $("#myDivision").html("Se genero el PDF CON EXITO").fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                        $("#myDivision").append(".");
                                         }'
					),
					/*'success'=>'function(data) {
                                     $("#myDivision").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                    }'
                                    ),*/
					'visiblex'=>array('OK'),

				),

			);
			$this->widget('ext.toolbar.Barra',
				array(
					//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
					'botones'=>$botones,
					'size'=>24,
					'extension'=>'png',
					'status'=>'OK',

				)
			);?>
		</div>



	<div class="panelizquierdo">

	<div class="row">
		<?php	echo $form->labelEx($model,'ceco'); ?>

		<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
			'nombrecampo'=>'ceco',
			'controlador'=>'VwCostos',
			'tamano'=>12,
			'model'=>$model,
			'nombreclase'=>'Cc',
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
		));
		?>

	</div>




	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>25,'maxlength'=>25)); ?>
	</div>





	<div class="row">
		<?php echo $form->label($model,'ano'); ?>
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mes'); ?>
		<?php echo $form->textField($model,'mes',array('size'=>2,'maxlength'=>2)); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
	<div class="panelderecho">

	</div>


</div>
</div><!-- search-form -->
<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Crear item',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
	<iframe id="cru-frame3" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
<div id="graficox" style="background-color: white;">


</div>