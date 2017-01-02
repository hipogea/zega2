<div class='panelizquierdo'>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'decfrcajachica-grid',
      'dataProvider'=> $proveedordef,
   'hideHeader'=>true,
    'summaryText'=>'',
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  //'extraRowColumns' => array('idcolector'),
	/* 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_monto'])) $totals['sum_monto'] = 0;
		 $totals['sum_monto']+=$data['monto'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Asignaciones por actividad : ".MiFactoria::decimal($totals["sum_monto"],2)." </span>"',
	 'extraRowPos'=>'below',
                */ 
	
	//'filter'=>$model,
	'columns'=>array(
              //array('name'=>'glosa','header'=>'Glosa','value'=>'$data->dcajachica->glosa'),                
            array('name'=>'designacion','header'=>'Tipo ','value'=>'$data[designacion]'),
                array('name'=>'mplan','header'=>'Tip Doc','value'=>'round($data[mplan],2)'),
               array('name'=>'mreal','header'=>'Numero','value'=>'round($data[mreal],2)'),
            // array('name'=>'fecha','header'=>'Fecha','value'=>'$data->dcajachica->fecha'),
            //array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
           // array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
            
            		
	),
)); ?>

    </div>
    
    <div class='panelizquierdo'>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'decfrtycajachica-grid',
      'dataProvider'=> $proveedorceco,
   'hideHeader'=>true,
    'summaryText'=>'',
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  //'extraRowColumns' => array('idcolector'),
	/* 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_monto'])) $totals['sum_monto'] = 0;
		 $totals['sum_monto']+=$data['monto'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Asignaciones por actividad : ".MiFactoria::decimal($totals["sum_monto"],2)." </span>"',
	 'extraRowPos'=>'below',
                */ 
	
	//'filter'=>$model,
	'columns'=>array(
              //array('name'=>'glosa','header'=>'Glosa','value'=>'$data->dcajachica->glosa'),                
            array('name'=>'designacion','header'=>'Tipo ','value'=>'$data[designacion]'),
                array('name'=>'mplan','header'=>'Tip Doc','value'=>'round($data[mplan],2)'),
               array('name'=>'mreal','header'=>'Numero','value'=>'round($data[mreal],2)'),
            // array('name'=>'fecha','header'=>'Fecha','value'=>'$data->dcajachica->fecha'),
            //array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
           // array('name'=>'monto','header'=>'Monto','value'=>'$data->monto'),
            
            		
	),
)); ?>

    </div>
    
    
    
    
    
    
    
    
   