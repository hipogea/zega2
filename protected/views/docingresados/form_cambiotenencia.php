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
		<?php echo CHtml::label('etiqueta','Tenencia'); ?>
		<?php  
                //$criterio=
                 $criteriox=New CDbCriteria;
                $criteriox->addCondition("codte<>:vcodte");   
                 //$criteriox->addCondition("1=1"); 
                   $criteriox->params=array(":vcodte"=>$codtenencia);
                    $datos = CHtml::listData(Tenencias::model()->
                            findAll($criteriox),
                            'codte','deste'
                            );
                    $opajax=array(
					'type' => 'GET',
					'url' => CController::createUrl($this->id.'/ajaxcargaformtenencia'), //  la acci?n que va a cargar el segundo div
					'update' => '#areaactualizable', // el div que se va a actualizar
					'data'=>array(
                                            'codtenencia'=>'js:selector.value',
                                            'id'=>$id
                                            ),
				);
                    //var_dump($datos);die();
                    
                   echo CHtml::DropDownList('selector',
                           '',
                           $datos, 
                           array('empty'=>'--Seleccione la tenencia--',
                               'ajax'=>$opajax
                            )
                           );
                ?>
         
         <div id="areaactualizable">
             
             
         </div>
         
         
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>