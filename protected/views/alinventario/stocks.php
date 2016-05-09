
<?php
$proveedor=Alinventario::model()->search_por_codigo($model->codart);


$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'alinvedntario-gridDE',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
    //'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',
    'dataProvider'=>$proveedor,
    //'filter'=>$model,
    'summaryText'=>'',
    'columns'=>array(
        'codcen',
        'alinventario_centros.nomcen',
        'codalm',
        array('name'=>'cantlibre','value'=>'round($data->cantlibre,2)','footer'=>round($model->getTotalcant($proveedor),2)),

        'maestro.maestro_ums.desum',
        //array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>60,"width"=>"60"))'),
        //'cantlibre',

        'cantres',

        //'descripcion',
        //'punit',
        'punit',
        //array('name'=>'ptlibre','value'=>'Yii::app()->numberFormatter->format("0,##0.00",$data->ptlibre)'),
        array('name'=>'pttotal','value'=>'round($data->punit*$data->cantlibre,2)','footer'=>round($model->getTotal($proveedor),2)),


     ),
       ));
?>




