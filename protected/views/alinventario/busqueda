<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alinventario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php   $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'codcen',$datos, array(  'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl('Alinventario/cargaalmacenes1'), //  la acción que va a cargar el segundo div 
									    'update' => '#Alinventario_codalm' // el div que se va a actualizar
											  ),
									  'empty'=>'--Seleccione un centro--',
									  'disabled'=>$model->isNewRecord ?'':'disabled',

									  ) ) ;
		?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>
	




	<div>	  
		
		<?php echo $form->labelEx($model,'codalm'); ?>
		<?php
		     $datos = CHtml::listData(Almacenes::model()->findAll(array('order'=>'nomal')),'codalm','nomal');
echo $form->DropDownList($model,'codalm',$datos, array('empty'=>'--Llene el centro--','disabled'=>$model->isNewRecord ?'':'disabled',));

		?>
		<?php echo $form->error($model,'codalm'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'periodocontable'); ?>
		<?php echo $form->textField($model,'periodocontable',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'periodocontable'); ?>
	</div>

	

	    <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
	       if( $model->isNewRecord ) {
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codart',
												'ordencampo'=>6,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fhdfj',
													));
													

										 echo $form->error($model,'codart');
						} else {

								echo CHtml::textField('Sax',$model->codart,array('disabled'=>'disabled','size'=>8)) ;
							echo CHtml::textField('Sa',$model->maestro->descripcion,array('disabled'=>'disabled','size'=>40)) ;
						}

			   ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantlibre'); ?>
		<?php echo $form->textField($model,'cantlibre'); ?>
		<?php echo $form->error($model,'cantlibre'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'canttran'); ?>
		<?php echo $form->textField($model,'canttran'); ?>
		<?php echo $form->error($model,'canttran'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'cantres'); ?>
		<?php echo $form->textField($model,'cantres'); ?>
		<?php echo $form->error($model,'cantres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punit'); ?>
		<?php echo $form->textField($model,'punit'); ?>
		<?php echo $form->error($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php  $datos1 = CHtml::listData(TMoneda::model()->findAll(),'codmoneda','desmon');
		  echo $form->DropDownList($model,'codmon',$datos1, array('empty'=>'--Seleccione moneda--'  ) ) ;
		?>
	
		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ubicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lote'); ?>
		<?php echo $form->textField($model,'lote',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siid'); ?>
		<?php echo $form->textField($model,'siid'); ?>
		<?php echo $form->error($model,'siid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ssiduser'); ?>
		<?php echo $form->textField($model,'ssiduser',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ssiduser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->