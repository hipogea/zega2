<br>
<?php $this->widget(
                    'booster.widgets.TbLabel',
                        array(
                        'context' => 'info',
                            // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                            'label' => 'Date : '.$model->dailydet->dailywork->fecha.'         Shift  :  '.$model->dailydet->dailywork->regimen->desregimen, 
                            )
                         );

?>
<?php $this->widget(
                    'booster.widgets.TbLabel',
                        array(
                        'context' => 'warning',
                            // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                            'label' => '                             Machine :  '.$model->dailydet->inventario->codigoaf.'     ',
                            )
                         );

?>
<div class="form">
<div class="division">
    <div class="wide form">
       
<?php 
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
       // 'htmlOptions' => array('class' => 'well'), // for inset effect
    )
);
?>

    
<?php echo $form->errorSummary($model); ?>

  
    <?php      
                            echo $form->hiddenField($model,'hidet');    
                            ?>
        
        
<div class="panelizquierdo">

    
    <div class="row"> 
		<?php echo $form->labelEx($model,'tipmanoobra'); ?>
		<?php  $datos1 = array('P'=>'Daily Precheck','I'=>'Internal Work','E'=>'External service');
		  echo $form->DropDownList($model,'tipmanoobra',$datos1, array('empty'=>'--Seleccione Calificación--')  )  ;
                        ?>
                    <?php echo $form->error($model,'tipmanoobra'); ?>
                 </div>
    
     <div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
            
                       <?php      
                            echo $form->textField($model,'descripcion',array('size'=>30,'disabled'=>''));    
                            ?>
		
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'hinicio');
                 
                    $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                                'model'=>$model,
                         'attribute'=>'hinicio',
     // additional javascript options for the date picker plugin
                                'options'=>array(
                        'showPeriod'=>false,
                            ),
                    'htmlOptions'=>array('size'=>5,'maxlength'=>5 ),
                                ));
                        ?>
                <?php 
                $this->widget(
                    'booster.widgets.TbLabel',
                        array(
                        'context' => 'danger',
                            // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                            'label' => 'Hour entry: '.$model->dailydet->dailywork->regimen->hinicio,
                            )
                         );
            ?>
		<?php //echo $form->textField($model,'horacierre',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'hinicio'); ?>
	</div>

                




<div class="row">
		<?php echo $form->labelEx($model,'hfinal');
                 
 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
    'model'=>$model,
     'attribute'=>'hfinal',
     // additional javascript options for the date picker plugin
     'options'=>array(
         'showPeriod'=>false,
         ),
     'htmlOptions'=>array('size'=>5,'maxlength'=>5 ),
 ));
?>
         <?php 
                $this->widget(
                    'booster.widgets.TbLabel',
                        array(
                        'context' => 'danger',
                            // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                            'label' => 'End Hour: '.$model->dailydet->dailywork->regimen->getLimiteSuperior($model->cambiaformatofecha($model->dailydet->dailywork->fecha,false)),
                            )
                         );
            ?>        
                
            
		<?php //echo $form->textField($model,'horacierre',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'hfinal'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'codresponsable',
				'ordencampo'=>1,
				'controlador'=>$this->id,
				'relaciones'=>$model->relations(),
				'tamano'=>6,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'fehgffdfj',
			)

		);
		?>
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>

    </div>
    <div class="panelderecho">
   
	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		 <?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'detalle',
                                )
                            );?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>
    </div>
	<?php
   
    $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'Create Event',
        'context' => 'success',
        'context' => 'success',
        'htmlOptions'=>array('type'=>'input')
    )
); echo ' ';


    ?>
    </div>
</div>
    
</div>

		
					
	<?php $this->endWidget(); ?>
<?php unset($form); ?>

