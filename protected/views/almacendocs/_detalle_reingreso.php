<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

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
			'id'=>'detallereingreso-form',
			'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidvale',array('value'=>$idcabeza)):''; ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numdocref'); ?>
		<?php
			$opcionesajax=array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl('/Almacendocs/pintakardex'),
				'update'=>'#Tempalkardex_idref',
			) ;
		 ?>
		<?php echo $form->textField($model,'numdocref',array('size'=>14,
		'ajax'=>$opcionesajax,
		));
		?>
		<?php echo $form->error($model,'numdocref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idref'); ?>
		<?php

		echo $form->dropDownList($model,'idref', array(), array('prompt' => ' ')); // Valor por defecto
		/*echo $form->dropDownList($model,'idref', array(), array('ajax' => array(
				'type' => 'POST',
				'url' => CController::createUrl('Almacendocs/cargaums'), //  la acción que va a cargar el segundo div
				'update' => '#Alkardex_um' // el div que se va a actualizar
			),
				'prompt' => 'Seleccione un item' // Valor por defecto
			)
		);*/
		?>
		<?php echo $form->error($model,'idref'); ?>
	</div>


 
	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>


<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
        $datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
		//$datos=array();
			echo $form->DropDownList($model,'um',$datos, array('cols'=>4,'empty'=>'--Unidad de medida--')  )  ;
 ?>
		<?php echo $form->error($model,'um'); ?>
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
        'width'=>400,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>