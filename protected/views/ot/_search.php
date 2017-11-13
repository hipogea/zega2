<?php
/* @var $this OtController */
/* @var $model Ot */
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
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	

  

	  <div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codpro',
					//'ordencampo'=>1,
					'controlador'=>'VwOtsimple',
					'relaciones'=>$model->relations(),
					'tamano'=>12,
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
			<?php echo $form->labelEx($model,'codigoequipo'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codigoeqiupo',
					//'ordencampo'=>1,
					'controlador'=>'VwOtsimple',
					'relaciones'=>$model->relations(),
					'tamano'=>12,
					'model'=>$model,
					'nombremodelo'=>'Masterequipo',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);


			?>
		</div>

	<div class="row">
		<?php echo $form->label($model,'codresponsable'); ?>
		<?php echo $form->textField($model,'codresponsable',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'textocorto'); ?>
		<?php echo $form->textField($model,'textocorto',array('size'=>20,'maxlength'=>20)); ?>
	</div>

              <br><br><br>
	

	
</div>
    <div class="panelderecho">
          <div class="row">
						<?php echo $form->labelEx($model,'fechacre'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechacre',
								'value'=>$model->fechacre,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechacre,
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
		
					

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fechacre1',
									'value'=>$model->fechacre1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fechacre1,
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
						<?php echo $form->labelEx($model,'fechainicio'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechainicio',
								'value'=>$model->fechainicio,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechainicio,
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
		
					

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fechainicio1',
									'value'=>$model->fechainicio1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fechainicio1,
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
						<?php echo $form->labelEx($model,'fechainiprog'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechainiprog',
								'value'=>$model->fechainiprog,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechainiprog,
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
		
					

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fechainiprog1',
									'value'=>$model->fechainiprog1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fechainiprog1,
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
						<?php echo $form->labelEx($model,'fechafin'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechafin',
								'value'=>$model->fechafin,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechafin,
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
		
					

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fechafin1',
									'value'=>$model->fechafin1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fechafin1,
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
						<?php echo $form->labelEx($model,'fechafinprog'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechafinprog',
								'value'=>$model->fechafinprog,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechafinprog,
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
		
					

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fechafinprog1',
									'value'=>$model->fechafinprog1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fechafinprog1,
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
                                     <?php echo $form->labelEx($model,'codcen'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Seleccione un centro --')  );
					?>
	</div>

	
	
    </div>

	

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>



