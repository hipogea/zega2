<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horometro-grid',
	//'filter'=>$model,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=> $proveedorlecturas,	
	//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	'columns'=>array(
           array(
			'class'=>'CButtonColumn',
                    'template'=>'{update}{view}',
                    'htmlOptions'=>array('width'=>100),
			 'buttons'=>array(
                       'delete'=> array(
					 'visible'=>'($data->codestado=="20")?true:false',
					 'url'=>'$this->grid->controller->createUrl("/mantto/Maintenance/AjaxShowDocumentsPoints", array("id"=>$data->id))',
					 'options' => array(
						 'ajax' => array(
							 'type' => 'GET',
							 'success'=>"function(data) {
							 $('#lecturas').html(data);
                                                                       }",
							 'url'=>'js:$(this).attr("href")'


						 ),

					 ) ,
					 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'History.png',
					 'label'=>'See Values',
				 ),

			 'view'=>
                            array(
                                'url'=>'$this->grid->controller->createUrl(
                                    "/mantto/Maintenance/ReplacePoint",
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
				'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'mas.png', 
			'label'=>'Replace Measurement Point', 
                                ),

                            ),
		),
	 	array('name'=>'lectura','header'=>'Value','value'=>'$data->lectura'),
		array('name'=>'fecha','header'=>'Date','value'=>'$data->fecha'),
		
		//array('name'=>'nada','type'=>'raw','header'=>'Notificar','value'=>'CHtml::link("Responder","#",array("onclick"=>$(#cru-frame1).attr("src",""); $(#cru-dialog1).dialog("open");))' ),
		
	),
)
        ); 

?>