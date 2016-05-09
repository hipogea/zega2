<?php
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */
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




		<div style="float: left; ">
			<?php echo $form->labelEx($model,'codcentro'); ?>
			<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
			echo $form->DropDownList($model,'codcentro',$datos, array('empty'=>'--Seleccione un centro --')  );
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codal'); ?>
			<?php  $datos6 = CHtml::listData(Almacenes::model()->findAll(),'codalm','nomal');
			echo $form->DropDownList($model,'codal',$datos6, array('empty'=>'--Seleccione un almacen --')  );
			?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'codigo'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codigo',
					//'ordencampo'=>1,
					'controlador'=>'VwMaestrodetalle',
					'relaciones'=>$model->relations(),
					'tamano'=>8,
					'model'=>$model,
					'nombremodelo'=>'Maestrocompo',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);


			?>
		</div>


	<div class="row">
		<?php echo $form->labelEx($model,'catval'); ?>
		<?php
		$this->widget('ext.matchcode1.Seleccionavarios',array(
				'nombrecampo'=>'catval',
				//'ordencampo'=>1,
				'controlador'=>'VwMaestrodetalle',
				'relaciones'=>$model->relations(),
				'tamano'=>8,
				'model'=>$model,
				'nombremodelo'=>'Catvaloracion',
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				//'nombrearea'=>'fehdfj',
			)

		);


		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controlprecio'); ?>
		<?php  $array = array('V' => 'Promedio variable', 'F' => 'PEPS (FIFO)  ','L'=>'UEPS (LIFO)');?>

		<?php echo $form->dropDownList($model,'controlprecio',$array,array('empty'=>'--Seleccione Tipo Valoracion--','disabled'=>'')); ?>
		<?php echo $form->error($model,'controlprecio'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--','disabled'=>'') ) ;
		?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>60)); ?>
	</div>



	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>500,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
