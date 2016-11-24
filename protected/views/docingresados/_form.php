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
	'enableAjaxValidation'=>false,
	
)); ?>

				
		<?php  echo $form->errorSummary($model); ?>		
	<div class="row">
		<?php
				$botones=array(
					
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
                                            'visiblex'=>array('10'),
						),


                                    
                                    
					 'ok' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/creaproceso', array(
                                'id' => $model->id,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog31',
                            'frame' => 'cru-frame31',
                            'visiblex' => array(!$esfinal),

                        ),
                                    
                                    'camera' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/creaproceso', array(
                                'id' => $model->id,
                                //"id"=>$model->n_direc,
                                "codtenencia" => $model->codtenencia,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog31',
                            'frame' => 'cru-frame31',
                            'visiblex' => array(!$esfinal),

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

		<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Inicio'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_general', array('form'=>$form,'procesoactivo'=>$model->procesoactivo[0],'model'=>$model,'esfinal'=>$esfinal),TRUE)
					),
                                    'Adjuntos'=>array('id'=>'tab_g',
						'content'=>$this->renderPartial('tab_adjuntos', array('form'=>$form,'model'=>$model,'esfinal'=>$esfinal),TRUE)
					),

					'Auditoria'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model,'esfinal'=>$esfinal),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog31',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame31" width="100%" height="100%"></iframe>
<?php $this->endWidget(); ?>