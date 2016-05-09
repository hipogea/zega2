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
)); ?>
<div class="bloque">
	<?php
	$botones=array(
		'save'=>array(
			'type'=>'A',
			'ruta'=>array(),
			'visiblex'=>array('20'),

		),


		'calc'=>array(
			'type'=>'C',
			'ruta'=>array($this->id.'/ajuste',array(
				'id'=>$model->id,"cest"=>'01',
				//"id"=>$model->n_direc,
				"asDialog"=>1,
				"gridId"=>'detalle-grid',
			)
			),
			'dialog'=>'cru-dialog3',
			'frame'=>'cru-frame3',
			'visiblex'=>array('20',($model->codestado=='10'  or $model->diferencia==0)),

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
		<?php echo CHTml::label('Almacen',false); ?>
		<?php echo CHTml::textField('numer32ffgfgfo',$modelocabeza->almacen->codalm,array('disabled'=>'disabled','style'=>'font-size: 14px; color:green; font-weight:bold; ','size'=>3)); ?>
		<?php echo CHTml::textField('numerg676fgfo',$modelocabeza->almacen->nomal,array('disabled'=>'disabled','size'=>26)); ?>

	</div>

	<div class="row">
		<?php echo CHTml::label('Material',false); ?>
		<?php echo CHTml::textField('numerffgfgfo',$modelocabeza->maestro->codigo,array('disabled'=>'disabled','style'=>'font-size: 14px; color:red; font-weight:bold; ','size'=>6)); ?>
		<?php echo CHTml::textField('num455erffgfgfo',$modelocabeza->maestro->maestro_ums->desum,array('disabled'=>'disabled','size'=>2)); ?>
		<?php echo CHTml::textField('numergfgfo',$modelocabeza->maestro->descripcion,array('disabled'=>'disabled','size'=>46)); ?>

	</div>
	<div class="row">
		<?php echo CHTml::label('Libre',false); ?>
		<?php echo CHTml::textField('numerxxffgfgfo',$modelocabeza->cantlibre,array('disabled'=>'disabled','size'=>6)); ?>
	</div>
	<div class="row">
		<?php echo CHTml::label('Reservado',false); ?>
		<?php echo CHTml::textField('numerxxffgfgfo',$modelocabeza->cantres,array('disabled'=>'disabled','size'=>6)); ?>
	</div>
	<div class="row">
		<?php echo CHTml::label('Transito',false); ?>
		<?php echo CHTml::textField('numerxx56gfgfo',$modelocabeza->canttran,array('disabled'=>'disabled','size'=>6)); ?>
	</div>
	<div class="row">
		<?php echo CHTml::label('Cantidad en Inventario',false); ?>
		<?php echo CHTml::textField('num43r4xxffgfgfo',$modelocabeza->getstockregistro(),array('disabled'=>'disabled','size'=>6)); ?>
	</div>
	<hr>





	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php
		$opajax=array(
			'type'=>'GET',
			'url'=>'',
			//'data'=>array('idguia'=>$model->idguia),
			"success"=>"js:function() { $('".get_class($model)."_diferencia').value=".$modelocabeza->getstockregistro()."; }"
		) ;



		?>
		<?php echo $form->textField($model,'cant',array('size'=>4,'ajax'=>$opajax,'maxlength'=>4)); ?>




		<?php echo $form->error($model,'cant'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'diferencia'); ?>
		<?php echo $form->textField($model,'diferencia',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'diferencia'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cantstock'); ?>
		<?php echo $form->textField($model,'cantstock',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled'));?>
		<?php echo $form->error($model,'cantstock');  ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario');?>
		<?php echo $form->error($model,'comentario');  ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	//'name'=>'my_date',
	'model'=>$model,
	'attribute'=>'fecha',
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
		<?php echo $form->error($model,'fecha');  ?>
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