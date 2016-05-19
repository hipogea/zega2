<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'carga-grid',
    'dataProvider'=>Cargamasivadet::model()->search_por_carga($model->hidcarga),
    'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
    //'filter'=>$model,
    'columns'=>array(
        'id',
        'aliascampo',
        array('name'=>'nombrecampo','header'=>'Campo','type'=>'raw','value'=>'($data->esclave=="1")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ajustes.png")." - ".$data->nombrecampo:"".$data->nombrecampo'),
        'esclave',
        'requerida',
        'longitud',
        'tipo',
        'orden',
        'activa',
    ),
)); ?>