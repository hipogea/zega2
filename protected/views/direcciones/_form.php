<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'direcciones-form',
		'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>true,
)); ?>

	


	<div class="row">
		<?php echo $form->labelEx($model,'c_hcod'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'c_hcod',
												//'urlinputbox'=>'/Direcciones/relaciona',
												//'urllink'=>'/Direcciones/recibevalor',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
				                                'nombrearea'=>'xfert46',
													)
													
								);
		?>
	</div>
			<div style='float: left; background-color :#CEF6F5; '>	
			<div id="<?php echo ucwords(strtolower(trim($this->id))).'_c_hcod_99'; ?>" >
					 <?php echo !$model->isNewRecord?$model->prove->despro:'';  ?>
			</div>
			</div>
	<div>
		<?php echo $form->error($model,'c_hcod'); ?>
	</div>
     <div class="row">
		<?php echo $form->labelEx($model,'codplanta'); 
		  
		      ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
										echo $form->DropDownList($model,'codplanta',$datos, array('empty'=>'--Seleccione una Planta--')  )  ;
										?>
		<?php echo $form->error($model,'codplanta'); ?>
	</div>
 
 
 
	<div class="row">
		<?php echo $form->labelEx($model,'c_direc'); ?>
		<?php echo $form->textField($model,'c_direc',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'c_direc'); ?>
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
			$criterial->condition='coddep=:vcoddepa';
			$criterial->addcondition('coddist=:vcoddist');
			$criterial->params=array(':vcoddepa'=>$model->coddepa,':vcoddist'=>$model->coddist);
			$datos = CHtml::listData(Ubigeos::model()->findAll( $criterial),'codprov','provincia');
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
		<?php echo $form->labelEx($model,'l_vale'); ?>
		<?php echo $form->checkBox($model,'l_vale'); ?>
		<?php echo $form->error($model,'l_vale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpais'); ?>
		<?php echo $form->textField($model,'codpais',array('size'=>2,'maxlength'=>2,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codpais'); ?>
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