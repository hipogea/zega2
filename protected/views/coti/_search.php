<?php
/* @var $this CotiController */
/* @var $model Coti */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codpro'); ?>
		<?php
					
				
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codpro',												
												'ordencampo'=>1,
												'controlador'=>'VwCotizacion',
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfj',
													)
													
								);
							
			   ?>
			   
	</div>

	
					<div class="row">
						<?php echo $form->labelEx($model,'fecdoc'); ?>
		
						<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 										array(
												 'model'=>$model,
 												'attribute'=>'fecdoc',
												 'value'=>$model->fecdoc,
 												'language' => 'es',
												 'htmlOptions' => array('readonly'=>"readonly"),
												 'options'=>array(
 												'autoSize'=>true,
 												'defaultDate'=>$model->fecdoc,
 												'dateFormat'=>'yy-mm-dd',
 												'showAnim'=>'fold',
												 'selectOtherMonths'=>true,
 													'showAnim'=>'slide',
 													'showButtonPanel'=>true,
 													'showOn'=>'button',
													 'showOtherMonths'=>true,
													 'changeMonth' => 'true',
 													'changeYear' => 'true',
													 ),
 														)
							);?>
		
					</div>
					<div class="row">
							<?php echo $form->labelEx($model,'fecdoc1'); ?>
		
		
											<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 														array(
 													'model'=>$model,
 													'attribute'=>'fecdoc1',
 													'value'=>$model->fecdoc1,
													 'language' => 'es',
 														'htmlOptions' => array('readonly'=>"readonly"),
 														'options'=>array(
 														'autoSize'=>true,
														 'defaultDate'=>$model->fecdoc1,
 															'dateFormat'=>'yy-mm-dd',
															 'showAnim'=>'fold',
 
 															'selectOtherMonths'=>true,
 															'showAnim'=>'slide',
															 'showButtonPanel'=>true,
 																			'showOn'=>'button',
																 'showOtherMonths'=>true,
 																'changeMonth' => 'true',
 																			'changeYear' => 'true',
 																		),
 																		)
											);?>
		
					</div>
	<div class="row">
		<?php echo $form->label($model,'codcon'); ?>
		<?php echo $form->textField($model,'codcon',array('size'=>5,'maxlength'=>5)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'idcontacto'); ?>
		<?php echo $form->textField($model,'idcontacto',array('size'=>3,'maxlength'=>3)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'orcli'); ?>
		<?php echo $form->textField($model,'orcli',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	
	

	 <div class="row">
	  
		
		<?php echo $form->labelEx($model,'codsociedad'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'codsociedad',$datos1, array('empty'=>'--Seleccione sociedad--')) ;
		?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'codgrupoventas'); ?>
		<?php echo $form->textField($model,'codgrupoventas',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>3,'maxlength'=>3)); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>





<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

</div><!-- search-form -->