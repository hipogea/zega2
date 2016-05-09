<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php
		$botones=array(
			'search'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
			'clear'=>array(
				'type'=>'E',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
		);
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		); ?>

	</div>



	<div class="panelizquierdo">
	<div class="row">
		<?php echo $form->label($model,'numvale'); ?>
		<?php echo $form->textField($model,'numvale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione una referencia--',
		) ) ;
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>





	<div class="row">
		<?php echo $form->labelEx($model,'fechavale'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechavale',
				'value'=>$model->fechavale,
				'language' => 'es',
				'htmlOptions' => array('readonly'=>"readonly"),
				'options'=>array(
					'autoSize'=>true,
					'defaultDate'=>$model->fechavale,
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'both', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
					'selectOtherMonths'=>true,
					'showAnim'=>'slide',
					'showButtonPanel'=>false,
					'showOtherMonths'=>true,
					'changeMonth' => 'true',
					'changeYear' => 'true',
				),
			)
		);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechavale1'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechavale1',
				'value'=>$model->fechavale1,
				'language' => 'es',
				'htmlOptions' => array('readonly'=>"readonly"),
				'options'=>array(
					'autoSize'=>true,
					'defaultDate'=>$model->fechavale1,
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'both', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
					'selectOtherMonths'=>true,
					'showAnim'=>'slide',
					'showButtonPanel'=>false,
					'showOtherMonths'=>true,
					'changeMonth' => 'true',
					'changeYear' => 'true',
				),
			)
		);?>
	</div>





	<div class="row">
		<?php echo $form->label($model,'codmovimiento'); ?>

		<?php  $datos1 = CHtml::listData(Almacenmovimientos::model()->findAll(array('order'=>'movimiento')),'codmov','movimiento');
		echo $form->DropDownList($model,'codmovimiento',$datos1, array('empty'=>'--Seleccione un movimiento--',))   ;
		?>

	</div>


	<div class="row">
		<?php echo $form->label($model,'codtrabajador'); ?>
		<?php echo $form->textField($model,'codtrabajador',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codalmacen'); ?>
		<?php echo $form->textField($model,'codalmacen',array('size'=>3,'maxlength'=>3)); ?>
	</div>

</div>
<div class="panelderecho">

	<div class="row">
		<?php echo $form->labelEx($model,'fechacont'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechacont',
				'value'=>$model->fechacont,
				'language' => 'es',
				'htmlOptions' => array('readonly'=>"readonly"),
				'options'=>array(
					'autoSize'=>true,
					'defaultDate'=>$model->fechacont,
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'both', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
					'selectOtherMonths'=>true,
					'showAnim'=>'slide',
					'showButtonPanel'=>false,
					'showOtherMonths'=>true,
					'changeMonth' => 'true',
					'changeYear' => 'true',
				),
			)
		);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacont1'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
				'model'=>$model,
				'attribute'=>'fechacont1',
				'value'=>$model->fechacont1,
				'language' => 'es',
				'htmlOptions' => array('readonly'=>"readonly"),
				'options'=>array(
					'autoSize'=>true,
					'defaultDate'=>$model->fechacont1,
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'both', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
					'selectOtherMonths'=>true,
					'showAnim'=>'slide',
					'showButtonPanel'=>false,
					'showOtherMonths'=>true,
					'changeMonth' => 'true',
					'changeYear' => 'true',
				),
			)
		);?>
	</div>





	<div class="row">
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php
		$datos = CHtml::listData(Documentos::model()->findAll(),'coddocu','desdocu');

		?>
		<?php echo $form->dropDownList($model,'codocuref', $datos, array('prompt' => 'Seleccione un documento' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'numdocref'); ?>
		<?php echo $form->textField($model,'numdocref',array('size'=>15,'maxlength'=>15)); ?>
	</div>

</div>

	<?php //echo CHtml::submitButton('docu'); ?>


<?php $this->endWidget(); ?>
</div>
</div><!-- search-form -->