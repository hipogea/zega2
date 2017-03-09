<?php $this->renderpartial('cabecera',array('model'=>$model)); ?>
<div class="form">
<?php echo CHtml::beginForm(); ?>
<table class="table table-striped table-bordered table-hover">
<tr><th>Numero</th><th>Glosa</th><th>Monto</th><th>Imputado</th><th>Imputar</th><th>Calif.</th><th>Imputacion</th></tr>
<?php foreach($items as $i=>$item): ?>
<?php if($item->esimputable()){ ?>
<tr>
<td><?php echo CHtml::activeTextField($item,"[$i]referencia",array('disabled'=>'disabled')) ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]glosa",array('disabled'=>'disabled')); /*echo CHtml::error($item,"[$i]compra");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]monto"/*array('value'=>yii::app()->tipocambio->getcambioremoto($item->codmon1)*/,array('disabled'=>'disabled','size'=>4)) ;  /*echo CHtml::error($item,"[$i]venta");*/ ?></td>
<td><?php echo CHtml::TextField(uniqid(),$item->imputado()/*array('value'=>yii::app()->tipocambio->getcambioremoto($item->codmon1)*/,array('disabled'=>'disabled','size'=>4)) ;  /*echo CHtml::error($item,"[$i]venta");*/ ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]montoimputado",array('size'=>4,'value'=>($item->monto-$item->imputado()).'')) ;  /*echo CHtml::error($item,"[$i]venta");*/ ?></td>

<td><?php echo CHtml::activeTextField(
        $item,
        "[$i]tipimputacion",
        array(
            'size'=>1,
            'ajax'=>array(
                'url'=>yii::app()->createUrl($this->id."/ajaxrefrescawidget"),
                'type'=>'POST',
                'data'=>array(
                    'valor'=>"js:Dcajachica_".$i."_tipimputacion.value",
                    'i'=>$i,
                    'campo'=>"[$i]ceco",
                     //'item'=>CJSON::encode($item),
                    ),
                'replace'=>"#etiqueta_".$i,
                        )
            )
        ) ;  echo CHtml::error($item,"[$i]tipimputacion"); ?></td>

<td>
    <div id="etiqueta_<?php echo $i; ?>">
    <?php 
    //var_dump($item->tipimputacion);
    if(!empty($item->tipimputacion)) {
        
       iF($item->tipimputacion=='K')
            $ruta=$this->createUrl('Request/suggestceco');
        elseif($item->tipimputacion=='T')
            $ruta=$this->createUrl('Request/suggestot');
        else
            $ruta="";
           $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$item,
			'attribute'=>"[$i]ceco",
                        'source'=>$ruta,
                        'options'=>array(
				'showAnim'=>'fold',),
                             
						));
    }
         
    echo CHtml::error($item,"[$i]ceco"); ?>
    </div></td>

</tr>
<?php } ?>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Actualizar'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->

