<?php
/* @var $this EventosController */
/* @var $model Eventos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eventos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	

	
	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'codocu',$datos, array(  'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl('Eventos/cargaestadoorigen'), //  la acción que va a cargar el segundo div 
									    'update' => '#Eventos_estadoinicial' // el div que se va a actualizar
											  ),
									  'empty'=>'--Seleccione un documento--',) ) ;
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'estadoinicial'); ?>
		 <?php 
		     if (!$model->isNewRecord) {
		     $criterial = new CDbCriteria;
		      $criterial->condition='codocu=:docu';
		      $criterial->params=array(':docu'=>$model->codocu);
		      $datos = CHtml::listData(Estado::model()->findAll( $criterial),'codestado','estado');
		      }
		 echo $form->dropDownList($model,'estadoinicial', ($model->isNewRecord)?array():$datos, array('ajax' => array(
																		'type' => 'POST',  
																		'url' => CController::createUrl('Eventos/cargaestadodestino'), //  la acción que va a cargar el segundo div 
																		'update' => '#Eventos_estadofinal' // el div que se va a actualizar
																		),
																	'prompt' => 'Seleccione estado inicial' // Valor por defecto 
																	) 
									); 
		 ?>
		<?php echo $form->error($model,'estadoinicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadofinal'); ?>
		 <?php 
		 if (!$model->isNewRecord) {
		     $criterial = new CDbCriteria;
		      $criterial->condition='codocu=:docu';
		      $criterial->params=array(':docu'=>$model->codocu);
		      $datos = CHtml::listData(Estado::model()->findAll( $criterial),'codestado','estado');
		      }
		 echo $form->dropDownList($model,'estadofinal', ($model->isNewRecord)?array():$datos, array('prompt' => 'Seleccione un estado' // Valor por defecto 
																	) 
									); 
		 ?>
		<?php echo $form->error($model,'estadofinal'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>


<?php
				///solo si es el usuario administrador de mensajes

	        If (Yii::app()->params['esmensajero']==$usuario=Yii::app()->user->name and !$model->isNewRecord ) {
			
			$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(	
							'Mensajes'=>array('id'=>'mensajes',
										'content'=>$this->renderPartial(
													'mensajes',
                                               array('model'=>$model,'proveedor'=>$proveedor),true
								 )

											
											),
							
						
							  
							  
								), 
   
						'options' => array(
									'collapsible' => true,
										),
   
													'id'=>'Mytab',
					));

 
					

		}

		?>

</div><!-- form -->


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>300,
        'height'=>200,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>