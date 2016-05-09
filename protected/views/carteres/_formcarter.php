<?php
/* @var $this CarteresController */
/* @var $model Carteres */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carteres-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
	<?php echo $form->labelEx($model,'idequipo'); ?>
	<?php
	    if ($model->isNewRecord) {
		   }else{
		   //buscando el codigo de la embarcacion 
		   $modeloinv=Inventario::model()->findByAttributes(array('idinventario'=> $model->idequipo));
		   $codep=$modeloinv->codep;
		   };
		$criteria = new CDbCriteria;
		$criteria->addcondition("codep='".$codep."'");
		$criteria->addcondition("tienecarter='1'");
		$criteria->addcondition("codlugar='000015'");
		 $datos = CHtml::listData(Inventario::model()->findall($criteria),'idinventario','descripcion');
		 				 echo $form->DropDownList($model,'idequipo',$datos, array('empty'=>'--Seleccione el equipo--',)  )  ;
	 ?>		
		<?php echo $form->error($model,'idequipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacidad'); ?>
		<?php echo $form->textField($model,'capacidad'); ?>
		<?php echo $form->error($model,'capacidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horascambio'); ?>
		<?php echo $form->textField($model,'horascambio'); ?>
		<?php echo $form->error($model,'horascambio'); ?>
	</div>
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'tipoaceite'); ?>
		<?php $criteria = new CDbCriteria;
		//$criteria->addcondition("cod='".$codep."'");
		$criteria->addcondition("flag='1'");
		 $datos = CHtml::listData(Maestrocompo::model()->findall($criteria),'codigo','descripcion');
		 				 echo $form->DropDownList($model,'tipoaceite',$datos, array('empty'=>'--Seleccione lubricantes--',)  )  ;
	   ?>
		<?php echo $form->error($model,'tipoaceite'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->