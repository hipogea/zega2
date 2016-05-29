<?php
$opcionesajax=array(
    'type' => 'GET',
    'url' => CController::createUrl('site/cargaayuda'), //  la acci?n que va a cargar el segundo div
    'update' => '#ayuda_panel', // el div que se va a actualizar
   // 'data'=>array('topico'=>'js:Desolpe_codart.value'),
);
?>
<h1> Manual de usuario </h1>

<?php
$opcionesajax['data']=array('topico'=>'1');
  ECHO CHtml::ajaxLink("1 Inicio",CController::createUrl('site/cargaayuda'),$opcionesajax);
?>
<br>


<?php
$opcionesajax['data']=array('topico'=>'2');
ECHO CHtml::ajaxLink("2 Conceptos preliminares Importantes",CController::createUrl('site/cargaayuda'),$opcionesajax);
?>
<br>

<?php
$opcionesajax['data']=array('topico'=>'3');
ECHO CHtml::ajaxLink("3 Navegación básica",CController::createUrl('site/cargaayuda'),$opcionesajax);
?>
<br>

<?php
$opcionesajax['data']=array('topico'=>'3.1');
ECHO CHtml::ajaxLink("3.1 Widget",CController::createUrl('site/cargaayuda'),$opcionesajax);
?>
<br>




