<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docingresados-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        // 'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>true,
	
)); ?>

				
		<?php  echo $form->errorSummary($model); ?>		
	<div class="row">
		<?php
				$botones=array(
					'go'=>array(
						'type'=>'A',
						'ruta'=>array(),
                                            'visiblex'=>array('10'),
						),
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
                                            'visiblex'=>array('10'),
						),


					'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>2)),//apreuba guia
						'visiblex'=>array('10'),
                                            ),
					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>35)),//anula guia
						'visiblex'=>array('10'),
					),
					'undo'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>64)),//reveiree liberacion
						'visiblex'=>array('10'),
					),
					'truck'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>36)), //confirma trasladoa
						'visiblex'=>array('10'),
					),

					'pack1'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>37)), //confirma entrega
						'visiblex'=>array('10'),
					),
					'pack'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->codte,'ev'=>69)), //revertir  entrega
						'visiblex'=>array('10'),
					),
					'print'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/imprimir/',array('id'=>$model->codte)),
						'visiblex'=>array('10'),
                                                        ),

					'edit'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/editadocumento',array('id'=>$model->codte)), //confirma trasladoa
						'visiblex'=>array('10'),
                                            ),


						'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->codte)),
						'visiblex'=>array('10'),
					),

				);





				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->codte,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>'10',

					)
				); ?>

			


		</div>

		<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Inicio'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('_form', array('form'=>$form,'model'=>$model),TRUE)
					),


					'Auditoria'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>

<?php $this->endWidget(); ?>

    
    <?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Eventos'=>array('id'=>'tab_x',
						'content'=>$this->renderPartial('eventos', array('model'=>$model),TRUE)
					),


					'Propietarios'=>array('id'=>'tab___._..__x',
						'content'=>$this->renderPartial('propietarios', array('model'=>$model),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabix',)
		);
		?>
    
    
    
    
    
</div><!-- form -->

</div>

