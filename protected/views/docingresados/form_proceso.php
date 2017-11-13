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
                $trabajadorpordefecto=yii::app()->user->getField('codtra');
              $claveencontrada=null;
                foreach(  $datosfilas as $fila     ){
                   if($fila['codtra']==$trabajadorpordefecto){
                       $claveencontrada=$fila['id'];
                   }
               }
                unset($datosfilas);
                //$claveencontrada=12;
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
                $criterio->addCondition("codte=:vcodte");
                if(is_null($codtenencia)){
                    $criterio->params=array(":vcodte"=>$model->docingresados->codtenencia);
                }else{
                   $criterio->params=array(":vcodte"=>$codtenencia);
                   
                }
                $datos = CHtml::listData(Tenenciasproc::model()->
                        findAll($criterio),
                        'id','eventos.descripcion');
		echo $form->DropDownList($model,'hidproc',$datos, array('empty'=>'--Llene el procedimiento--',
                  ));
					?>
		<?php echo $form->error($model,'hidproc'); ?>
	</div>
    
   <div class="row">
        <?php echo $form->labelEx($model,'fechanominal'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
        $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'fechanominal', //attribute name
            'language'=>'es',
            'mode'=>'datetime', //use "time","date" or "datetime" (default)
            'options'=>array( 'dateFormat'=>'yy-mm-dd',
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui',' ... '),
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
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php  
                //$criterio=
                $datosp = CHtml::listData(Documentos::model()->
                        findAll(),
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
    
