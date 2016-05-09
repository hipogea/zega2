<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

           <div class="row">

		<?php echo $form->labelEx($model,'codcentro'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
					echo $form->DropDownList($model,'codcentro',$datos, array('empty'=>'--Seleccione un centro --')  )
					?>
			</div>

			<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
	<?php  
			$documento='330';
		$criteria = new CDbCriteria;
		$criteria->condition='codocu=:docu';
		$criteria->params=array(':docu'=>$documento);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		 $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
		 				 echo $form->DropDownList($model,'codestado',$datos, array('empty'=>'--Indique el status--')  )  ;	?>
	
	</div>	


<div class="row">

<?php echo $form->labelEx($model,'fecha'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'fecha',
 'value'=>$model->fecha,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 //'defaultDate'=>$model->d_fectra,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
 //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 //'buttonImageOnly'=>true,
 //'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>
</div>



<div class="row">
<?php echo $form->labelEx($model,'fecha1'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'fecha1',
 'value'=>$model->fecha1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 //'defaultDate'=>$model->d_fectra,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
 //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 //'buttonImageOnly'=>true,
 //'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>

</div>

	
	<div class="row">
		<?php echo $form->label($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mobs'); ?>
		<?php echo $form->textArea($model,'mobs',array('rows'=>2, 'cols'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>40,'maxlength'=>40)); ?>
	</div>
	

	<div class="row">
			<?php echo $form->label($model,'descripcion'); ?>
			<?php echo $form->textField($model,'descripcion',array('size'=>25,'maxlength'=>40)); ?>

	</div>
	<div class="row">
			<?php echo $form->label($model,'codigoaf'); ?>
			<?php echo $form->textField($model,'codigoaf',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>