<?php $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'eventos-grid',
      'dataProvider'=>$model->search_por_detalle($model->hidet),
     // 'mergeColumns' => array('codtipo'),
    'extraRowColumns' => array('hidet'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_tiempopasado'])) $totals['sum_tiempopasado'] = 0;
		 $totals['sum_tiempopasado']+=$data['tiempopasado'];

	 },
                  'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Shift Hours Break : ".MiFactoria::decimal($totals["sum_tiempopasado"],2)." </span>"',
	 'extraRowPos'=>'below',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'dataProvider'=> Dailydet::model()->search_por_parte($model->id),	
	//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	'columns'=>array(
            //'id',
	  //  array('name'=>'hidinventario','visible'=>true),
            array('name'=>'id','type'=>'raw','header'=>'F','value'=>'CHtml::ajaxLink(CHtml::openTag("span",array("class"=>"fa fa-mx fa-color-purple fa-minus"),true),Yii::app()->createurl(\'/mantto/dailywork/ajaxDeleteEvent\', array(\'id\'=> $data->id ) ),array("type"=>"GET","success"=>"js:function(data) { $.fn.yiiGridView.update(\'eventos-grid\');window.parent.$.fn.yiiGridView.update(\'ot-grid\');}")   ) '),
           
	   //  array('header'=>'Ev','type'=>'html','value'=>'($data->neventos>0)?CHtml::openTag("span",array("class"=>"badge badge-error")).$data->neventos.CHtml::closeTag("tag"):""' ),
	   
            //array('name'=>'id','type'=>'html','header'=>'','value'=>'CHtml::openTag("span",array("class"=>"icon icon-folder-plus icon-green icon-fuentesize18"),true)'),
              // CHtml::openTag("span",array("class"=>"icon icon-envelop icon-blue icon-fuentesize16"),true)
             
            array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'descripcion','type'=>'html',
               // 'header'=>'$data->getAttributeLabel("hp")',
                //'editable'=>array('mode'=>'inline'),
                // 'value' => '$data->hp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                    'placement' => 'right',
                   'inputclass' => 'input-medium',
                    //'mode'=>'inline' 
                )
            ),
             array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'hinicio','type'=>'html', 
               // 'header'=>'$data->getAttributeLabel("hpp")',
                //  'value' => '$data->hpp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                   'type'=>'time',
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                    'placement' => 'right',
                   'inputclass' => 'input-medium',
                   // 'mode'=>'inline'
                )
            ),
            array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'hfinal','type'=>'html', 
               // 'header'=>'$data->getAttributeLabel("hpp")',
                //  'value' => '$data->hpp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                   'type'=>'time',
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                    'placement' => 'right',
                   'inputclass' => 'input-medium',
                   // 'mode'=>'inline'
                )
            ),
             array(
               // 'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'hp','type'=>'html',
               // 'header'=>'$data->getAttributeLabel("hp")',
                //'editable'=>array('mode'=>'inline'),
                 'value' => '$data->tiempopasado',
                //'sortable' => false,
                /*'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                    'url' => $this->createUrl('dailywork/updatedailydet'),
                    'placement' => 'right',
                    'inputclass' => 'input-medium',
                    ///'mode'=>'inline' 
                )*/
            ),
           array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'tipmanoobra','type'=>'html', 
               // 'header'=>'$data->getAttributeLabel("hpp")',
                //  'value' => '$data->hpp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                     'type'=>'select',
                    'source'=>array('P'=>'Daily Precheck','I'=>'Internal Service','E'=>'External Service'),
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                    'placement' => 'right',
                   'inputclass' => 'input-medium',
                   // 'mode'=>'inline'
                )
            ),
       
            array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'codresponsable','type'=>'html', 
               // 'header'=>'$data->getAttributeLabel("hpp")',
                //  'value' => '$data->hpp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                     'type'=>'select',
                    'source'=>CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'nombrecompleto')),'codigotra','nombrecompleto'),
                    'placement' => 'left',
                    'inputclass' => 'input-medium',
                   // 'mode'=>'inline'
                )
            ),
            
            
           
		//array('name'=>'mobs','header'=>'Observacion                                                                        '),
		//array('name'=>'usuario','header'=>'Autor'),
		//array('name'=>'estado','header'=>'Estado'),		
		// array('name'=>'ni', 'type'=>'raw', 'value'=>(!(Yii::app()->user->isGuest))?'CHtml::Button("Cerrar",array("id"=>$data->id,"class"=>"bolsita")) ': 'CHtml::Button("Cerrar",array("id"=>$data->id,"class"=>"bolsita", "disabled"=>"disabled")) '),
		//array('name'=>'numerodocumento','header'=>'Comentario'),
		//CHtml::Button('Cancel',array('submit'=>'index.php?r=user/cancel'));
		
			
            /*array(
			'class'=>'CButtonColumn',
                    'template'=>'{update}{delete}',
			 'buttons'=>array(
                        'update'=>
                            array(
                                'url'=>'$this->grid->controller->createUrl(
                                    "/inventario/editasignacionot",
					array("id"=>$data->id,																					      
                                                "asDialog"=>1,
                                                "gridId"=>$this->grid->id
                                                )
                                                                            )',
                                    'click'=>'function(){
                                        $("#cru-frame1").attr("src",$(this).attr("href")); 
					$("#cru-dialog1").dialog("open");  
					return false;
						 }',
				'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png', 
			'label'=>'Editar asignacion', 
                                ),
			'delete'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("inventario/ajaxdeleteasignacionot", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("ot-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,
	   'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."cerrar.png",
	   'label'=>'Liberar',
	   ),

                            ),
		),*/
            
            
		//array('name'=>'nada','type'=>'raw','header'=>'Notificar','value'=>'CHtml::link("Responder","#",array("onclick"=>$(#cru-frame1).attr("src",""); $(#cru-dialog1).dialog("open");))' ),
		
	),
)); 

?>




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