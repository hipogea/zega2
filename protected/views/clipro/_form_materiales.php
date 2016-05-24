<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactos-form',
	'enableClientValidation'=>true,
    
	'enableAjaxValidation'=>false,

)); ?>

	

	

	<div class="row">
	
		<?php 
		if($model->isNewRecord )
		    {
													
												echo $form->hiddenField($model,'codpro',array('size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
													//echo "el contacto es : ".$codpro;
												} else  {
													
												//echo $form->textField($model,'codpro',array('disabled'=>'disabled','size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
												}
			
			
			?>
		
		
	</div>

	 <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php 
			if ($model->isNewRecord) {
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codart',
												'ordencampo'=>6,
												'controlador'=>'Maestroclipro',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fh6rfj',
													));
													
		
				}else {
					echo CHtml::textField("xr",$model->codart,array('disabled'=>'disabled','size'=>8));
				
					echo CHtml::textField("x",$model->maestroclipro_maestrocompo->descripcion,array('size'=>40,'disabled'=>'disabled'));
				}

			   ?>
	
			
			<div style='float: left;'>
					<?php echo $form->error($model,'codart'); ?>
			</div>
      </div>

<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php  
			if ($model->isNewRecord) {
					$datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		 			 echo $form->DropDownList($model,'centro',$datos1, array('empty'=>'--Seleccione una referencia--')); 
			} else {
					echo CHtml::textField("xre",$model->centro,array('disabled'=>'disabled','size'=>4));
				
					echo CHtml::textField("xee",$model->maestroclipro_centros->nomcen,array('size'=>40,'disabled'=>'disabled'));
				

			}										   
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--', )  )  ;						     
 ?>
		<?php echo $form->error($model,'um'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php  $datos1 = CHtml::listData(Monedas::model()->findAll('habilitado="1"',array('order'=>'desmon')),'codmoneda','desmon');
		  echo $form->DropDownList($model,'codmon',$datos1, array('empty'=>'--Seleccione moneda--'))    ;
		?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	

	

	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
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
        'title'=>'Materiales',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>500,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>