<?php
/* @var $this OtController */
/* @var $model Ot */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ot-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="division">
	<div class="wide form">



	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);

	?>
<?php echo $form->hiddenField($model,'id'); ?>
			
		<div class="panelderecho">
		<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>

			<?php echo $form->textField($model,'numero',array('size'=>12,'maxlength'=>12,'Disabled'=>'Disabled')); ?>
			<?php echo $form->error($model,'numero');  ?>
	</div>



		<div class="row">
			<?php echo $form->labelEx($model,'fechainiprog'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechainiprog',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('ui','...'),
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						//'readonly'=>'readonly',
					),
				));
			} else{
				echo $form->textField($model,'fechainiprog',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php echo $form->error($model,'fechainiprog'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacre'); ?>
		<?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'fechacre'); ?>
	</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechafinprog'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechafinprog',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('ui','...'),
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						//'readonly'=>'readonly',
					),
				));
			} else{
				echo $form->textField($model,'fechafinprog',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php echo $form->error($model,'fechafinprog'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechainicio'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechainicio',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('ui','...'),
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						//'readonly'=>'readonly',
					),
				));
			} else{
				echo $form->textField($model,'fechainicio',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php echo $form->error($model,'fechainicio'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechafin'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechafin',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonText'=>Yii::t('ui','...'),
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						//'readonly'=>'readonly',
					),
				));
			} else{
				echo $form->textField($model,'fechafin',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php echo $form->error($model,'fechafin'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php

			if ($model->isNewRecord)

			{
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
			} else{
				echo CHtml::textField('Sa',$model->clipro->despro,array('disabled'=>'disabled','size'=>40)) ;

			}
			?>

		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'idobjeto'); ?>
			<?php

			if ($model->isNewRecord)

			{
				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'idobjeto',
						'ordencampo'=>4,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>6,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'feh77dfddj',
					)

				);
			} else{
				echo $form->textField($model,'idobjeto',array('disabled'=>'disabled','size'=>4)) ;
				echo CHtml::textField('Saccc',VwObjetos::descripcion($model->idobjeto),array('size'=>60,'disabled'=>'disdabled')) ;

			}
			?>
			<?php echo $form->error($model,'idobjeto'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codresponsable'); ?>
			<?php

			if ($this->eseditable($model->codestado)=='')

			{
				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codresponsable',
						'ordencampo'=>1,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>6,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehe367dfddj',
					)

				);
			} else{
				echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

			}
			?>

		</div>

		</div>
			<div class="panelizquierdo">


	<div class="row">
		<?php echo $form->labelEx($model,'textocorto'); ?>
		<?php echo $form->textField($model,'textocorto',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'textocorto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>3, 'cols'=>40)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>


            
	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php                
                            $datos1R = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		 			 echo $form->DropDownList($model,'codcen',$datos1R, array('empty'=>'--Seleccione un centro--',));  
		?>
                    <?php echo $form->error($model,'codcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	

	<div class="row">
    <?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo CHtml::textField('modeldgdgd',$model->estado->estado,array('disabled'=>($editable)?'':'disabled')); ?>
    <?php } ?>	
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

			</div>



</div><!-- form -->

	</div>





<?php
 if(!$model->isNewRecord){
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'Labores'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('tab_labores', array('form'=>$form,'model'=>$model),TRUE)
			),
			'Recursos'=>array('id'=>'tab_ui',
				'content'=>$this->renderPartial('tab_recursos', array('form'=>$form,'model'=>$model,'modelolabor'=>$modelolabor),TRUE)
			),
                    
                    'Rec externos'=>array('id'=>'tab_uifre4',
				'content'=>$this->renderPartial('tab_consignaciones', array('modeloconsi'=>$modeloconsi,'form'=>$form,'model'=>$model,'modeloconsi'=>$modeloconsi),TRUE)
			),
			'Auditoria'=>array('id'=>'tab____..__',
				'content'=>$this->renderPartial('//site/tab_auditoria', array('form'=>$form,'model'=>$model),TRUE)
			),



		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabi',)
);

 }
?>



<?php $this->endWidget(); ?>

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
<?php
$this->endWidget();?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php
$this->endWidget();?>