<?php
/**
 * Created by PhpStorm.
 * User: grecia
 * Date: 11/06/2015
 * Time: 15:18
 */
 $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid1',
    'dataProvider'=>Authobjetoslista::model()->search($model->id,$usuario->iduser),
   // 'filter'=>$model,
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
    'columns'=>array(
        'iduser',
        'valorobjeto',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
        ),
    ),
)); ?>

<div class="botones">
    <?php
    $UrlDefault = $this->createUrl('/authobjetos/agregarvalores',array('id'=>$model->id,'idu'=>$usuario->iduser,'asDialog'=>1));
    echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/link-add.png','', array('height'=>25,'width'=>25)), '#',array('onclick'=>" $('#cru-frame3').attr('src','$UrlDefault ');$('#cru-dialog3').dialog('open');",'class'=>'botoncito'));
    ?>
</div>