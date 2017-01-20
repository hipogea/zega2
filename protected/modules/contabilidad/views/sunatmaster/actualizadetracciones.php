<?PHP MiFactoria::titulo("Actualizar tabla de detracciones", "check16");  ?>
<div class="form">
<?php echo CHtml::beginForm(); ?>
<table class="table table-striped table-bordered table-hover">
<tr><th>Cod</th><th>Concepto</th><th>Tasa(%)</th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>
<td><?php echo CHtml::activeTextField($item,"[$i]codigo",array('size'=>1,'disabled'=>'disabled')) ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]descripcion",array('size'=>50,'disabled'=>'disabled'));  ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]tasa",array('size'=>3)/*array('value'=>yii::app()->tipocambio->getcambioremoto($item->codmon1)*/) ;  echo CHtml::error($item,"[$i]tasa"); ?></td>

</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Actualizar'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->