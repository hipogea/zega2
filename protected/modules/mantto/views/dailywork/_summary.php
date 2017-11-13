<?php
/* @var $this OtController */
/* @var $model Ot */
/* @var $form CActiveForm */
?>
<br><br><br>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	//'action'=>Yii::app()->createUrl($this->route),
	//'method'=>'get',
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
                <?php echo $form->labelEx($model,'grupo'); ?>
                
		<?php  $datos = array_combine(array_keys($model->_campospivote), array_keys($model->_campospivote));
		echo $form->DropDownList($model,'grupo',$datos, array('empty'=>'--Seleccione un centro --')  );
		?>
		<?php echo $form->error($model,'grupo'); ?>		
		
                
            </div>
        <div class="row">
                <?php echo $form->labelEx($model,'periodo'); ?>
                
		<?php  $datos = array_combine(array_keys($model->_camposprofundidad), array_keys($model->_camposprofundidad));
		echo $form->DropDownList($model,'periodo',$datos, array('empty'=>'--Seleccione un centro --')  );
		?>
		<?php echo $form->error($model,'periodo'); ?>		
		
                
            </div>
              
      
	
<br>
	

	
</div>
    <div class="panelderecho">
          <div class="row">
						<?php echo $form->labelEx($model,'fecha'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fecha',
								'value'=>$model->fecha,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fecha,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'dd/mm/yy',
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
									'attribute'=>'fecha1',
									'value'=>$model->fecha1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fecha1,
										'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
										'showOn'=>'both', // 'focus', 'button', 'both'
										'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
										'buttonImageOnly'=>true,
										'dateFormat'=>'dd/mm/yy',
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
    
   
    </div>

	

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>

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

