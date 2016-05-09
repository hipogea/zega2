

<?php
if (!$model->isNewRecord) {

    $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'detallex-grid',
            'dataProvider'=>Mensajes::model()->search_docu($model->codocu,$model->id),
            'itemsCssClass'=>'table table-striped table-bordered table-hover',
            'columns'=>array(
                'cuando',
                'tipo',
                'usuario',
                'nombrefichero',
                'enviadoel',
            ),
        )
    ) ;
}

?>
