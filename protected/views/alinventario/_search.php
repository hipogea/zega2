<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */
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
		<?php echo $form->label($model,'codalm'); ?>
		<?php echo $form->textField($model,'codalm',array('size'=>3,'maxlength'=>3)); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'codcen',$datos1, array('empty'=>'--Seleccione una Centro--',
													    ) ) ;
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>
	
	
	
	 <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codart',												
												//'ordencampo'=>1,
												'controlador'=>'VwAlinventario',
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
		<?php echo $form->label($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lote'); ?>
		<?php echo $form->textField($model,'lote',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'haystock'); ?>
		<?php echo $form->checkBox($model,'haystock'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'hayreserva'); ?>
		<?php echo $form->checkBox($model,'hayreserva'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'haytransito'); ?>
		<?php echo $form->checkBox($model,'haytransito'); ?>
	</div>

<?php $this->endWidget(); ?>





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

</div><!-- search-form -->
</div><!-- search-form -->


	
