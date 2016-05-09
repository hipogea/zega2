<?php
    foreach($modelodetalle->desolpe_alreserva as $row) {
        if($row->codocu=='450')  //si e suna domcuento de reserva
            $idreserva=$row->id;
    }

    ?>
<?php $prove=VwAtencionessolpe::model()->search_por_solpe($modelodetalle->id);?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'reservas-grid',
'itemsCssClass'=>'table table-striped table-bordered table-hover',

    'dataProvider'=>$prove,
    //'filter'=>$model,
    'summaryText'=>'',
    'columns'=>array(

        array('name'=>'numvale','header'=>'Vale'),
        //'alinventario_ums.desum',
        //array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>60,"width"=>"60"))'),
        array(
            'name'=>'fecha',
            //array('name'=>'fechaent','header'=>'Para'),
            'header'=>'F mov',
            'value'=>'date("d/m/y", strtotime($data->fecha))',
            'htmlOptions'=>array('width'=>40),
        ),
        'movimiento',
        'desumsolpe',
        'desumkardex',
        'cant',
       // 'ceco',
        array('name'=>'ceco','value'=>'$data->ceco','footer'=>'Total'),
        array('name'=>'monto','value'=>'round($data->monto,2)','footer'=>round(VwAtencionessolpe::getTotal($prove),2)),
        array('name'=>'iduser','value'=>'yii::app()->user->um->loadUserById($data->iduser)->username')



    ),
)); ?>


<?php
$this->widget('ext.groupgridview.GroupGridView', array('id'=>'detalleresex-grid',
        'dataProvider'=>VwTrazabilidadReservas::model()->search_por_desolpe($modelodetalle->id),
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
            array('name'=>'cantidad_atendida','header'=>'Ate'),
            array('name'=>'fecha_atencion_vale','header'=>'F vale','value'=>'(is_null($data->fecha_atencion_vale))?"":date("d.m.y", strtotime($data->fecha_atencion_vale))'),
            'numero_vale_atencion',
            'umatem',
            array('name'=>'fecha_solicitud_compra','header'=>'F Oc','value'=>'(is_null($data->fecha_solicitud_compra))?"":date("d.m.y", strtotime($data->fecha_solicitud_compra))'),


            'solicitud_compra',
            'fecha_compra',
            array('name'=>'orden_compra','header'=>'Oc'),

            array('name'=>'numero_vale_atencion','type'=>'raw','header'=>'Vale','value'=>'CHtml::link($data->numero_vale_atencion, yii::app()->createUrl("almacendocs/update/",array("id"=>$data->idvale)),array("target"=>"_blank"))'),
            'fecha_atencion_vale',
            'montomovido',

        ),
    )
);
?>



