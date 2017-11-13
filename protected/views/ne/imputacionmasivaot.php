<?php $this->renderpartial('viewcabecera',array('model'=>$model)); ?>
<div class="form">
<?php echo CHtml::beginForm(); ?>
<table class="table table-striped table-bordered table-hover">
<tr><th>Item</th><th>Cant.</th><th>Um</th><th>Cod</th><th>Descripcion</th><th>Cant. Sug</th><th>Asignacion</th></tr>
<?php foreach($items as $i=>$item): ?>
<?php if($item->esimputableot()){ ?>
<tr>
<td><?php echo CHtml::activeTextField($item,"[$i]c_itguia",array('disabled'=>'disabled','size'=>2)) ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]n_cangui",array('disabled'=>'disabled','size'=>3)); /*echo CHtml::error($item,"[$i]compra");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]c_um",array('disabled'=>'disabled','size'=>3)); /*echo CHtml::error($item,"[$i]compra");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]c_codgui",array('disabled'=>'disabled','size'=>5)); /*echo CHtml::error($item,"[$i]compra");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]c_descri",array('disabled'=>'disabled','size'=>40)); /*echo CHtml::error($item,"[$i]compra");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]cantot",array('value'=>$item->n_cangui-$item->asignadosot)); echo CHtml::error($item,"[$i]cantot"); ?></td>
<td>
    
    <?php 

            $ruta=$this->createUrl('Request/suggestot');
       
           $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$item,
			'attribute'=>"[$i]otref",
                        'source'=>$ruta,
                        'options'=>array(
				'showAnim'=>'fold',),
                             
						));
    
         
    echo CHtml::error($item,"[$i]otref"); ?>
    </td>

</tr>
<?php } ?>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Actualizar'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->

