<?php
$this->menu=array(
array('label'=>'Ver tipo de cambio', 'url'=>array('cambio')),
    array('label'=>'Monedas', 'url'=>array('listamonedas')),
	array('label'=>'Establecer Cambio', 'url'=>array('updatecambio')),
);

?>
<h1>Actualizar cambio al :   <span style="color:red; font-weight:bold;"><?php echo $fecha;   ?></span> </h1>
<div class="form">
<?php echo CHtml::beginForm(); ?>
<table class="table table-striped table-bordered table-hover">
<tr><th>Moneda</th><th>Compra</th><th>Venta</th></tr>
<?php 
//var_dump($items);
foreach($items as $i=>$item): ?>
<?php $mon=$item->codmondef; ?>
<tr>
    <td><?php echo CHtml::activeHiddenField($item,"[$i]codmondef",array('value'=>$mon )) ?><?php echo CHtml::activeTextField($item,"[$i]codmon",array('disabled'=>'disabled')) ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]compra"); echo CHtml::error($item,"[$i]compra"); ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]venta"/*array('value'=>yii::app()->tipocambio->getcambioremoto($item->codmon1)*/) ;  echo CHtml::error($item,"[$i]venta"); ?></td>

</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Actualizar'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->

