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
    
    
    
    
    
		<?php echo $form->hiddenField($model,'hiddoci',array('value'=>$id)); ?>
		
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
                $criterio->addCondition("codte=:vcodte and codocu=:vcodocu and subproceso='1'");
                if(is_null($codtenencia)){
                    $criterio->params=array(":vcodocu"=>$modelopadre->tipodoc,":vcodte"=>$model->docingresados->codtenencia);
                }else{
                   $criterio->params=array(":vcodocu"=>$modelopadre->tipodoc,":vcodte"=>$codtenencia);
                   
                }
                //echo $criterio->condition;
              //  echo " este es el id   ".$id."<br>";
                //print_r($modelopadre->attributes);
              //  var_dump($modelopadre);
                //print_r($criterio->params);
                $datos = CHtml::listData(Tenenciasproc::model()->
                        findAll($criterio),
                        'id','eventos.descripcion');
		echo $form->DropDownList($model,'hidproc',$datos, array('empty'=>'--Llene el procedimiento--',
                  ));
					?>
		<?php echo $form->error($model,'hidproc'); ?>
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
    
    
    
      <div class="row">
		<?php echo $form->labelEx($model,'tipoactivo'); ?>
		<?php  
                //$criterio=
                $datosp = CHtml::listData(Tipoactivos::model()->
                        findAll("activo='1'"),
                        'codtipo','destipo');
		echo $form->DropDownList($model,'tipoactivo',$datosp, array('empty'=>'--Llene el tipo activo--',
                  ));
					?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>
    
    
<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php 
		echo $form->textArea($model,'comentario',array('columns'=>6));                
		?>
		
	</div>
    
    
    
    
    
    
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>