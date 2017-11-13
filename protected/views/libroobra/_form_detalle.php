<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */
/* @var $form CActiveForm */
?>
<div class="division"><div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'libroobra-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'tipo'); ?>
		  <?php $datos = CHtml::listData(Tipoeventos::model()->findAll(),'cod','descripcion');
			echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Seleccione Tipo --')  );
					//ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
		?>	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horarep'); ?>
		
		 <?php $this->widget('application.extensions.timepicker.timepicker', array(
                'model'=>$model, 'name'=>'horarep', 
                     'select'=> 'time',
            'options' => array(
            'showOn'=>'focus',
                'timeFormat'=>'hh:mm',
                'hourMin'=> 0,
                'hourMax'=> 24,
                 'language' => 'es',
                //'hourGrid'=>2,
                //'minuteGrid'=>10,
            ),
                
                    )); ?>    
                    
		<?php echo $form->error($model,'horarep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>10,'cols'=>10)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'dependencia'); ?>
		<?php echo $form->textField($model,'dependencia',array('size'=>25)); ?>
		<?php echo $form->error($model,'dependencia'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
            <?php
		$this->widget('ext.matchcode.MatchCode',array(
                'nombrecampo'=>'codpro',
                'ordencampo'=>1,
                'controlador'=>$this->id,
                'relaciones'=>$model->relations(),
                'tamano'=>1,
                'model'=>$model,
                'form'=>$form,
                'nombredialogo'=>'cru-dialog3',
                'nombreframe'=>'cru-frame3',
                'nombrearea'=>'c8ww9',
            )

        );
                ?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>
    
    
    

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div></div>

  



<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'cru-dialog3',
			'options'=>array(
				'title'=>'Explorador',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>800,
				'height'=>600,
			),
		));
		?>
		<iframe id="cru-frame3" width="100%" height="100%"></iframe>
		<?php
		$this->endWidget();?>




	