<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tmoneda-grid',
	'dataProvider'=>$model->search_por_fecha($fecha),
	//'filter'=>$model,
    'summaryText'=>'',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'fecha',
            'dia',
            'codmon',
		//'codmon2',
		
		array('name'=>'compra','value'=>'$data->compra'),
                array('name'=>'venta','value'=>'$data->venta'),
            ///array('name'=>'ultima','header'=>'Ultima modificacion','value'=>'MiFactoria::tiempopasado($data->ultima)','htmlOptions'=>array('width'=>300)),
	
	),
)); ?>