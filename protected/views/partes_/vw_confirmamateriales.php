<?php
/* @var $this PartesController */
/* @var $model Partes */
/* @var $form CActiveForm */
?>

<div class="form">
<DIV>
 <?php  //ECHO " ".Yii::app()->getModule('user')->user()->profile->lastname."-".Yii::app()->getModule('user')->user()->profile->amaterno."-".Yii::app()->getModule('user')->user()->profile->firstname."-".Yii::app()->getModule('user')->user()->email; ?>
</DIV>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partes-form',
	'enableClientValidation'=>false,
    //'clientOptions' => array(
       //  'validateOnSubmit'=>true,
       //  'validateOnChange'=>true       
    // ),
	'enableAjaxValidation'=>true,
)); ?>
<DIV>
               <?php //echo $form->errorSummary($model);
					//Yii::app()->params['rutaimagenes'].'caja.jpeg';
					$imagen="caja.jpg"; 
				$ruta=Yii::app()->params['rutaimagenes'].$imagen;
			echo CHtml::image($ruta,"",array('border'=>0,'width'=>60,'height'=>60));
			   ?> 
         <DIV class="row">
			 <?php   echo "Cantidad : ---> ".$model->n_cangui."  ". $model->c_um."  ----> ".$model->c_descri	  ?>
	</DIV>
	   <DIV class="row">
	      <?php
				$accountStatus = array('SI'=>'SI', 'NO'=>'NO'); 
			  echo $form->radioButtonList($model,'acepta',$accountStatus,array('labelOptions'=>array('style'=>'display:inline'),'separator'=>' ')); 
					echo $form->error($model,'acepta'); 
				?>
	   </DIV>
</DIV>
  <?php echo $form->hiddenField($model,'n_detgui', array('value'=>$model->n_detgui)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Confirmar'); ?>
	</div>
  
<?php $this->endWidget(); ?>

</div><!-- form -->