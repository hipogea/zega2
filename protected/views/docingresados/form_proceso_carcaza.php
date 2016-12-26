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
		
		</div>

   <?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">


   
		
		<?php echo $form->hiddenField($model,'hiddoci',array('value'=>$id)); ?>
		<?php ///el campo auxliar cdote para ver si este proceso cambia tenencia 
                echo $form->hiddenField($model,'codte',array('value'=>$codtenencia)); 
                ?>
		
    
     <div class="row">
		<?php echo $form->labelEx($model,'hidtra'); ?>
		<?php  
                //$criterio=
                $criteriox=New CDbCriteria;
                $criteriox->addCondition("codte=:vcodte");
                if(is_null($codtenencia)){
                    $criteriox->params=array(":vcodte"=>$model->docingresados->codtenencia);
                }else{
                   $criteriox->params=array(":vcodte"=>$codtenencia);
                   
                }
               // var_dump($codtenencia);var_dump($criteriox->condition);var_dump($criteriox->params);die();
               $datosfilas=Tenenciastraba::model()->
                        findAll($criteriox);
                $datos =CHtml::listData($datosfilas,
                        'id','trabajadores.ap'); 
                 $claveencontrada=  Tenenciastraba::getIdHidtraByTrabajador($model->docingresados->codtenencia);
                              //  var_dump($claveencontrada); var_dump($codtenencia); 
              $claveencontrada=  Tenenciastraba::getIdHidtraByTrabajador($codtenencia);
                             
              if(is_null($claveencontrada)) {
                   echo $form->DropDownList($model,'hidtra',$datos, array('empty'=>'--Llene el apoderado--'
                  ));
               }else{
                  echo $form->DropDownList($model,'hidtra',$datos, array('empty'=>'--Llene el apoderado--','options'=>
                             array(
                               $claveencontrada=>array('selected'=>true)
                                 )
                  )); 
               }
					?>
		<?php echo $form->error($model,'hidtra'); ?>
	</div>
    
    
     <div class="row">
		<?php echo $form->labelEx($model,'hidproc'); ?>
		<?php  
                $criterio=New CDbCriteria;
                $criterio->addCondition("codte=:vcodte and codocu=:vcodocu");
                if(is_null($codtenencia)){
                    $criterio->params=array(":vcodocu"=>$modelopadre->tipodoc,":vcodte"=>$model->docingresados->codtenencia);
                }else{
                   $criterio->params=array(":vcodocu"=>$modelopadre->tipodoc,":vcodte"=>$codtenencia);
                   
                }
              /*  echo $criterio->condition;
                print_r($criterio->params);*/
                $datos = CHtml::listData(Tenenciasproc::model()->
                        findAll($criterio),
                        'id','eventos.descripcion');
		echo $form->DropDownList($model,'hidproc',$datos, array('empty'=>'--Llene el procedimiento--',
                  ));
					?>
		<?php echo $form->error($model,'hidproc'); ?>
	</div>
    
   <div class="row">
        <?php //var_dump(date($modelopadre->fechain));
        echo $form->labelEx($model,'fechanominal'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
           'value'=>date($modelopadre->fechain),
            'attribute'=>'fechanominal', //attribute name
            'language'=>'es',
            'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array( 'dateFormat'=>'yy-mm-dd',
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui',' ... '),
                'changeMonth'=>true,
        'changeYear'=>true,  
                //'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
                //'buttonImageOnly'=>true, 
            ),
            'htmlOptions'=>array(
                'style'=>'width:150px;vertical-align:top',
                //'readonly'=>'readonly',
            ),				// jquery plugin options
        ));
        ?>
        <?php echo $form->error($model,'fechanominal'); ?>
    </div>
    
    <div class="row">
		
		
		<?php 
                $opajax=array(
                    'type'=>'POST',
                    'data'=>array('idpadre'=>$modelopadre->id),
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
                $dependenciadoc = new CDbCacheDependency('SELECT count(*) FROM {{documentos}}');
                            $docs = Documentos::model()->cache(1000, $dependenciadoc)->findAll(array("condition"=>"clase='D' ",'order'=>'coddocu'));
                        $datosp = CHtml::listData($docs,'coddocu','referencia');               
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
    
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Procesar' : 'Procesar'); ?>
	</div>

<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>