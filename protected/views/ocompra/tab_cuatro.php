<div class="panelizquierdo">


<?php
if (!$model->isNewRecord) {

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'detallex-grid',
            'dataProvider'=>Mensajes::model()->search_docu($model->coddocu,$model->idguia),
            'columns'=>array(
                'cuando',
                'usuario',
                'nombrefichero',
                'enviadoel',
            ),
        )
    ) ;
}

?>
</div>
    <div class="panelderecho">

<?php  $datos1 = CHtml::listData(Coordocs::model()->findAll("codocu=:hu",array(":hu"=>$this->documento)),'id','nombrereporte');
echo $form->DropDownList($model,'idreporte', $datos1,array('prompt' =>'Seleccione un reporte')); ?>


    </div>

<div id="zona_pdf">

</div>