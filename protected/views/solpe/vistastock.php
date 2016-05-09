
<?php $material=Maestrocompo::model()->findByPk($codigo); ?>
     <span class="label badge-warning" ><?php echo $material->codigo."-".$material->descripcion; ?></span><br>

     <div style="float: left; width:120px; padding-right: 5px;"><br>
     <?php

    //echo CHtml::image("/recurso/materiales/".$codigo.".JPG","",array("height"=>"200","width"=>"200")) ;
    Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",120,120)

    ?>
     </div>
     <div style="float: left; width:300px;">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'alinvedntario-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
   // 'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',
    'dataProvider'=>Alinventario::model()->search_por_codigo($codigo),
    //'filter'=>$model,
    'summaryText'=>'',
    'columns'=>array(
        'codcen',
        'codalm',
        'maestro.maestro_ums.desum',
        //array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>60,"width"=>"60"))'),
        'cantlibre',
        'cantres',
        'canttran',
        array('name'=>'punit','header'=>'P. Unit','value'=>'round($data->punit,2)'),
    ),
)); ?>
         </div>




