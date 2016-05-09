

<?php //$this->widget('ext.groupgridview.GroupGridView', array(
$this->widget('ext.groupgridview.GroupGridView', array(
    'id'=>'solpe-gridex',
	'dataProvider'=>VwReservasPendientes::model()->search_reservado($idinventario),
   // 'mergeColumns' => array('numero','item','desum','codart','txtmaterial'),
    //'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',  // your version of css file
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
    'extraRowColumns' => array('hidinventario'),
    'extraRowTotals' => function($data, $row, &$totals) {
        if(!isset($totals['sum_cantidad_reservada'])) $totals['sum_cantidad_reservada'] = 0;
        $totals['sum_cantidad_reservada']+=$data['cantidad_reservada'];
        if(!isset($totals['sum_cantidad_atendida'])) $totals['sum_cantidad_atendida'] = 0;
        $totals['sum_cantidad_atendida']+=$data['cantidad_atendida'];

    },
    'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total reservado : ".MiFactoria::decimal($totals["sum_cantidad_reservada"]-$totals["sum_cantidad_atendida"],4)." </span>"',

    //'filter'=>$model,
		//'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'dataProvider'=>$gridDataProvider,
			//'template'=>"{items}",
	'columns'=>array(
        //array('name'=>'id','header'=>'Reserva','value'=>'$data->id'),
        array(
            'class'=>'CCheckBoxColumn',
            'selectableRows' => 20,
            'value'=>'$data->iddesolpe',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]'),
            // 'id'=>'cajita' // the columnID for getChecked
        ),
       // 'idreserva',
        array('name'=>'usuario_reserva', 'type'=>'html','value'=>'yii::app()->user->um->LoadUserById($data->idusersolpe)->username.CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business.png","",array())'),
        array('name'=>'numero','type'=>'raw','value'=>'CHtml::link($data->numero,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->idsolpe ) ) )'),
         'desdocu_reserva',
        //'estadoreserva',
        array('name'=>'fecha_reserva','value'=>'date("d.m.Y", strtotime($data->fecha_reserva))'),

		//'numsolpe',
		'item',
       // 'cantdesolpe',
	//	array('name'=>'cantidad_reservada',,
        array('name'=>'reservado','type'=>'raw','value'=>'$data->cantidad_reservada-$data->cantidad_atendida'),
		'desum',
		'codart',
        array('name'=>'txtmaterial','value'=>'$data->txtmaterial','htmlOptions'=>Array('width'=>200)),
		//'txtmaterial',
        'codal',
		//'fechacrea',
		//'fechaent',
		//array('name'=>'codal','type'=>'raw','value'=>'CHtml::link($data->codal,Yii::app()->createurl(\'/almacendocs/atiendesolpe\', array(\'id\'=> $data->hidsolpe ) ) )'),
		//array('name'=>'codal','type'=>'raw','value'=>'($data->est=="03")?CHtml::link($data->codal,"#" , array(\'onclick\'=>\'$("#cru-detalle").attr("src","\'.Yii::app()->createurl(\'/solpe/reservaitem\', array(\'id\'=> $data->id, \'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialogdetalle").dialog("open"); return false;\',)):$data->codal'),
		'centro',
        'cantidad_atendida',
        'cantidad_pendiente',
		//'usuario_reserva',


))); ?>

