<?php


    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>$codocu.'-'.$id.'-mensajes-grid',
            'dataProvider'=>Mensajes::model()->search_docu($codocu,$id),
              'itemsCssClass'=>'table table-striped table-bordered table-hover', 
                  'columns'=>array(
                array('name'=>'tipo','type'=>'raw','value'=>'($data->tipo=="M")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."email.png"):$data->tipo','htmlOptions'=>array('width'=>50)),

                'cuando',
                'usuario',
                'titulo',
                'leido',
              //  array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),

                // 'tipo',
                array('name'=>'nombrefichero','htmlOptions'=>array('width'=>50)),
                // 'enviadoel',
            ),
        )
    ) ;


?>