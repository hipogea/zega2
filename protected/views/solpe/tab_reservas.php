<div style="  ">

 <?php
 //echo CHtml::image("/recurso/materiales/".$modelodetalle->codart.".JPG","",array("height"=>"80","width"=>"80")) ;
// Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$modelodetalle->codart.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",100,80);

// echo "      ".$modelodetalle->item." - ".$modelodetalle->codart." - ".$modelodetalle->txtmaterial;
 ?>

</div>



<?php
$this->widget('ext.groupgridview.GroupGridView', array('id'=>'detalleresex-grid',
        'dataProvider'=>VwTrazabilidadReservas::model()->search_por_desolpe($idcabeza),
        'summaryText'=>'',
        'mergeColumns' => array('fecha_reserva','estado_reserva','cantidad_reservada','desdocu_reserva'),
        'itemsCssClass'=>'table table-striped table-bordered table-hover',
        'columns'=>array(
            array('name'=>'desdocu_reserva','header'=>'Doc'),
            array('name'=>'fecha_reserva','header'=>'F doc','value'=>'(is_null($data->fecha_reserva))?"":date("d.m.y", strtotime($data->fecha_reserva))'),
            array('name'=>'usuario_reserva','header'=>'Usuario'),
            'id',
//'fecha_reserva',
        array('name'=>'estado_reserva','header'=>'est','type'=>'html','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.yii::app()->params["rutatemaimagenes"].$data->codocu.$data->estadoreserva.".png","",array("width"=>15,"height"=>15))'),
         //  'estadoreserva',
//'usuario_reserva',

array('name'=>'cantidad_reservada','header'=>'Res'),
            array('name'=>'xx','header'=>'Cant m'),
            array('name'=>'cantidad_atendida','header'=>'Ate'),
            array('name'=>'fecha_atencion_vale','header'=>'F vale','value'=>'(is_null($data->fecha_atencion_vale))?"":date("d.m.y", strtotime($data->fecha_atencion_vale))'),
'numero_vale_atencion',
            'umatem',
            array('name'=>'fecha_solicitud_compra','header'=>'F Oc','value'=>'(is_null($data->fecha_solicitud_compra))?"":date("d.m.y", strtotime($data->fecha_solicitud_compra))'),


'solicitud_compra',
'fecha_compra',
            array('name'=>'orden_compra','header'=>'Oc'),

            array('name'=>'vale_ingreso_compra_almacen','type'=>'raw','header'=>'Vale','value'=>'CHtml::link($data->vale_ingreso_compra_almacen, yii::app()->createUrl("almacendocs/update/",array("id"=>$data->idvale)),array("target"=>"_blank"))'),
'fecha_vale_ingreso_almacen',

),
    )
);
?>




<?php /*
$this->widget('zii.widgets.grid.CGridView', array('id'=>'detallerese-grid',
												'dataProvider'=>Alreserva::model()->search_idsolpe($idcabeza),
												'summaryText'=>'',
        'itemsCssClass'=>'table table-striped table-bordered table-hover',
												'columns'=>array(
																'alreserva_documentos.desdocu',
																'fechares',
																'cant',
                                                                'desolpe.desolpe_um.desum',
               													'usuario',
																array('name'=>'atendido','type'=>'raw','value'=>'($data->alreserva_cantidadatendida>0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."package.png"):""'),
                                                   // array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->est.".png")'),

                                                    'alreserva_estado.estado',
                                                    array(
                                                        'class'=>'CButtonColumn',
                                                        'buttons'=>array(
                                                            'update'=>
                                                                array(
                                                                    'visible'=>'false',
                                                                ),
                                                            'delete'=>
                                                                array(
                                                                    'visible'=>'($data->estadoreserva=="01")?true:false',
                                                                    'url'=>'$this->grid->controller->createUrl("/solpe/anulareserva",array("id"=>$data->id))',
                                                                    'options' => array( 'ajax' => array('type' => 'GET',  'succes' => '$.fn.yiiGridView.update("detallerese-grid")' ,'url'=>'js:$(this).attr("href")')) ,
                                                                    'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'02407.png',
                                                                    'label'=>'Anular',
                                                                ),
                                                            'view'=>
                                                                array(
                                                                    'visible'=>'false',
                                                                ),
                                                        ),
                                                    ),
               													),
													)
			);*/
?>
