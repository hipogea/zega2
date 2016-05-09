<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'direcciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php  if(!isset($codpro)) $codpro="";
		if($model->isNewRecord )
		    {
													
												echo $form->hiddenField($model,'c_hcod',array('size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
													
												} else  {
													
												echo $form->textField($model,'c_hcod',array('disabled'=>'disabled','size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
												}
			
			
			?>
		
		<?php echo $form->error($model,'c_hcod'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'codplanta'); ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
										echo $form->DropDownList($model,'codplanta',$datos, array('empty'=>'--Seleccione un Centro--')  )  ;
										?>
		<?php echo $form->error($model,'codplanta'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'coddepa'); ?>
		<?php  $datos = CHtml::listData(Departamentos::model()->findAll(array('order'=>'departamento')),'coddepa','departamento');
		echo $form->DropDownList($model,'coddepa',$datos,
			array(  'ajax' => array(
				                  'type' => 'POST',
			                      'url' => CController::createUrl('Direcciones/cargaprovincias'), //  la acción que va a cargar el segundo div
								  'update' => '#Direcciones_codprov' // el div que se va a actualizar
			 						),
				       'empty'=>'--Seleccione un departamento--',
				 )
		) ;
		?>
		<?php echo $form->error($model,'coddepa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codprov'); ?>
		<?php
		if (!$model->isNewRecord) {
			$criterial = new CDbCriteria;
			$criterial->condition="coddepa='".$model->coddepa."'";
		//	$criterial->addcondition('coddist=:vcoddist');
			//$criterial->params=array(':vcoddepa'=>$model->coddepa,':vcoddist'=>$model->coddist);
			$datos = CHtml::listData(Provincias::model()->findAll( $criterial),'codprov','provincia');
		}
		echo $form->dropDownList($model,'codprov',($model->isNewRecord)?array():$datos,
		        array('ajax' => array(
									'type' => 'POST',
									'url' => CController::createUrl('Direcciones/cargadistritos'), //  la acción que va a cargar el segundo div
									'update' => '#Direcciones_coddist' // el div que se va a actualizar
										),
					'empty'=> 'Seleccione una provincia--',
				     )
		    );
		?>
		<?php echo $form->error($model,'codprov'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'coddist'); ?>
		<?php
		if (!$model->isNewRecord) {
			$criterial = new CDbCriteria;
			$criterial->condition='coddep=:vcoddepa';
			$criterial->addcondition('codprov=:vcodprov');
			$criterial->params=array(':vcoddepa'=>$model->coddepa,':vcodprov'=>$model->codprov);
			$datos = CHtml::listData(Ubigeos::model()->findAll( $criterial),'coddist','distrito');
		}
		echo $form->dropDownList($model,'coddist', ($model->isNewRecord)?array():$datos, array('prompt' => 'Seleccione un distrito' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'coddist'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpais'); ?>
		<?php echo $form->textField($model,'codpais',array('size'=>2,'maxlength'=>2,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codpais'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'c_direc'); ?>
		<?php echo $form->textField($model,'c_direc',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'c_direc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_vale'); ?>
		<?php echo $form->checkBox($model,'l_vale'); ?>
		<?php echo $form->error($model,'l_vale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esembarque'); ?>
		<?php echo $form->checkBox($model,'esembarque'); ?>
		<?php echo $form->error($model,'esembarque'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'tienereceptor'); ?>
		<?php echo $form->checkBox($model,'tienereceptor'); ?>
		<?php echo $form->error($model,'tienereceptor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_nomlug'); ?>
		<?php echo $form->textField($model,'c_nomlug',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'c_nomlug'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cospostal'); ?>
		<?php echo $form->textField($model,'cospostal',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'cospostal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->