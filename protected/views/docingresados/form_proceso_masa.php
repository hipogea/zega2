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
		<?php echo CHtml::label(uniqid(),'Centro'); ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
		  echo  CHtml::DropDownList(ucfirst(get_class($model)).'[codprov]','',$datos, array(  'ajax' => array('type' => 'POST', 
						'url' => CController::createUrl($this->id.'/cargatenencias'), //  la acción que va a cargar el segundo div 
						'update' => '#'.ucfirst(get_class($model)).'_codte' // el div que se va a actualizar
								  ),
						 'empty'=>'--Seleccione un centro--',) ) ;
		?>
		<?php //echo $form->error($model,'hiddoci'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'codte'); ?>
                
		<?php  //$datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
		  echo $form->DropDownList($model,'codte',array(), array(  'ajax' => array('type' => 'POST', 
						'url' => CController::createUrl($this->id.'/cargaprocesos'), //  la acción que va a cargar el segundo div 
						'update' => '#'.ucfirst(get_class($model)).'_hidproc' // el div que se va a actualizar
								  ),
						 'empty'=>'--Seleccione una tenencia--',) ) ;
		?>
		<?php echo $form->error($model,'codte'); ?>
	</div>
    
    
    <div class="row">
		<?php echo $form->labelEx($model,'hidproc'); ?>
                
		<?php  //$datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
		  echo $form->DropDownList($model,'hidproc',array(), array(  'ajax' => array('type' => 'POST', 
						'url' => CController::createUrl($this->id.'/cargatrabajadores'), //  la acción que va a cargar el segundo div 
						'update' => '#'.ucfirst(get_class($model)).'_hidtra' // el div que se va a actualizar
								  ),
						 'empty'=>'--Seleccione un proceso--',) ) ;
		?>
		<?php echo $form->error($model,'hidproc'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'hidtra'); ?>
                
		<?php  //$datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
		  echo $form->DropDownList($model,'hidtra',array(), array(
						 'empty'=>'--Seleccione un resposable--',) ) ;
		?>
		<?php echo $form->error($model,'hidtra'); ?>
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
    

		

<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

    
    
 <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maletin-grid',
	'dataProvider'=> VwDoci::model()->search_por_proceso(yii::app()->maletin->valoresid($codigodocu)),
	  'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'grid_pyy.css',  // your version of css file
//'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 10,
									'value'=>'$data->id',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	
		
		array('name'=>'correlativo','type'=>'raw','value'=>'CHTml::openTag("span",array("style"=>"border-radius:3px;padding:4px;background-color:$data->color"))."     ".CHTml::closeTag("span")." .".$data->correlativo'),
		'numero',
		'moneda',
		'monto',
            'codtenencia',
		//'codprov',
		'despro',			
		//'barcos.nomep',
		
		
		'fecha',
		'fechain',	
		'numdocref',		
		'ap',
            'descripcion',
		
            array(
			'class'=>'CButtonColumn',
                    
                      'template'=>'{delete}',
                    'buttons'=>array( 
                           'delete' => array(
                            
                    'label'=>' Eliminar',
                   // 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'22060.png',
                    'click'=>"function(){
                                    $.fn.yiiGridView.update('maletin-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.growlUI('Growl Notification', data); 
                                              $.fn.yiiGridView.update('maletin-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url'=>'$this->grid->controller->createUrl("/docingresados/borrafilamaletin",array("id"=>$data->id))',

                ),
                        		 
                  
                        
                    ),
		
		),
            
            
		
	),
)); ?>   
    
    
</div>  
      
</div>    