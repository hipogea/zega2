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
		//echo $form->DropDownList($model,'hidvale',$datos1, array('empty'=>'--Seleccione un despacho--'))  ;
		echo $form->DropDownList($model,'hidvale',$datos1, array( 'ajax' => array('type' => 'POST',
			'url' => CController::createUrl('guia/cargadespacho'), //  la acción que va a cargar el segundo div
			'update' => '#zona' // el div que se va a actualizar
		),
			'empty'=>'--Seleccione un despacho--',) ) ;


		?>

	</div>
		<div class='botones'>
			<?php  echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/siga.png',array('onClick'=>'Loading.show();Loading.hide(); ','value'=>(!$model->isNewRecord) ?'Crear':'Grabar'));?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>


<div id="zona"></div>
