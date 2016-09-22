<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

<div class="wide form">
 <?php  
 //$habil=$this->eseditablecab($model->detgui->ne->n_guia);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
     //if (isset($_GET['ed'])) {   //si alguien coloco la URL EDITAR
     		//if ($_GET['ed']=='si') //si se presiono la opcion editar
     			if ($habil==='si') //si es editable la guia (VERIFICADO EN BASE DE DATOS)
     			   $habilitado='';
     
    // $habilitado='';

//echo "habil  ".($habil==='si');
          


  ?>

		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
   
	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>
    
    
    
    

	<div class="row">
		
		<?php $form->hiddenField($model,'hidne'); ?>
		
	</div>
	
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>4,'maxlength'=>4)); ?>
            <?php echo $form->error($model,'cant'); ?>

	</div>


    <div class="row">
		<?php echo $form->labelEx($model,'hidot'); ?>
		<?php

		
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'hidot',
					'ordencampo'=>3,
					'controlador'=>'Neot',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehe367uudrfddj',
				)

			);
		
			//echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

		
		?>

		
		<?php echo $form->error($model,'hidot'); ?>
	</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
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