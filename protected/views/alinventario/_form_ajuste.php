<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacenmovimientos-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>false,
	'clientOptions' => array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true
	),

)); ?>
<div class="bloque">
	<?php
	$botones=array(
		'save'=>array(
			'type'=>'A',
			'ruta'=>array(),
			'visiblex'=>array('20'),

		),



	);

	$this->widget('ext.toolbar.Barra',
		array(
			//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
			'botones'=>$botones,
			'size'=>24,
			'extension'=>'png',
			'status'=>'20',

		)
	);?>

</div>
	<?php echo $form->errorSummary($model); ?>


		<?php echo $form->hiddenField($model,'hidinventario',array('value'=>$modelocabeza->id)); ?>




	<div class="row">
		<?php echo $form->labelEx($model,'cuentadebe'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'cuentadebe',
				'ordencampo'=>1,
				'controlador'=>get_class($model),
				'relaciones'=>$model->relations(),
				'tamano'=>20,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fehgffdfj',
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
				'tamano'=>20,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fehgffdfj',
			)

		);
		?>
		<?php echo $form->error($model,'cuentahaber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaajuste'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'fechaajuste',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fechaajuste');  ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'iduserajuste'); ?>
		<?php echo $form->textField($model,'iduserajuste',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled')); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'montocontable'); ?>
		<?php echo $form->textField($model,'montocontable',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled')); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled')); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fechacre'); ?>
		<?php echo $form->textField($model,'fechacre',array('size'=>19,'maxlength'=>19,'disabled'=>'disabled'));?>
		<?php echo $form->error($model,'fechacre');  ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Contar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php
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
<?php $this->endWidget();?>