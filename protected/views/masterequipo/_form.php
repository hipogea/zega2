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
		<?php //if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
				<?php //} ?>
	</div>

	<div class="row">
		<?php //if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array()); ?>
		<?php echo $form->error($model,'marca'); ?>
		<?php //} ?>
	</div>
			<div class="row">

					<?php echo $form->labelEx($model,'cant'); ?>
					<?php echo $form->textField($model,'cant'); ?>
					<?php echo $form->error($model,'cant'); ?>

			</div>

	<div class="row">
		<?php //if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array()); ?>
		<?php echo $form->error($model,'modelo'); ?>
		<?php //} ?>
	</div>

	<div class="row">
		<?php //if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'numeroparte'); ?>
		<?php echo $form->textField($model,'numeroparte',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numeroparte'); ?>
		<?php // } ?>
	</div>
<div class="row">
		<?php //if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'esubicacion'); ?>
		<?php echo $form->checkBox($model,'esubicacion',array('disabled'=>($model->canthijos>0)?'disabled':'')); ?>
		<?php //echo $form->error($model,'numeroparte'); ?>
		<?php // } ?>
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
                            <?php if(!$model->isNewRecord ) { ?>
				<?php echo $form->labelEx($model,'codigopadre'); ?>
				<?php
                            if($model->escampohabilitado('codobjeto')){

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

                            );}
                            else{
                              echo CHtml::textField('h52sgs',$model->parent->codigo,array('size'=>8, 'disabled'=>'disabled'));
                                echo CHtml::textField('h542sgs',$model->parent->descripcion,array('size'=>40, 'disabled'=>'disabled'));
				  
                            }
                            /*var_dump($model->padres);echo "<br><br>";
                            var_dump($model->padres);echo "<br><br>";
                            var_dump($model->canthijos);echo "<br><br>";
                            var_dump($model->children);echo "<br><br>";
                            var_dump($model->childCount);echo "<br><br>";
                            var_dump($model->nobjetosmaster);echo "<br><br>";
                            var_dump($model->masterrelacion);echo "<br><br>";*/
                                ?>
				<?php echo $form->error($model,'codigopadre'); ?>
                            <?php } ?>

			</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

		</div>
	</div>
</div><!-- form -->
<?php

if(!$model->isNewRecord) {
	?>
<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Hijos'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('_tab_hijos', array('form'=>$form,'model'=>$model),TRUE)
					),

					'Hojas de ruta'=>array('id'=>'tab__',
						'content'=>$this->renderPartial('_tab_lista', array('form'=>$form,'modeloruta'=>$modeloruta,'model'=>$model),TRUE)
					),

					

				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				//'id'=>'MyTabi',
                              )
		);
		
}
                
                
                ?>


<?PHP

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

    