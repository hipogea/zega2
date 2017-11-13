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
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'socio',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
		?>
                 </div>
                     <div class="row">
		<?php echo $form->labelEx($model,'glosa'); ?>
                         <?php echo $form->textField($model,'glosa',array('size'=>25,'maxlength'=>25)); ?>
			
		         </div>
                 <div class="row"> 
		<?php echo $form->labelEx($model,'hidperiodo'); ?>
		<?php  $datos1d =yii::app()->periodo->periodosActivos() ;
		  echo $form->DropDownList($model,'hidperiodo',$datos1d, array('empty'=>'--Seleccione un Periodo--')  )  ;
		?>    
                     
		  </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'numerocomprobante'); ?>
                     <?php $opajax=array(
                              'type'=>'POST',
                         'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/rellena"),
                           'data'=>array('numero'=>'js:Registrocompras_numerocomprobante.value'),
                         'success'=>'js:function(data){$("#Registrocompras_numerocomprobante").val(data);}',
                          //'update'=>'#Registrocompras_numerocomprobante',
                         ); ?>
                    
			<?php echo $form->textField($model,'numerocomprobante',array('ajax'=>$opajax,'class'=>'numerodocumento','size'=>10,'maxlength'=>10)); ?>
			 </div>
                <div class="row">
                        <?php  echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->DropDownList($model,'tipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			
                </div>
     
                
     <div class="row">
                        <?php echo $form->labelEx($model,'femision'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'femision',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						//'readonly'=>'readonly',
					),
				));    ?>
			   </div>

			<?php $this->endWidget(); ?>

</div>

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
<iframe id="cru-frame3" width="100%" height="100%" style="overflow-y:hidden;overflow-x:hidden;"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

