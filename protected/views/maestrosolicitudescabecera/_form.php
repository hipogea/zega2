<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $model Maestrosolicitudescabecera */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestrosolicitudescabecera-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> are required.</p>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php 
		//$documento='032';
		$criterial = new CDbCriteria;
		$criterial->condition="c_planta=:docu";
		$criterial->params=array(':docu'=>'1');
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		 $datos = CHtml::listData(Centros::model()->findall($criterial),'codcen','nomcen');
		 				 echo $form->DropDownList($model,'codcentro',$datos, array('empty'=>'--Indique un centro--')  )  ;
		
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'correlativo'); ?>
		<?php //echo $form->textField($model,'correlativo',array('size'=>5,'maxlength'=>5)); ?>
		<?php //echo $form->error($model,'correlativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecha',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

								?>					
							
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'solicitante'); ?>
		<?php echo $form->textField($model,'solicitante',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'solicitante'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'solicitante'); ?>
		<?php //echo $form->textField($model,'solicitante',array('size'=>30,'maxlength'=>30)); 
		    if (!$model->isNewRecord) {	
			     $modi=new Maestrosolicitudes;
				 $proveedor=$modi->search_($model->id);				
				$this->renderPartial('vw_detalle',array('model'=>$model,'proveedor'=>$proveedor));
											}
		
		
		?>
		<?php //echo $form->error($model,'solicitante'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Editar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->