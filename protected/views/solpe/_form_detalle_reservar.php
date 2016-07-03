
<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>
<div class="division">

<div class="wide form">
 <?php  
 //$habil=$this->eseditablecab($idcabeza);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
    

  ?>

		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
    
	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidsolpe',array('value'=>$idcabeza)):''; ?>
		
	</div>
	
  <div class="row">
		<?php echo $form->labelEx($model,'tipsolpe'); ?>
		<?php echo $form->textField($model,'tipsolpe',array('size'=>1,'maxlength'=>1, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'tipsolpe'); ?>
	</div><div class="row">
		<?php echo $form->labelEx($model,'tipimputacion'); ?>
		<?php echo $form->textField($model,'tipimputacion',array('size'=>1,'maxlength'=>1, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'tipimputacion'); ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::label('Material','45565tr'); ?>
		<?php  ?>
		<?php
			echo $form->textField($model,'codart',array('disabled'=>'disabled','size'=>10)) ;
            echo CHtml::textField('caneesst',$model->desolpe_um->desum,array('size'=>3,'maxlength'=>3, 'disabled'=>$habilitado));
			echo $form->textField($model,'txtmaterial',array('disabled'=>'disabled','size'=>40)) ;
			echo $form->hiddenField($model,'est') ;
		?>



	</div>
	<div >
	   <div class="panelizquierdo">
	       <div class="row">
				<?php echo $form->labelEx($model,'cant'); ?>
				<?php echo CHtml::textField('fdfdfd4544',$model->cant." ( ".$model->desolpe_um->desum." )",array('size'=>16,'maxlength'=>16, 'disabled'=>$habilitado)); ?>
		    </div>
		  <div class="row">
				<?php echo CHtml::label('Stock libre','45'); ?>
                <?php  ?>
				<?php echo CHtml::textField('cansst',$model->desolpe_alinventario->cantlibre/Alconversiones::model()->convierte($model->codart,$model->um)." ( ".$model->desolpe_um->desum." )",array('size'=>16,'maxlength'=>16, 'disabled'=>$habilitado)); ?>
			</div>
	    </div>
	     <div class="panelderecho">

		  <div class="row">
				<?php echo CHtml::label('Comprar','4dgdg5'); ?>
				<?php //echo $form->textField($model,'cantidad_compras',array('value'=>$model->cant-min($model->cant,$model->desolpe_alinventario->cantlibre),'size'=>8,'maxlength'=>8)); ?>
				<?php echo $form->textField($model,'cantidad_compras',array('size'=>8,'maxlength'=>8)); ?>
				
				<?php echo $form->hiddenField($model,'est'); ?>
			
			</div>

			 <div class="row">
				 <?php echo CHtml::label('Reservar ','4r5'); ?>
				 <?php //echo $form->textField($model,'cantidad_reservada',array('value'=>min($model->cant,$model->desolpe_alinventario->cantlibre),'size'=>8,'maxlength'=>8)); ?>
				 <?php echo $form->textField($model,'cantidad_reservada',array('size'=>8,'maxlength'=>8)); ?>

			 </div>
		</div>	
	</div>


	

	




<div class="row">
		<?php echo $form->labelEx($model,'fechaent'); ?>
		<?php 
						echo $form->textField($model,'fechaent',array('disabled'=>'disabled','size'=>10)) ;
				
																	
															
		?>		
		
	</div>
	


	

	<div class="row">
		<?php //echo $form->labelEx($model,'c_descri'); ?>
		<?php //echo $form->textField($model,'c_descri',array('size'=>40,'maxlength'=>40)); ?>
		<?php //echo $form->error($model,'c_descri'); ?>
	</div>

	


	<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'centro',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>$habilitado,
													    ) ) ;
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>
	


	    <div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
		
								echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>10)) ;
						//echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>30)) ;
				
								
			   ?>
	</div>

	

	
	<div class="row">
		<?php echo $form->labelEx($model,'textodetalle'); ?>
		<?php echo $form->textArea($model,'textodetalle',array( 'disabled'=>$habilitado,'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textodetalle'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Reservar');?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



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
        'height'=>420,
        'border'=>0,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%" BORDER="0"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

</div>