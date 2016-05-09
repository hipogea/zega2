<?php ?>

    <div class="logo">
        <div class="nombreempresa">
        <?php echo CHtml::image('/recurso/logos/021.jpg',"hola",array('width'=>'60','height'=>'60'));  ?>
        </div>
    <div class="nombreempresa">
        <?php echo $ocompra->codsociedad0->dsocio."<br>";  ?>
        <?php echo "R.U.C. :".$ocompra->codsociedad0->rucsoc."<br>"; ?>
        <?php  //$ocompra->codsociedad0->dirsoc."<br>"; ?>
        <?php //$ocompra->codsociedad0->dirsoc."<br>"; ?>
    </div>
    </div>

<div class="titulo">
<?php echo $ocompra->ocompra_documentos->desdocu;  ?> <?php echo " - ".$ocompra->numcot;  ?>
</div>

    <div class="subtitulo">
        <?php echo $ocompra->codcentro;  ?>-<?php echo $ocompra->ocompra_centros->nomcen;  ?>
    </div>
    <div class="filainterior">

        <br><br>
<div class="panelizquierdo">

     <div class="filainterior"><div class="etiqueta">Se&ntilde;ores :</div> <div class="valor"><?php echo $ocompra->clientes->despro;?> </div></div>
    <div class="filainterior"><div class="etiqueta">RUC :</div> <div class="valor"><?php echo $ocompra->clientes->rucpro;?> </div></div>
    <div class="filainterior"><div class="etiqueta"> Referencia :</div><div class="valor"><?php echo $ocompra->orcli;?></div></div>
    <div class="filainterior"><div class="etiqueta">Fecha :</div><div class="valor"> <?php echo $ocompra->fecdoc;?></div></div>
    <div class="filainterior"><div class="etiqueta">Atención : </div><div class="valor"><?php echo $ocompra->contactos->c_nombre." / ".$ocompra->contactos->c_cargo." / ".$ocompra->contactos->c_tel." / ".$ocompra->contactos->c_mail;?></div></div>
 </div>

    <div class="panelderecho">
        <div class="filainterior"><div class="etiqueta">Moneda :</div> <div class="valor"><?php echo $ocompra->monedita->desmon;?></div></div>
        <div class="filainterior"><div class="etiqueta">Forma de pago :</div> <div class="valor"><?php echo $ocompra->fpago->tipofacturacion;?> </div></div>
        <div class="filainterior"><div class="etiqueta"> Descuento :</div><div class="valor"><?php echo $ocompra->descuento."%";?></div></div>
        <div class="filainterior"><div class="etiqueta">Grupo compras :</div><div class="valor"> <?php echo $ocompra->codgrupoventas0->nomgru;?></div></div>
        <div class="filainterior"><div class="etiqueta">Tipo Doc : </div><div class="valor"><?php echo $ocompra->tipologia;?></div></div>
        <div class="filainterior"><div class="etiqueta">Contacto  :</div><div class="valor"><?php echo $usuario->ap."-".$usuario->nombres."/".$usuario->telfijo."-".$usuario->telmoviles ;?></div></div>
        <div class="filainterior"><div class="etiqueta">.</div><div class="valor">.</div></div>
    </div>
  </div>

<div class="filainterior">
    <div class="indicaciones"><?php echo "Indicaciones adicionales: ".$ocompra->texto."<br>".$ocompra->textolargo;?></div>
</div>

<hr>

    <div class="filainterior">
        <div class="tenor"><?php echo $ocompra->ocompra_tenorsup->mensaje;?></div>
     </div>


<br>
<?php ?>

<div class="filainterior">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid',
    'dataProvider'=>VwOcompra::model()->search_detalle($ocompra->idguia),
    //'filter'=>$model,
    'summaryText'=>'',
    'columns'=>array(
        'item',
        array('name'=>'cant','header'=>'Cantidad','htmlOptions'=>array('width'=>30),),
        'desum',
        array('name'=>'codart','header'=>'Codigo','htmlOptions'=>array('width'=>60),),
        array('name'=>'descri','header'=>'Descripcion','type'=>'html','value'=>'$data->descri.CHtml::openTag(\'br\').$data->detalle','htmlOptions'=>array('width'=>400),),
        array('name'=>'punit','header'=>'P. unit','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->punit,null)','htmlOptions'=>array('width'=>45),),

        array('name'=>'potal','header'=>'P. total','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->punit*$data->cant,null)','htmlOptions'=>array('width'=>60),),

    ),
)); ?>

  </div>

<div class="filainterior">
    <div style="width 1200px; float:left;" >
         ..
        </div>
<div style="  float:right; width:400px;" >

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'resumen-grid',
        'dataProvider'=>VwOcosubtotal::model()->search($ocompra->idguia),
        //'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file

        //'filter'=>$model,
        'summaryText'=>'',
        'columns'=>array(

            array('name'=>'subtotal','header'=>'Subtotal','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->subtotal+0,null)',),
            array('name'=>'destotal','header'=>'Descuento','value'=>'$data->destotal',),
            array('name'=>'subtotaldes','header'=>'Valor neto','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->subtotaldes+0,null)'),
            array('name'=>'impuesto','header'=>'I.G.V.','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->impuesto+0,null)'),
            array('name'=>'total','header'=>'Total','type'=>'html','value'=>'$data->simbolo."    ".Yii::app()->numberFormatter->format("#,##0.00",$data->total+0,null)','htmlOptions'=>array('width'=>75),),

        ),
    )); ?>
</div>
    </div>

<br>
<div class="filainterior">
    <div class="tenor"><?php echo $ocompra->ocompra_tenorinf->mensaje;?></div>
</div>

<br>
<br>
<br>
<br>
<div class="filainterior">
    <div class="firma2"></div>
</div>