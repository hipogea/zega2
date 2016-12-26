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

   <div class="row">
		
		
		<?php 
                $opajax=array(
                    'type'=>'POST',
                    'data'=>array('idpadre'=>$model->docingresados->id),
                    'dataType'=>"json",
                    'success'=>"function(data) {"  
                        ."$('#Procesosdocu_codocuref').val(data.codigo).change(); "              
                    . "$('#Procesosdocu_numdocref').attr('value',data.numero); "
                    . "   }",
                );
                
                echo CHtml::ajaxButton('heredar',yii::app()->createUrl($this->id."/ajaxhereda",array()),$opajax); ?>
	</div>
    
		 <div class="row">
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php  
                //$criterio=
                $datosp = CHtml::listData(Documentos::model()->
                        findAll("controlfisico='1'"),
                        'coddocu','desdocu');
		echo $form->DropDownList($model,'codocuref',$datosp, array('empty'=>'--Llene el doc referencia--',
                  ));
					?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>
    
    
     <div class="row">
		<?php echo $form->labelEx($model,'numdocref'); ?>
		<?php 
		echo $form->textField($model,'numdocref',array('size'=>40));                
		?>
		<?php echo $form->error($model,'numdocref'); ?>
	</div>
    

<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>