<div style="  ">



</div>



<?php
$this->widget('ext.groupgridview.GroupGridView', array('id'=>'detalleresex-grid',
        'dataProvider'=>VwTrazabilidadSolpe1::model()->search_por_idsolpe($idcabeza),
        'summaryText'=>'',
        'mergeColumns' => array('numcot'),
        'itemsCssClass'=>'table table-striped table-bordered table-hover',
        'columns'=>array(
            'txtmaterial',
                  'numcot',
                'itemcompra',
            'cantkardex',
            'umcompra',
            'fecha',
'movimiento',
'numvale'
),
    )
);
?>

