<?php
$this->menu=array(
	array('label'=>'List Dailywork', 'url'=>array('admin')),
	array('label'=>'New Dailywork', 'url'=>array('create')),
);
?>

<br>
<?php  echo MiFactoria::titulo('Daily Worksheet  '.$fecha, 'texto');  ?>  
<div class="form">
    <div class="wide form">
        
    <div class="division">
<?php 
//var_dump($model);DIE();
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'dailywork-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
        <div class="row">
                <?php
                
                    $botones = array( 
                        'back' => array(
                            'type' => 'B',
                            'ruta' => array('/mantto/'.$this->id . '/update/', array('id' =>'' )),//aprobar
                            'visiblex' => array(true) ,
                           // 'visiblex' => array( true ),
                        ),
                        'mail' => array(
                            'type' => 'B',
                            'ruta' => array(),
                            'visiblex' => array('10'),
                        ),
                          
                        
                        'print' => array(
                            'type' => 'B',
                            'ruta' => array('coordocs/hacereporte', array('id' => $model['codigoaf'], 'idfiltrodocu' => $model['codigoaf'], 'file' => 0)),
                            'visiblex' => array('10'),
                        ),
                        'go' => array(
                            'type' => 'B',
                            'ruta' => array('/mantto/'.$this->id . '/update/', array('id' =>'' )),//aprobar
                            'visiblex' => array(true) ,
                           // 'visiblex' => array( true ),
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
                );
                ?>
            

            </div>
	
	 <div class="row">
                        <?php //echo $form->labelEx($model,'fecha'); ?>
                       <?php //ECHO $form->textField($model,'fecha',array('size'=>10)); ?>
			<?php //echo $form->error($model,'fecha'); ?>
                </div>

	


   
       
            	
	  
                   <div class="row">
                        <?php echo CHtml::label('Proyect',uniqid()); ?>
                       <?php echo CHtml::textField(uniqid(),$model['codproyecto'],array('disabled'=>'disabled')); ?>
                  
                       <?php echo CHtml::textField(uniqid(),$model['textocorto'],array('disabled'=>'disabled','size'=>40)); ?>
                          <?php echo CHtml::textField(uniqid(),$fecha,array('disabled'=>'disabled','class'=>'numerodocumento')); ?>
                  
                </div>
        <div class="row">
                        <?php echo CHtml::label('Shifts :',uniqid()); ?>
                       <?php 
                       
                       ?>
                   
                      
                </div>
                 <div class="row">
                  
                   
		</div>  
  <?php   ?>
	
       
<div class="panelizquierdo">
<?php
$this->widget(
    'application.components.booster.widgets.TbHighCharts',
    array(
     'options'=>array(
         'chart'=>array('type'=>'bar','backgroundColor'=>'#ffffcc'),
        'title' => array('text' => 'Chart Efficiencies'),
        'xAxis' => array(
                        'categories' => $categorias1,
                        ),
        
        'yAxis' => array(
                        'min'=>0,
                        'max'=>100,
                        'title' => array('text' => 'Percent :  (0 Min   -   100   Max)')
                        ),
        'series' => array(
                            array('name' => 'AVAILABILITY', 'data' => $series12,
                                  'color'=>'#99ccff'),
                            array('name' => 'UTILIZATION', 'data' => $series11,
                                        'color'=>'#ff3399'
                                    )
                            )
                    ) 
    ) //FIN DE HIGHCHARTS
);  //FIN DE WIDGET

?>

</div>
<div class="panelderecho">
  <?php
$this->widget(
    'application.components.booster.widgets.TbHighCharts',
    array(
     'options'=>array(
         'chart'=>array('type'=>'bar','backgroundColor'=>'#ffffcc'),
        'title' => array('text' => 'Chart Efficiencies'),
        'xAxis' => array(
                        'categories' => $categorias2,
                        ),
        
        'yAxis' => array(
                        'min'=>0,
                        'max'=>100,
                        'title' => array('text' => 'Percent :  (0 Min   -   100   Max)')
                        ),
        'series' => array(
                            array('name' => 'AVAILABILITY', 'data' => $series22,
                                  'color'=>'#99ccff'),
                            array('name' => 'UTILIZATION', 'data' => $series21,
                                        'color'=>'#ff3399'
                                    )
                            )
                    ) 
    ) //FIN DE HIGHCHARTS
);  //FIN DE WIDGET

?>
    
</div>


	

<?php $this->endWidget(); ?>
</div>
    </div>
</div><!-- form -->

<br>
<h1><?php echo 'Detail by Equipment '; ?></h1>
   
<?php 
//var_dump($proveedor);die(); 
$this->widget('ext.groupgridview.GroupGridView', array(
   // $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'ot-grid',
    'summaryText'=>'',
      'dataProvider'=>$proveedor,
      'mergeColumns' => array('codtipo','destipo','codtipo','textocorto','nombreobjeto','codcen'),
    
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
           // array('name'=>'id','type'=>'raw','header'=>'','value'=>'CHtml::link(CHtml::openTag("span",array("class"=>"icon icon-folder-plus icon-green icon-fuentesize18"),true),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/mantto/dailywork/creaevento\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )   '),
             //array('header'=>'Ev','type'=>'html','value'=>'CHtml::openTag("span",array("class"=>"badge badge-error")).$data->neventos.CHtml::closeTag("tag")' ),
	//'codtipo',
            'destipo',
        // 'nombreobjeto',
            'codcen',
            array('name'=>'codigoaf','header'=>'Machine','type'=>'raw','value'=>'$data["codigoaf"]'),
            array('name'=>'sum_np','header'=>'np'),
            array('name'=>'sum_ns','header'=>'ns'),
            array('name'=>'sum_hp','header'=>'hp'),
            array('name'=>'sum_hpp','header'=>'hpp'),
            array('name'=>'sum_hd','header'=>'hd'),
            //array('name'=>'min_hmi','header'=>'hmi'),
            //array('name'=>'max_hmf','header'=>'hmf'),
            //array('name'=>'avg_util','type'=>'raw', 'value'=>'$data["avg_util"]*100'),
		array('name'=>'avg_util','type'=>'html', 'value' => 'CHtml::openTag("span",array("class"=>"badge badge-success")).round($data["avg_util"]*100,2)."%".CHtml::closeTag("span")'),
                        array('name'=>'avg_dispo','type'=>'html', 'value' => 'CHtml::openTag("span",array("class"=>"badge badge-warning")).round($data["avg_dispo"]*100,2)."%".CHtml::closeTag("span")'),
            
	),
)); 

