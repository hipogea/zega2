<?php
/* @var $this MotMatDetController */
/* @var $model MotMatDet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mot-mat-det-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos señalados con <span class="required">*</span> son obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'hidmot'); ?>
		<?php //echo $form->hiddenField($model,'hidmot',array('value'=>,'border'=>0)); 
		?>
		<?php echo $form->hiddenField($model,'hidmot',array('value'=>(!isset(Yii::app()->session['numeropedido']))?$naleatorio:Yii::app()->session['numeropedido'])); ?>
		<?php //echo $form->error($model,'hidmot'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($model,'canti'); ?>
		<?php //echo $form->textField($model,'canti',array('size'=>8,'maxlength'=>8)); ?>
		<?php //echo $form->error($model,'canti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('disabled'=>'disabled','size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		
		<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'=>$model,
							'attribute'=>'codigo',
						//'id'=>'country-single',
						// 'name'=>'country_single',
						'source'=>$this->createUrl('Request/otroMaestrocompo'),
							//'source'=>array('ac1','ac2','ac3'),
						'options'=>array(
						'showAnim'=>'fold',
      
							),
    
					'htmlOptions'=>array(
											'ajax'=>array( 
																'type'=>'POST', 
					//'data'=>array('nombrecampo'=>'coddocu','modelitox'=>$model->relations(),'nombreclase'=>get_class($model)),
																'url'=>Yii::app()->createUrl('/MotMatDet/relaciona',
																								ARRAY('campo'=>'codigo',
																								'miclase'=>'MotMatDet',
																								'ordencampo'=>1,
																								'relaciones'=>$model->relations(),
																									)				
																							),
					//
																'update'=>'#Inventario_documento_desdocu2',
															) ,
						'size'=>'40'
								),
						));

				?>
		<?php echo $form->error($model,'codigo'); ?>
		 <div id="Inventario_documento_desdocu2" > </div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php 
					/*	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'=>$model,
							'attribute'=>empty($model->codigo) ?$model->descripcion  : $model->maestrito->descripcion,
						//'id'=>'country-single',
						// 'name'=>'country_single',
						'source'=>$this->createUrl('Request/suggestMaestrocompo'),
							//'source'=>array('ac1','ac2','ac3'),
						'options'=>array(
						'showAnim'=>'fold',
      
							),
    
					'htmlOptions'=>array(
						'size'=>'40'
								),
						));*/
						
						echo  ($model->isNewRecord) ? $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40))
							: 
							 $form->textField($model,'descripcion',array('value'=>empty($model->codigo) ?$model->descripcion  : $model->maestrito->descripcion,'size'=>40,'maxlength'=>40) );
						

				?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obs'); ?>
		<?php echo $form->textArea($model,'obs',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'obs'); ?>
	</div>

	
	<div class="row">
	
	
	
	
					<?php 
					 if (!isset($codigobarco)) 
							$codigobarco=Yii::app()->user->getField('codep');
					  
					$criteria = new CDbCriteria;
					$criteria->addcondition("codep='".$codigobarco."'");
					$criteria->order = 'descripcion asc';

					//$criteria->addcondition("tienecarter='1'");
					//$criteria->addcondition("codlugar='000015'");
					$datos = CHtml::listData(Inventario::model()->findall($criteria),'codigosap','descripcion');
						?>
					<?php  
					echo ($codigobarco=='000')? $form->textField($model,'codigoequipo',array('size'=>5,'maxlength'=>5)) :
					$form->DropDownList($model,'codigoequipo',$datos, array('empty'=>'--Seleccione un Equipo --')  );
						?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php //echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
		
		<?php echo  ($model->isNewRecord) ? $form->textField($model,'um',array('size'=>4,'maxlength'=>4))
							: 
							 $form->textField($model,'um',array('value'=>empty($model->um) ?$model->um  : $model->maestrito->um,'size'=>4,'maxlength'=>4) );
						
		?>
		
		
		<?php echo $form->error($model,'um'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->