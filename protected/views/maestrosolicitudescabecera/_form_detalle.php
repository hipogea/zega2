


<?php
/* @var $this MaestrosolicitudesController */
/* @var $model Maestrosolicitudes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestrosolicitudes-form',
	'enableAjaxValidation'=>false,
)); ?>

	
 
  <fieldset>
      <legend> Verifique si existe </legend>
	  
	<div class="row" >
	<div style="float:left;" >
		<?php echo $form->labelEx($model,'descripcion'); ?>
		
		<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
						'model'=>$model,
							'attribute'=>'descripcion',
						//'id'=>'country-single',
						// 'name'=>'country_single',
						'source'=>$this->createUrl('Request/otroMaestrocompo'),
							//'source'=>array('ac1','ac2','ac3'),
						'options'=>array(
						'showAnim'=>'fold',
      
							),
    
					'htmlOptions'=>array(
											/*'ajax'=>array( 
																'type'=>'POST', 
																'url'=>Yii::app()->createUrl('/maestrosolicitudes/pinta'																							
																							),
					//
																'update'=>'#Inventario_documento_desdocu2',
															) ,*/
						'size'=>'40'
								), 
						));

				?>
		
		
		
		<?php echo $form->error($model,'descripcion'); ?>
		
		<div STYLE ="
    background-color:#EFFDFF;
    border:1px solid #79B4DC;
    padding: 10px;
    width: 400px; flota:left;"  >
		         Puedes verificar si este codigo ya existe, para esto escribe la descripcion (Puedes ayudarte con el comodin  <font style="color: #CA0EE3;	font-size:1.2em;" ><b>  % </b> </font>)
		</div>
		
		</div>
	</div>
	<div  id ="Inventario_documento_desdocu2"></div>
	</fieldset>
	
	
	<fieldset>
      <legend> Datos a llenar </legend>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcioncorta'); ?>
		<?php echo $form->textField($model,'descripcioncorta',array('size'=>20,
																 'ajax'=>array( 
																			'type'=>'POST', 
																		'url'=>Yii::app()->createUrl('/maestrosolicitudes/Revisa'),					//
																		'update'=>'#chanchito',
																				),
																	'maxlength'=>20)
		); ?>
	
		<?php echo $form->error($model,'descripcioncorta'); ?>
	</div>

	<div id="chanchito">
		
	</div>
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroparte'); ?>
		<?php echo $form->textField($model,'numeroparte',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'numeroparte'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codclase'); ?>
	       <?php  $datos1 = CHtml::listData(Clase::model()->findAll(array('order'=>'nomclase')),'codclasema','nomclase');
		  echo $form->DropDownList($model,'codclase',$datos1, array('empty'=>'--Seleccione una clase--')  )  ;
		?>
		<?php echo $form->error($model,'codclase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
	     <?php  $datos1 = CHtml::listData(Maestrogrup::model()->findAll(array('order'=>'descri2')),'codgrupo','descri2');
		  echo $form->DropDownList($model,'codgrupo',$datos1, array('empty'=>'--Seleccione un grupo--')  )  ;
		?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>

	</fieldset>
	 
	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Solicitar' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->