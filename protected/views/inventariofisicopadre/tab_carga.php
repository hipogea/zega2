<div class="panelizquierdo">

    <?php MiFactoria::titulo('Estructura del archivo de carga','grid');?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'carga-grid',
    'dataProvider'=>Cargamasivadet::model()->search_por_carga($model->hidcarga),
    'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
    //'filter'=>$model,
        'summaryText'=>'',
    'columns'=>array(
       // 'id',
        'aliascampo',
        array('name'=>'nombrecampo','header'=>'Campo','type'=>'raw','value'=>'($data->esclave=="1")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ajustes.png")." - ".$data->nombrecampo:"".$data->nombrecampo'),
       // 'esclave',
       // 'requerida',
        'longitud',
        'tipo',
        'orden',
       // 'activa',
    ),
)); ?>
</div>

<div class="panelderecho">
    <?php MiFactoria::titulo('Cargas efectuadas','arrow_up');?>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'carga-gridkk',
        'dataProvider'=>Cargainventariofisico::model()->search_por_inventario($model->id),
        'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
        //'filter'=>$model,
        'summaryText'=>'',
        'columns'=>array(
          'fecha',
            array('value'=>'yii::app()->user->um->loadUserbyId($data->iduser)->username'),
            'nregistros'

        ),
    )); ?>

</div>