<?php
/* @var $this OpcionescamposdocuController */
/* @var $model Opcionescamposdocu */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opcionescamposdocu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		echo $form->DropDownList($model,'codocu',$datos,array('empty'=>'--Seleccione un documento--','disabled'=>($model->isNewRecord)?'':'disabled') ) ;
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombredelmodelo'); ?>
		<?php //echo $form->textField($model,'modelo',array('size'=>60,'maxlength'=>100)); ?>
		<?php
		$datos = $model->enumModels();
		$valores=array();
		foreach ($datos  as $clave => $valor) {
			$valores[$valor]=$valor;
		}
		echo $form->DropDownList
		(	$model,'nombredelmodelo',$valores,
			array(

				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl($this->id.'/cargacampos'), //  la acción que va a cargar el segundo div
					'update' => '#Opcionescamposdocu_campo' // el div que se va a actualizar
				),
				'empty'=>'--Escoja el modelo--',
			'disabled'=>($model->isNewRecord)?'':'disabled'
				//'disabled'=>($model->isNewRecord)?'':'disabled',

			)
		);

		?>
		<?php echo $form->error($model,'nombredelmodelo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'campo'); ?>
		<?php
		if (!$model->isNewRecord) {

			/*$criterial = new CDbCriteria;
			$criterial->condition='codocu=:docu';
			$criterial->params=array(':docu'=>$model->codocu);
			$datos = CHtml::listData(Estado::model()->findAll( $criterial),'codestado','estado');*/
			//var_dump($nombredelmodelo);yii::app()->end();
			$listacampos=array();
			$modeloatrati=new $model->nombredelmodelo;
			foreach($modeloatrati->getAttributes() as $clave=>$valor){
				$listacampos[$clave]=$clave;
			}

		}
		echo $form->dropDownList($model,'campo', ($model->isNewRecord)?array():$listacampos, array(
				'prompt' => 'Seleccione un campo' // Valor por defecto
			,'disabled'=>($model->isNewRecord)?'':'disabled'
			)
		);
		?>
		<?php echo $form->error($model,'campo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrecampo'); ?>
		<?php echo $form->textField($model,'nombrecampo',array('size'=>40,'maxlength'=>40,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'nombrecampo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tipodato'); ?>
		<?php echo $form->textField($model,'tipodato',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipodato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitud'); ?>
		<?php echo $form->textField($model,'longitud'); ?>
		<?php echo $form->error($model,'longitud'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'seleccionable'); ?>
		<?php echo $form->textArea($model,'seleccionable',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seleccionable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>