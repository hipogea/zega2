<?php
/* @var $this CargosController */
/* @var $model Cargos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigocentro'); ?>
			<?php
		    	 $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
				echo $form->DropDownList($model,'codigocentro',$datos, array('empty'=>'--Llene el centro --','disabled'=>$this->eseditable($model->codigoestadocargo)));

			?>
		<?php echo $form->error($model,'codigocentro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descargo'); ?>
		<?php echo $form->textField($model,'descargo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'descargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_cargo'); ?>
		<?php echo $form->textArea($model,'m_cargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'m_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codjefe'); ?>
		 <?php
		   if ($this->eseditable($model->codigoestadocargo)=='')
		
						{
		   $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codjefe',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'c89',
													)
													
								);
		   } else{
						echo CHtml::textField('erSa',$model->jefe->nombres,array('disabled'=>'disabled','size'=>40)) ;
				
								}
								
			   ?>


	
		<?php echo $form->error($model,'codjefe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codentrega'); ?>
	
			 <?php
		   if ($this->eseditable($model->codigoestadocargo)=='')
		
						{
		   $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codentrega',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'c892',
													)
													
								);
		   } else{
						echo CHtml::textField('erSa1',$model->entrega->nombres,array('disabled'=>'disabled','size'=>40)) ;
				
								}
								
			   ?>



		<?php echo $form->error($model,'codentrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codrecibe'); ?>
	
			 <?php
		   if ($this->eseditable($model->codigoestadocargo)=='')
		
						{
		   $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codrecibe',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'c8923',
													)
													
								);
		   } else{
						echo CHtml::textField('erSa13',$model->recibe->nombres,array('disabled'=>'disabled','size'=>40)) ;
				
								}
								
			   ?>
		<?php echo $form->error($model,'codrecibe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecdocumento'); ?>
	<?php
				if ($this->eseditable($model->codigoestadocargo)=='')
		
						{			  
							  
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecdocumento',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															'disabled'=>$this->eseditable($model->codigoestadocargo)
															),
															));
					} else{
						echo $form->textField($model,'fecdocumento',array('disabled'=>'disabled','size'=>10)) ;
				
								}
								?>	
		<?php echo $form->error($model,'fecdocumento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecentrega'); ?>
		<?php
				if ($this->eseditable($model->codigoestadocargo)=='')
		
						{			  
							  
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecentrega',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															'disabled'=>$this->eseditable($model->codigoestadocargo)
															),
															));
					} else{
						echo $form->textField($model,'fecentrega',array('disabled'=>'disabled','size'=>10)) ;
				
								}
								?>	
		<?php echo $form->error($model,'fecentrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipocargo'); ?>
		<?php echo $form->textField($model,'codtipocargo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codtipocargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoestadocargo'); ?>
		<?php IF(!$model->isNewRecord) { 
		       
		     echo CHtml::textField('hola',
			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>'026',':miestado'=>$model->codigoestadocargo))->estado,
			  array('disabled'=>'disabled','size'=>20));
			  }
			  echo $form->hiddenField($model,'codigoestadocargo');
		?>
		
		<?php echo $form->error($model,'codigoestadocargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnumcargo'); ?>
		<?php echo $form->textField($model,'cnumcargo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cnumcargo'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'avisarvencimiento'); ?>
		<?php echo $form->checkBox($model,'avisarvencimiento', ARRAY('checked'=>'checked'));?>
		<?php echo $form->error($model,'avisarvencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechavencimiento'); ?>
	<?php
				if ($this->eseditable($model->codigoestadocargo)=='')
		
						{			  
							  
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechavencimiento',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															'disabled'=>$this->eseditable($model->codigoestadocargo)
															),
															));
					} else{
						echo $form->textField($model,'fechavencimiento',array('disabled'=>'disabled','size'=>10)) ;
				
								}
								?>	
		<?php echo $form->error($model,'fechavencimiento'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
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
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>