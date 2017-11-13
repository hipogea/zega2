<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
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
        

	<div class="row">
				
			        <?php echo $form->labelEx($model,'codcen'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Seleccione un centro --')  );
					?>
	</div>

      <div class="row">
				
			        <?php echo $form->labelEx($model,'codarea'); ?>
					<?php  $datos = CHtml::listData(Areas::model()->findAll(array('order'=>'area')),'codarea','area');
					echo $form->DropDownList($model,'codarea',$datos, array('empty'=>'--Seleccione un area--')  );
					?>
	</div>


	

        <div class="row">
			<?php echo $form->labelEx($model,'hidperiodo'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'hidperiodo',
					//'ordencampo'=>1,
					'controlador'=>'Cajachica',
					'relaciones'=>$model->relations(),
					'tamano'=>2,
					'model'=>$model,
					'nombremodelo'=>'Periodos',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
                                        'id'=>'svarios_hidperiodo'
					//'nombrearea'=>'fehdfj',
				)

			);
			?>
	</div>
 <div class="row">
			<?php echo $form->labelEx($model,'codtra'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codtra',
					//'ordencampo'=>1,
					'controlador'=>'Cajachica',
					'relaciones'=>$model->relations(),
					'tamano'=>2,
					'model'=>$model,
					'nombremodelo'=>'Trabajadores',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);
			?>
	</div>



	

<?php $this->endWidget(); ?>

         </div>
</div>