<?php
$this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'cajachica-grid',
      'dataProvider'=> Imputaciones::model()->search_por_ot($modelopadre->id),
     'mergeColumns' => array('idcolector'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  'extraRowColumns' => array('idcolector'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_monto'])) $totals['sum_monto'] = 0;
		 $totals['sum_monto']+=$data['monto'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Asignaciones por actividad : ".MiFactoria::decimal($totals["sum_monto"],2)." </span>"',
	 'extraRowPos'=>'below',
                 
	
	//'filter'=>$model,
	'columns'=>array(
              //array('name'=>'glosa','header'=>'Glosa','value'=>'$data->dcajachica->glosa'),                
            array('name'=>'glosa','header'=>'Glosa','value'=>'$data->dcajachica->glosa'),
                array('name'=>'desdocu','header'=>'Tip Doc','value'=>'$data->dcajachica->documentos->desdocu'),
               array('name'=>'referencia','header'=>'Numero','value'=>'$data->dcajachica->referencia'),
             array('name'=>'fecha','header'=>'Fecha','value'=>'$data->dcajachica->fecha'),
            array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
           // array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
            
            		
	),
)); ?>

    
    
    
    
    
    
    
    
    
    
    
   