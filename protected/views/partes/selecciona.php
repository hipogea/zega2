<?php
/* @var $this PartesController */
/* @var $model Partes */
/* @var $form CActiveForm */
?>

<div class="form">
<DIV>
 <?php  ECHO " ".Yii::app()->user->getField('nombres')."-".Yii::app()->user->getField('apaterno')."-".Yii::app()->user->getField('amaterno'); ?>
 </DIV>
<?php $form=$this->beginWidget('CActiveForm', array(
   'action'=>Yii::app()->createUrl('partes/index'),	
	'id'=>'selecciona-form',
	'enableClientValidation'=>true,
	'method'=>'post',
    //'clientOptions' => array(
       //  'validateOnSubmit'=>true,
       //  'validateOnChange'=>true       
    // ),
	'enableAjaxValidation'=>false,
))

; ?>
	
	
	
	
	
	<div class="row">
		
		<?php //echo $form->hiddenField($model,'numeroauxiliar',array('value'=>$model->numeroauxiliar,'border'=>0)); ?>
		
	</div>

    <div class="row">
	       <?php 
		   
		   // $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
		 				// echo $form->DropDownList($model,'codestado',$datos, array('empty'=>'--Indique el status--')  )  ;
						 
				 $datos = CHtml::listData(Embarcaciones::model()->findAll("activa='1'",array('order'=>'nomep')),'codep','nomep');
				 echo $form->dropDownList($modelazo,'codigodelbarco',$datos, array('empty'=>'--Seleccione una Embarcacion--','id'=>'selep')  )  ;	
                  //echo $form->error($model,'codep');	
		 ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Ingresar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->