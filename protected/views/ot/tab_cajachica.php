<?php
//var_dump($modelopadre->getids());

$this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'cajachica-grid',
      'dataProvider'=> VwCostos::model()->search_por_ot($modelopadre->getids()),
     'mergeColumns' => array('id'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  'extraRowColumns' => array('id'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_monto'])) $totals['sum_monto'] = 0;
		 $totals['sum_monto']+=$data['monto'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Asignaciones por actividad : ".MiFactoria::decimal($totals["sum_monto"],2)." </span>"',
	 'extraRowPos'=>'below',
                 
	
	//'filter'=>$model,
	'columns'=>array(
              //array('name'=>'glosa','header'=>'Glosa','value'=>'$data->dcajachica->glosa'),                
            array('name'=>'movimiento','header'=>'Oper.','value'=>'$data->movimiento'),
                array('name'=>'descripcion','header'=>'Descripcion','value'=>'$data->descripcion'),
               array('name'=>'fechacontable','header'=>'Fecha','value'=>'$data->fechacontable'),
             array('name'=>'ceco','header'=>'Colector','value'=>'$data->ceco'),
            array('name'=>'tipo','header'=>'Tip','value'=>'$data->tipo'),
            array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
            
            		
	),
)); ?>

    
    
    
    
    
    
    
    
    
    
    
   