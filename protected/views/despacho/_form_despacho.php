<div class="division">
	<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'guia-form',
			'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>false,

		)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidvale'); ?>
		<?php  $datos1 = CHtml::listData(VwDespachogeneral::model()->findAll(),'hidvale','numvale');
		echo $form->DropDownList($model,'c_motivo',$datos1, array('empty'=>'--Seleccione un despacho--'))  ;
		?>
	</div>

		<?php $this->endWidget(); ?>
	</div>
</div>



