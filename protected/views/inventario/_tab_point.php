<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horometro-grid',
	//'filter'=>$model,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=> Manttohorometros::model()->search_por_activo($idactivo),	
	//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	'columns'=>array(
            'numero',
	 	array('name'=>'Codigo','header'=>'Code','value'=>'$data->codigo'),
		array('name'=>'ubicacion','header'=>'Location','value'=>'$data->ubicacion'),
            array('name'=>'fechainicio','header'=>'Begin Date','value'=>'$data->fechainicio'),
             array('name'=>'lecturaactual','header'=>'Current Value','value'=>'$data->lecturaactual'),
		array('name'=>'unidades','header'=>'Unit Measur','value'=>'$data->ums->desum'),
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{update}{view}',
			 'buttons'=>array(
                        'update'=>
                            array(
                                'url'=>'$this->grid->controller->createUrl(
                                    "/mantto/Maintenance/updateMeasurePoint",
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
			'label'=>'Edit Measurement Point', 
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
				'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'disconnect.png', 
			'label'=>'Replace Measurement Point', 
                                ),

                            ),
		),
		//array('name'=>'nada','type'=>'raw','header'=>'Notificar','value'=>'CHtml::link("Responder","#",array("onclick"=>$(#cru-frame1).attr("src",""); $(#cru-dialog1).dialog("open");))' ),
		
	),
)); 

?>



<?php

 $createUrl = $this->createUrl('/mantto/Maintenance/createMeasurePoint',
		array(										       
			"id"=>$idactivo,
				"asDialog"=>1,
				"gridId"=>'ot-grid',												
											)
							);
	//$mensaje="Para agregar una observacion debe de inicar sesion primero";
 echo CHtml::link('Add Measurement Point','#',array('onclick'=>(!(Yii::app()->user->isGuest))?"$('#cru-frame').attr('src','$createUrl'); $('#cru-dialog').dialog('open');":"alert('$mensaje')"));

 ?>