<?php
/* @var $this CotiController */
/* @var $model Coti */
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
				'visiblex'=>array('10'),
			),
			'clear'=>array(
				'type'=>'E',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
		);
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		); ?>

	</div>


	
		

		<div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codpro',
					//'ordencampo'=>1,
					'controlador'=>'VwObjetos',
					'relaciones'=>$model->relations(),
					'tamano'=>8,
					'model'=>$model,
					'nombremodelo'=>'Clipro',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);


			?>
		</div>

	

		<div class='division_2'>
			<div class="row">
				<?php echo $form->labelEx($model,'codigo'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'codart',
						//'ordencampo'=>1,
						'controlador'=>'ObjetosCliente',
						'relaciones'=>$model->relations(),
						'tamano'=>10,
							'model'=>$model,
						'nombremodelo'=>'Masterequipo',
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						//'nombrearea'=>'fehdfj',
					)

				);


				?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'codobjeto'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'numsolpe',
						//'ordencampo'=>1,
						'controlador'=>'ObjetosCliente',
						'relaciones'=>$model->relations(),
						'tamano'=>8,
						'model'=>$model,
						'nombremodelo'=>'ObjetosCliente',
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						//'nombrearea'=>'fehdfj',
					)

				);


				?>
			</div>


			<div class="row">
						<?php echo $form->label($model,'rucpro'); ?>
						<?php echo $form->textField($model,'rucpro',array('size'=>14,'maxlength'=>14)); ?>
			</div>
                        <div class="row">
						<?php echo $form->label($model,'descripcion'); ?>
						<?php echo $form->textField($model,'descripcion',array('size'=>34,'maxlength'=>34)); ?>
			</div>
                        <div class="row">
						<?php echo $form->label($model,'serie'); ?>
						<?php echo $form->textField($model,'serie',array('size'=>14,'maxlength'=>14)); ?>
			</div>
                        <div class="row">
						<?php echo $form->label($model,'marca'); ?>
						<?php echo $form->textField($model,'marca',array('size'=>14,'maxlength'=>14)); ?>
			</div>
                    <div class="row">
						<?php echo $form->label($model,'modelo'); ?>
						<?php echo $form->textField($model,'modelo',array('size'=>14,'maxlength'=>14)); ?>
			</div>
                        <div class="row">
						<?php echo $form->label($model,'descripcion'); ?>
						<?php echo $form->textField($model,'descripcion',array('size'=>34,'maxlength'=>34)); ?>
			</div>
	
					


		</div>
			<?php $this->endWidget(); ?>

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
		'width'=>700,
		'height'=>500,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%" style="overflow-y:hidden;overflow-x:hidden;"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

</div>