<div class="panelizquierdo">


</div>
    <div class="panelderecho">

<?php  $datos1 = CHtml::listData(Coordocs::model()->findAll("codocu=:hu",array(":hu"=>$this->documento)),'id','nombrereporte');
echo $form->DropDownList($model,'idreporte', $datos1,array('prompt' =>'Seleccione un reporte')); ?>


    </div>


<?php
if (!$model->isNewRecord) {

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'detallex-grid',
            'dataProvider'=>Mensajes::model()->search_docu($model->coddocu,$model->idguia),
            'columns'=>array(
                array('name'=>'tipo','type'=>'raw','value'=>'($data->tipo=="M")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."email.png"):$data->tipo','htmlOptions'=>array('width'=>50)),

                'cuando',
                'usuario',
              //  array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),

                // 'tipo',
                array('name'=>'nombrefichero','htmlOptions'=>array('width'=>50)),
                // 'enviadoel',
            ),
        )
    ) ;
}

?>

<div id="zona_pdf">

</div>