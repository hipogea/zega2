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

