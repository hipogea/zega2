<?php
/* @var $this InventarioController */
/* @var $data Inventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idinventario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idinventario), array('view', 'id'=>$data->idinventario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_estado')); ?>:</b>
	<?php echo CHtml::encode($data->c_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::encode($data->codep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codlugar')); ?>:</b>
	<?php echo CHtml::encode($data->codlugar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigosap')); ?>:</b>
	<?php echo CHtml::encode($data->codigosap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoaf')); ?>:</b>
	<?php echo CHtml::encode($data->codigoaf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clasefoto')); ?>:</b>
	<?php echo CHtml::encode($data->clasefoto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigopadre')); ?>:</b>
	<?php echo CHtml::encode($data->codigopadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerodocumento')); ?>:</b>
	<?php echo CHtml::encode($data->numerodocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicional')); ?>:</b>
	<?php echo CHtml::encode($data->adicional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoafant')); ?>:</b>
	<?php echo CHtml::encode($data->codigoafant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posicion')); ?>:</b>
	<?php echo CHtml::encode($data->posicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentrooriginal')); ?>:</b>
	<?php echo CHtml::encode($data->codcentrooriginal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codeporiginal')); ?>:</b>
	<?php echo CHtml::encode($data->codeporiginal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rocoto')); ?>:</b>
	<?php echo CHtml::encode($data->rocoto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codepanterior')); ?>:</b>
	<?php echo CHtml::encode($data->codepanterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentroanterior')); ?>:</b>
	<?php echo CHtml::encode($data->codcentroanterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clase')); ?>:</b>
	<?php echo CHtml::encode($data->clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('baja')); ?>:</b>
	<?php echo CHtml::encode($data->baja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_direc')); ?>:</b>
	<?php echo CHtml::encode($data->n_direc); ?>
	<br />

	*/ ?>

</div>