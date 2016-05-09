<?php
/**
 * Created by PhpStorm.
 * User: grecia
 * Date: 11/06/2015
 * Time: 15:18
 */
 $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid2',
    'dataProvider'=>Authobjetosrango::model()->search($model->id,$usuario->iduser),
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
   // 'filter'=>$model,
    'columns'=>array(
        'iduser',
        'valor1',
        'valor2',
        array(
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update'=>array('visible'=>'false'),
                'delete'=>
                    array(
                        'visible'=>'true',
                        'url'=>'$this->grid->controller->createUrl("/authobjetos/borrarangos", array("id"=>$data->id))',
                        'options' => array( 'ajax' => array('type' => 'GET', 'success' => 'js:function() { $.fn.yiiGridView.update("detalle-grid2"); alert("Se anulo el Item");}' ,'url'=>'js:$(this).attr("href")'),
                            'onClick'=>'Loading.show();Loading.hide(); ',
                        ) ,
                        'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
                        'label'=>'Eliminar',
                    ),

            )
        ),
    ),
)); ?>

<div class="botones">
    <?php
    $UrlDefault = $this->createUrl('/authobjetos/agregarrangos',array('id'=>$model->id,'idu'=>$usuario->iduser, 'asDialog'=>1));
    echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/link-add.png','', array('height'=>25,'width'=>25)), '#',array('onclick'=>" $('#cru-frame3').attr('src','$UrlDefault ');$('#cru-dialog3').dialog('open');",'class'=>'botoncito'));
    ?>
</div>