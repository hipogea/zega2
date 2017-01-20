<?php
/* @var $this CotiController */
/* @var $model Coti */
/* @var $form CActiveForm */
?>

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


	
				<div class="row">
			        <?php echo $form->labelEx($model,'codsunat'); ?>
					<?php  $datos = CHtml::listData(Tablassunat::model()->findAll(),'codigo','descrilarga');
					echo $form->DropDownList($model,'codsunat',$datos, array('empty'=>'--Seleccione una tabla --')  );
					?>
				</div>

	
				<div class="row">
					<?php echo $form->label($model,'descorta'); ?>
					<?php echo $form->textField($model,'descorta',array('size'=>40,'maxlength'=>40)); ?>
				</div>
		
			<?php $this->endWidget(); ?>

</div>



