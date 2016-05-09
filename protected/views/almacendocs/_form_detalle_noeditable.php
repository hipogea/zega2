<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">
 <?php  
 $habil=$this->eseditablecab($idcabeza);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
     //if (isset($_GET['ed'])) {   //si alguien coloco la URL EDITAR
     		//if ($_GET['ed']=='si') //si se presiono la opcion editar
     			if ($habil==='si') //si es editable la guia (VERIFICADO EN BASE DE DATOS)
     			   $habilitado='';
  ?>
		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidvale',array('value'=>$idcabeza)):''; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php

		///$datos1 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		//echo $form->DropDownList($model,'codocuref',$datos1, array('empty'=>'--Seleccione un documento--', 'disabled'=>'disabled'   ) ) ;
		echo CHtml::textField('dfdrtrt34',$model->documentoref->desdocu,array('size'=>14,'maxlength'=>14, 'disabled'=>'disabled'));


		?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'numdocref'); ?>
		<?php echo $form->textField($model,'numdocref',array('size'=>14,'maxlength'=>14, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'numdocref'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart');?>
		<?php	echo CHtml::textField('a',$model->maestro->descripcion,array('disabled'=>'disabled','size'=>40)) ;?>
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
	<?php  echo Chtml::ajaxLink(
		Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
		CController::createUrl('Ums/cargaum'), array(
			'type' => 'POST',
			'url' => CController::createUrl('Ums/cargaum'), //  la acci?n que va a cargar el segundo div
			'update' => '#Tempalkardex_um', // el div que se va a actualizar
			'data'=>array('codigomaterial'=>'js:Tempalkardex_codart.value'),
		)

	);?>

	<?php IF($model->isNewRecord ){ ?>
<?php
//$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
		$datos=array();
		echo $form->DropDownList($model,'um',$datos, array( 'disabled'=>$habilitado, 'maxlength'=>4)  )  ;
		?>
	<?php }  else { ?>
		<?php echo $form->DropDownList($model,'um',Alconversiones::Listadoums($model->codart), array('empty'=>'--Um--', 'disabled'=>$habilitado, 'maxlength'=>4)  )  ; ?>


	<?php   } ?>

		<?php echo $form->error($model,'um'); ?>


</div>




	

	
	

	
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>


</div>

