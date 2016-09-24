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

		<div class="panelizquierdo">

		<div style="float: left; ">
			        <?php echo $form->labelEx($model,'cod_cen'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
					echo $form->DropDownList($model,'cod_cen',$datos, array('empty'=>'--Seleccione un centro --')  )
					?>
			</div>
	
	<div class="row">
		<?php echo $form->label($model,'c_descri'); ?>
		<?php echo $form->textField($model,'c_descri',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'c_serie'); ?>
		<?php //echo $form->textField($model,'c_serie',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_salida'); ?>
		
		
		<?php echo $form->checkBox($model,'c_salida', ARRAY('checked'=>'checked'));?>
		
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'c_numgui'); ?>
		<?php echo $form->textField($model,'c_numgui',array('size'=>12,'maxlength'=>12)); ?>
	</div>
	
	
	
	<div class="row">
		<?php echo $form->label($model,'despro'); ?>
		<?php echo $form->textField($model,'despro',array('size'=>25,'maxlength'=>14)); ?>
	</div>

			

			<div class="row">
				<?php echo $form->labelEx($model,'c_codgui'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'c_codgui',
						//'ordencampo'=>1,
						'controlador'=>'Ne',
						'relaciones'=>$model->relations(),
						'tamano'=>10,
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








		</div>
		<div class="panelderecho">

			<div class="row">
				<?php echo $form->labelEx($model,'c_coclig'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'c_coclig',
						//'ordencampo'=>1,
						'controlador'=>'Ne',
						'relaciones'=>$model->relations(),
						'tamano'=>8,
						'model'=>$model,
						'nombremodelo'=>'Clipro',
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						//'nombrearea'=>'fehdfj',
					)

				);


				?>
			</div>
	
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'d_fectra'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'d_fectra',
 'value'=>$model->d_fectra,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->d_fectra,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
	 'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
	 'buttonImageOnly'=>true,
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
		
		
		
		
		
		
		<?php /*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'d_fectra',
				'value'=>$model->d_fectra,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					'defaultDate'=>$model->d_fectra)));*/
		?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'d_fectra1'); ?>
		
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'d_fectra1',
 'value'=>$model->d_fectra1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->d_fectra1,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
	 'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
	 'buttonImageOnly'=>true,
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



		<?php /*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'d_fectra1',
				'value'=>$model->d_fectra1,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					'defaultDate'=>$model->d_fectra1)));*/
		?>
		
	</div>
			<div style="float: left; ">
			        <?php echo $form->labelEx($model,'c_codep'); ?>
					<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'c_codep',$datos, array('empty'=>'--Seleccione una Referencia --')  )
					?>
			</div>
	
	<div class="row">
			<?php //echo $form->label($model,'estado_estado'); ?>
			<?php //echo $form->textField($model,'estado_estado',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>
	<div class="row">
			<?php //echo //$form->label($model,'inventario_descripcion'); ?>
			<?php //echo //$form->textField($model,'inventario_descripcion',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>
	<div class="row">
			<?php //echo //$form->label($model,'inventario_codigoaf'); ?>
			<?php //echo //$form->textField($model,'inventario_codigoaf',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>

		</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
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

