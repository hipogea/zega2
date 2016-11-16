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
<?php echo $form->errorSummary($model); ?>
	
    <div class="row">
		<?php
				$botones=array(
					
					'save'=>array(
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

   
		<?php
               echo $this->renderpartial('form_proceso',array(
                    'model'=>$model,
                    'codtenencia'=>$codtenencia,
                    'id'=>$id,
                   'form'=>$form
                    
                ),true);
                ?>

<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>