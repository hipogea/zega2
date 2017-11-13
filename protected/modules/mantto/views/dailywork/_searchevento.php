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
                                     <?php echo $form->labelEx($model,'codproyecto'); ?>
					
					<?php echo $form->textField($model,'codproyecto', array('size'=>8)  );
					?>
	</div>
              
<div class="row">
                                     <?php echo $form->labelEx($model,'descripcion'); ?>
					
					<?php echo $form->textField($model,'descripcion', array('size'=>28)  );
					?>
	</div>

	  <div class="row">
			<?php echo $form->labelEx($model,'codresponsable'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codresponsable',
					//'ordencampo'=>1,
					'controlador'=>'VwParteopdetalle',
					'relaciones'=>$model->relations(),
					'tamano'=>12,
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
<div class="row">
			<?php echo $form->labelEx($model,'codigoaf'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codigoaf',
					//'ordencampo'=>1,
					'controlador'=>'VwParteopdetalle',
					'relaciones'=>$model->relations(),
					'tamano'=>12,
					'model'=>$model,
					'nombremodelo'=>'Inventario',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);


			?>
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
<div class="row">
                                     <?php echo $form->labelEx($model,'hidturno'); ?>
					<?php  $datos = CHtml::listData(Regimen::model()->findAll(array('order'=>'desregimen')),'id','desregimen');
					echo $form->DropDownList($model,'hidturno',$datos, array('empty'=>'--Seleccione un Turno --')  );
					?>
	</div>
	
	<div class="row">
			<?php echo $form->labelEx($model,'codtipo'); ?>
			<?php
			$datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');
			echo $form->DropDownList($model,'codtipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
			<?php echo $form->error($model,'codtipo'); ?>
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

