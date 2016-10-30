<?php
$this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'detallecompo-grid',
      'dataProvider'=>Neot::model()->search_por_ot($model->id),
      'mergeColumns' => array('numero','textoactividad'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  'extraRowColumns' => array('numero'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_cant'])) $totals['sum_cant'] = 0;
		 $totals['sum_cant']+=$data['cant'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total OT : ".MiFactoria::decimal($totals["sum_cant"],2)." </span>"',
	 'extraRowPos'=>'below',
                 
	
	//'filter'=>$model,
	'columns'=>array(
                'cant',
            array('name'=>'serie','header'=>'Serie','value'=>'$data->detgui->ne->c_serie'),
		array('name'=>'numero','header'=>'N° Ingr.','value'=>'$data->detgui->ne->c_numgui'),
            array('name'=>'item','header'=>'Item','value'=>'$data->detgui->c_itguia'),
            array(
			'name'=>'fechatra',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Fecha',
			'value'=>'date("d.m.y", strtotime($data->detgui->ne->d_fectra))',
			'htmlOptions'=>array('width'=>40),
		),
               // 'detgui.item',
             array('name'=>'textoactividad','value'=>'$data->detgui->c_descri'),
             // array('name'=>'textoactividad','value'=>'$data->detgui->c_descri'),
              array('name'=>'user','value'=>'yii::app()->user->um->loadUserById($data->iduser)->username'),
            // array('name'=>'creado','value'=>'yii::app()->user->um->loadUserById($data->iduser)->username'),
           // 'detalleot.ot.objetosmaster.masterequipo.descripcion',
           // 'detalleot.ot.objetosmaster.identificador',

            /*
            'detot.textocorto',
                ' detot.codobjeto',
               'detot.nombreobjeto',
              'detot.descripcion',*/
         
				
	),
)); ?>

    
    
    
    
    
    
    
    
    
    
    
   