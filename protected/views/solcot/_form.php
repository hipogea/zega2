<?php
/* @var $this SolcotController */
/* @var $model Solcot */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="wide form">
		<div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solcot-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>




			<div class="row">
				<?php
				$botones=array(

					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array(ESTADO_CREADO,ESTADO_PREVIO),
					),

					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>66)),
						'visiblex'=>array(ESTADO_CREADO),

					),
					'briefcase'=>array(
						'type'=>'D', //AJAX LINK
						'ruta'=>array($this->id.'/generadetalle',array('id'=>$model->id)),
						'opajax'=>array(
							'type'=>'POST',
							'ruta'=>array($this->id.'/generadetalle',array('id'=>$model->id)),
							'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}'
						),

						'visiblex'=>array(ESTADO_CREADO),

					),
					'ok'=>array(
						'type'=>'B', //AJAX LINK
						'ruta'=>array($this->id.'/publicar',array('id'=>$model->id)),
						'visiblex'=>array(ESTADO_CREADO),

					),

					'undo'=>array(
						'type'=>'B', //AJAX LINK
						'ruta'=>array($this->id.'/ocultar',array('id'=>$model->id)),
						'visiblex'=>array(ESTADO_PUBLICADO),

					),


				);

				/*VAR_DUMP($model->{$this->campoestado});
                                YII::APP()->END();*/
				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>$model->codestado,

					)
				);?>


			</div>













	<?php echo $form->errorSummary($model); ?>




			<div class="panelizquierdo">

				<div class="row">
					<?php echo $form->labelEx($model,'numero'); ?>
					<?php echo $form->textField($model,'numero',array('size'=>15,'maxlength'=>15)); ?>
					<?php echo $form->error($model,'numero'); ?>
				</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
		<?php


		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codpro',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>8,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fehdx',
			)

		);

		?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>



			<div class="row">
				<?php //if(!$model->isnewRecord) { ?>
				<?php echo $form->labelEx($model,'idcontacto'); ?>
				<?php
				$criterio=new CDbCriteria;
				$criterio->addcondition("c_hcod='".$model->codpro."'");
				$datos1 = CHtml::listData(Contactos::model()->findAll(),'id','c_nombre');
				echo Chtml::ajaxLink(
					Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
					CController::createUrl('Contactos/Contactosporprove'), array(
						'type' => 'POST',
						'url' => CController::createUrl('Contactos/Contactosporprove'), //  la acción que va a cargar el segundo div
						'update' => '#Solcot_idcontacto', // el div que se va a actualizar
						'data'=>array('codigoprov'=>'js:Solcot_codpro.value'),
					)

				);
				echo $form->DropDownList($model,'idcontacto',$datos1, array('empty'=>'--Seleccione Contacto--' ) ) ;



				?>
				<?php echo $form->error($model,'idcontacto'); ?>
				<?php //} ?>
			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'fecha'); ?>
				<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fecha',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
						'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						'readonly'=>'readonly',
					),
				));
				?>
				<?php echo $form->error($model,'fecha'); ?>
			</div>


			</div>
				<div class="panelderecho">
	<div class="row">
		<?php echo $form->labelEx($model,'vigencia'); ?>
		<?php echo $form->textField($model,'vigencia',array('size'=>5)); ?>
		<?php echo $form->error($model,'vigencia'); ?>
	</div>

			<div class="row">


				<?php echo $form->labelEx($model,'codmon'); ?>
				<?php $datos1=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>

				<?php echo $form->DropDownList($model,'codmon',$datos1, array('empty'=>'--Seleccione moneda--' ) ) ;
				?>

				<?php echo $form->error($model,'codmon'); ?>


			</div>





	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

					<div class="row">
						<?php echo $form->labelEx($model,'mail'); ?>
						<?php echo $form->checkBox($model,'mail'); ?>

					</div>

	<div class="row">
		<?php echo $form->labelEx($model,'indicaciones'); ?>
		<?php echo $form->textArea($model,'indicaciones',array('rows'=>3, 'cols'=>40)); ?>
		<?php echo $form->error($model,'indicaciones'); ?>
	</div>
				</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>

<?php
if(!$model->isNewRecord) {
	?>

	<?php  $this->renderPartial('detalle_grilla', array('model'=>$model),false, true);
	?>



	<?php } ?>

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