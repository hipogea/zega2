<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
	



)); ?>

<div class="row">

						<?php echo $form->labelEx($model,'tipoitem'); ?>
						<?php  $datos = array('M' => 'Material','S'=> 'Servicio');
							echo $form->DropDownList($model,'tipoitem',$datos, array('empty'=>'--Seleccione un tipo--')  )  ;	?>
						<?php echo $form->error($model,'tipoitem'); ?>
	
</div>
<div class="row">

						<?php echo $form->labelEx($model,'tipoimputacion'); ?>
						<?php  $datos = array('A' => 'Libre','F'=> 'Orden','K'=> 'Ceco');
							echo $form->DropDownList($model,'tipoimputacion',$datos, array(
									 'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl('Ocompra/muestraimput'), //  la acción que va a cargar el segundo div 
									    'update' => '#Chanchito' // el div que se va a actualizar
											  ),
							'empty'=>'--Seleccione imputacion--') 
							 )  ;	?>
						<?php echo $form->error($model,'tipoimputacion'); ?>
	
</div>

<div id="Chanchito" >


</div>








	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>


<div class="row">
		<?php echo $form->labelEx($model,'codentro'); ?>
		<?php echo $form->textField($model,'codentro',array('size'=>4,'maxlength'=>4, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'codentro'); ?>
	</div>


<div class="row">
		<?php echo $form->labelEx($model,'codigoalma'); ?>
		<?php echo $form->textField($model,'codigoalma',array('size'=>3,'maxlength'=>3, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'codigoalma'); ?>
	</div>



	


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php $this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'codart',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>6,
												'controlador'=>'Docomprat',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'habilitado'=>true,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'miffuufu',
											'nombrecampoareemplazar'=>'descri',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));
				?>

		<?php echo $form->error($model,'codart'); ?>									
		<?php echo $form->error($model,'descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punit'); ?>
		<?php echo $form->textField($model,'punit'); ?>
		<?php echo $form->error($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disp'); ?>
		<?php echo $form->textField($model,'disp',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'disp'); ?>
	</div>



	





	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iddesolpe'); ?>
		<?php echo $form->textField($model,'iddesolpe'); ?>
		<?php echo $form->error($model,'iddesolpe'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		
		<?php

		 if ( !$model->isNewRecord) {

            echo $form->labelEx($model,'estadodetalle');

		  echo CHtml::textField('hola',
   			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>'022',':miestado'=>$model->estadodetalle))->estado,
  			  array('id'=>'pepin','disabled'=>'disabled','size'=>20));

					}

		 ?>
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
			$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
					echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--')  )  ;						     
 			?>
		<?php echo $form->error($model,'um'); ?>
	</div>


	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidguia',array('value'=>$idcabeza)):""; ?>
	
		
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
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