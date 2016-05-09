<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="form">
	<div class="wide form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ingfactura-form',
			'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>false,

		)); ?>
	<?php echo $form->errorSummary($model); ?>

		<div class="row">

			<div class="row">
				<?php
				$botones=array(
					'go'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array(ESTADO_PREVIO,NUll),
					),
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array(ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO,ESTADO_CONFIRMADO,ESTADO_FACTURADO),
					),

					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/anularingreso',array('id'=>$model->id)),//anula guia
						'visiblex'=>array(ESTADO_CREADO),

					),

					'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
						'visiblex'=>array(ESTADO_PREVIO,ESTADO_CREADO,ESTADO_APROBADO,ESTADO_ANULADO,ESTADO_PROCESO_COMPRA),
					),

				);
				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>$model->{$this->campoestado},
					)
				);?>

			</div>
		</div>

		<div class="panelizquierdo">




		<div class="row">
			<?php echo $form->labelEx($model,'numrecepcion'); ?>
			<?php echo $form->textField($model,'numrecepcion',array('disabled'=>'disabled','size'=>10,'maxlength'=>10)); ?>

		</div>



		<div class="row">
			<?php echo $form->labelEx($model,'seriedoc'); ?>
			<?php echo $form->textField($model,'seriedoc',array('size'=>5,'maxlength'=>5)); ?>
			<?php echo $form->error($model,'seriedoc'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'numerodoc'); ?>
			<?php echo $form->textField($model,'numerodoc',array('size'=>13,'maxlength'=>13)); ?>
			<?php echo $form->error($model,'numerodoc'); ?>
		</div>

			<div class="row">
				<?php echo $form->labelEx($model,'codestado'); ?>
				<?php
				echo CHtml::textField('syuvfj667fs',$model->estado->estado, array('disabled'=>'disabled','size'=>15));
				?>
			</div>







			<div class="row">
			<?php echo $form->labelEx($model,'fecha'); ?>
			<?php if ($model->isNewRecord)
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
				));

			} else{
				echo $form->textField($model,'fecha',array('disabled'=>'disabled','size'=>14)) ;

			}

			?>
			<?php echo $form->error($model,'fecha'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechadoc'); ?>
			<?php if ($model->isNewRecord)
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechadoc',
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
				));

			} else{
				echo $form->textField($model,'fechadoc',array('disabled'=>'disabled','size'=>14)) ;

			}

			?>
			<?php echo $form->error($model,'fechadoc'); ?>
		</div>


</div>
		<div class="panelderecho">


	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'fechacrea'); ?>
		<?php echo $form->textField($model,'fechacrea',array('disabled'=>'disabled')); ?>

	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codcentro'); ?>
			<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
			echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione un centro--',  'disabled'=>($model->isNewRecord)?'':'disabled',
			) ) ;
			?>
			<?php echo $form->error($model,'codcentro'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numocompra'); ?>

		<?php if($model->isNewRecord) { ?>
				<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
			'nombrecampo'=>'numocompra',
			'controlador'=>$this->id,
			'tamano'=>9,
			'model'=>$model,
			'nombreclase'=>'VwOcompra',
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
		));
		?>
	<?php }else{ ?>
			<?php
			echo CHtml::textField('sj67667fs',$model->numocompra, array('disabled'=>'disabled','size'=>15));
			echo CHtml::textField('sj6756667fs',Ocompra::model()->findByNumero($model->numocompra)->clientes->despro, array('disabled'=>'disabled','size'=>25));
			?>

    <?php } ?>
		<?php echo $form->error($model,'numocompra'); ?>



	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idgarita'); ?>
		<?php echo $form->textField($model,'idgarita',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'idgarita'); ?>
	</div>
</div>



  <?php
		$this->renderpartial('vw_detalle',array('model'=>$model),false);
  ?>




<?php $this->endWidget(); ?>

</div>
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