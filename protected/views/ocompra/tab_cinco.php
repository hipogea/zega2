
<div class="row">

<?php  $datos1 = CHtml::listData(Docompratemp::model()->findAll("hidguia=:hu",array(":hu"=>$model->idguia)),'id','descri');
       IF(count($datos1)==0){
           $datos1 = CHtml::listData(Docompra::model()->findAll("hidguia=:hu",array(":hu"=>$model->idguia)),'id','descri');

       }
echo CHtml::DropDownList('selector_item','', $datos1,array('ajax' => array(
    'type' => 'POST',
    'url' => CController::createUrl('Ocompra/cargaentregas'), //  la acción que va a cargar el segundo div
    'update' => '#division_entregas' // el div que se va a actualizar
),
    'prompt' => 'Seleccione un item' // Valor por defecto
))  ;
?>

<?php
echo $form->HiddenField($model,'idguia');
?>

</div>
<div id="division_entregas">


</div>