?>
<br><h1><?php echo 'Summary by Type '; ?></h1>

 
<?php 
//var_dump($proveedor);die(); 
$this->widget('ext.groupgridview.GroupGridView', array(
   // $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'ot2-grid',
     'summaryText'=>'',
      'dataProvider'=>$proveedor2,
      'mergeColumns' => array('codtipo','codtipo','textocorto','nombreobjeto','codcen'),
    
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
           // array('name'=>'id','type'=>'raw','header'=>'','value'=>'CHtml::link(CHtml::openTag("span",array("class"=>"icon icon-folder-plus icon-green icon-fuentesize18"),true),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/mantto/dailywork/creaevento\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )   '),
             //array('header'=>'Ev','type'=>'html','value'=>'CHtml::openTag("span",array("class"=>"badge badge-error")).$data->neventos.CHtml::closeTag("tag")' ),
	
            'destipo',
        // 'nombreobjeto',
            'codcen','sum_np','sum_ns',
            'sum_hp','sum_hpp','sum_hd',
            //'min_hmi','max_hmi',
            //array('name'=>'avg_util','type'=>'raw', 'value'=>'$data["avg_util"]*100'),
		array('name'=>'avg_util','type'=>'html', 'value' => 'CHtml::openTag("span",array("class"=>"badge badge-success")).round($data["avg_util"]*100,2)."%".CHtml::closeTag("span")'),
                        array('name'=>'avg_dispo','type'=>'html', 'value' => 'CHtml::openTag("span",array("class"=>"badge badge-warning")).round($data["avg_dispo"]*100,2)."%".CHtml::closeTag("span")'),
            
	),
)); 

?>

<br>
<br>
<br>
<br>
<?php

//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();

//--------------------- end new code --------------------------
?>

