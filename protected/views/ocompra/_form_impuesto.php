
	<div class="wide form">
	<div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	                                            'id'=>'Ocompra-form',
	                                            'enableClientValidation'=>true,
                                                'clientOptions' => array(
                                                'validateOnSubmit'=>TRUE,
                                                'validateOnChange'=>TRUE  ,
                                                                     ),
	                                            'enableAjaxValidation'=>false,
		                                                    )); ?>


	<div class="row">
		<?php echo $form->labelEx($modeloimpuesto,'codimpuesto'); ?>
		<?php 

		?>
		<?php
		$crite=New CDbcriteria();
		$crite->addCondition("codocu=:vcodocu" );
		$crite->params=array ( ":vcodocu" =>$codigodoc );
		$crite->addNotInCondition('codimpuesto',$impuestosyaregistrados);
		$datos1 = CHtml::listData(Impuestosdocu::model ()->findAll ($crite),'codimpuesto','impuestos.descripcion');
		  echo $form->DropDownList($modeloimpuesto,'codimpuesto',$datos1, array('empty'=>'--Seleccione Impuesto--' )) ;
		?>
	
		<?php echo $form->error($modeloimpuesto,'codimpuesto'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Agregar'); ?>
	</div>
	
	
	
<?php $this->endWidget(); ?>
	</div>	</div>
	