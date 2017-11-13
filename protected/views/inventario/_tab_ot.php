<?php 
var_dump(Machineswork::model()->search_por_activo(20)->getdata());
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ot-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=> Machineswork::model()->search_por_activo($idactivo),	
	'columns'=>array(
            'numero',
	 	//array('name'=>'finicio','header'=>'F Ini','value'=>'$data->finicio'),
		//array('name'=>'descri','header'=>'Proyecto','value'=>'$data->ot->textocorto'),
		//array('name'=>'comentario','type'=>'html','header'=>'Observaciones','value'=>'$data->comentario'),
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
		),
)); 

?>



<?php 
if(($model->nproyectos+0) <= 0 ){
 $createUrl = $this->createUrl('/inventario/asignarot',
		array(										       
			"id"=>$idactivo,
				"asDialog"=>1,
				"gridId"=>'ot-grid',												
											)
							);
	$mensaje="Para agregar una observacion debe de inicar sesion primero";
 echo CHtml::link('Asignar Proyecto','#',array('onclick'=>(!(Yii::app()->user->isGuest))?"$('#cru-frame').attr('src','$createUrl'); $('#cru-dialog').dialog('open');":"alert('$mensaje')"));
}
 ?>