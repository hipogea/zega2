<?php  //var_dump($peticion->peticion_grupoventas); ?>

    <div class="logo">
        <div class="nombreempresa">
        <?php echo CHtml::image('/recurso/logos/021.jpg',"hola",array('width'=>'60','height'=>'60'));  ?>        </div>
    <div class="nombreempresa">
        <?php echo $peticion->peticion_sociedades->dsocio."<br>";  ?>
        <?php echo "R.U.C. :".$peticion->peticion_sociedades->rucsoc."<br>"; ?>
        <?php  //$peticion->codsociedad0->dirsoc."<br>"; ?>
        <?php //$peticion->codsociedad0->dirsoc."<br>"; ?>
    </div>
    </div>

<div class="titulo">
<?php echo $peticion->peticion_documentos->desdocu;  ?> <?php echo " - ".$peticion->numero;  ?>
</div>

    <div class="subtitulo">
        <?php //echo $peticion->codcentro;  ?>-<?php //echo $peticion->ocompra_centros->nomcen;  ?>
    </div>
    <div class="filainterior">

        <br><br>
<div class="panelizquierdo">

     <div class="filainterior"><div class="etiqueta">Se&ntilde;ores :</div> <div class="valor"><?php echo $peticion->peticion_clipro->despro;?> </div></div>
    <div class="filainterior"><div class="etiqueta">RUC :</div> <div class="valor"><?php echo $peticion->peticion_clipro->rucpro;?> </div></div>
    <div class="filainterior"><div class="etiqueta"> Referencia :</div><div class="valor"><?php echo $peticion->orcli;?></div></div>
    <div class="filainterior"><div class="etiqueta">Fecha :</div><div class="valor"> <?php echo $peticion->fecha;?></div></div>
    <div class="filainterior"><div class="etiqueta">Atención : </div><div class="valor"><?php echo $peticion->peticion_contactos->c_nombre." / ".$peticion->peticion_contactos->c_cargo." / ".$peticion->peticion_contactos->c_tel." / ".$peticion->peticion_contactos->c_mail;?></div></div>
 </div>

    <div class="panelderecho">
        <div class="filainterior"><div class="etiqueta">Moneda :</div> <div class="valor"><?php echo $peticion->peticion_moneda->desmon;?></div></div>
        <div class="filainterior"><div class="etiqueta">Forma de pago :</div> <div class="valor"><?php echo $peticion->peticion_tipofacturacion->tipofacturacion;?> </div></div>
        <div class="filainterior"><div class="etiqueta"> Descuento :</div><div class="valor"><?php echo $peticion->descuento."%";?></div></div>
        <div class="filainterior"><div class="etiqueta">Grupo ventas :</div><div class="valor"> <?php echo $peticion->peticion_grupoventas->desgru;?></div></div>
        <div class="filainterior"><div class="etiqueta">Contacto  :</div><div class="valor"><?php echo $usuario->ap."-".$usuario->nombres.' /  '.$usuario->telfijo.'  / '.$usuario->telmoviles;?></div></div>
        <div class="filainterior"><div class="etiqueta">.</div><div class="valor">.</div></div>
    </div>
  </div>

<div class="filainterior">
    <div class="indicaciones"><?php echo "Indicaciones adicionales: ".$peticion->textocorto."<br>".$peticion->comentario;?></div>
</div>

<hr>

    <div class="filainterior">
        <div class="tenor"><?php echo $peticion->peticion_tenorsup->mensaje;?></div>
     </div>


<br>
<?php ?>

<div class="filainterior">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid',
    'dataProvider'=>VwDpeticion::model()->search_por_peticion($peticion->id),
    //'filter'=>$model,
    'summaryText'=>'',
    'columns'=>array(
        'item',
        array('name'=>'cant','header'=>'Cantidad','htmlOptions'=>array('width'=>30),),
        'desum',
        array('name'=>'codart','header'=>'Codigo','htmlOptions'=>array('width'=>60),),
        array('name'=>'descripcion','header'=>'Descripcion','type'=>'html','value'=>'$data->descripcion.CHtml::openTag(\'br\').$data->comentario','htmlOptions'=>array('width'=>400),),
        array('name'=>'pventa','header'=>'P. unit','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->plista,null)','htmlOptions'=>array('width'=>45),),
        array('name'=>'potal','header'=>'P. total','value'=>'MiFactoria::decimal($data->plista*$data->cant)','htmlOptions'=>array('width'=>60),),

    ),
)); ?>

  </div>

<div class="filainterior">
    <div style="width 1200px; float:left;" >
         ..
        </div>
<div style="  float:right; width:400px;" >

    <?php  $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'resumen-grid',
        'dataProvider'=>VwSubtotalpeticion::model()->search_por_peticion($peticion->id),
        //'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file

        //'filter'=>$model,
        'summaryText'=>'',
        'columns'=>array(

            array('name'=>'subtotal','header'=>'Subtotal','value'=>'MiFactoria::decimal($data->plista+0)',),
            array('name'=>'destotal','header'=>'Descuento','value'=>'MiFactoria::decimal($data->descuento)',),
            array('name'=>'subtotaldes','header'=>'Valor neto','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->pventa+0,null)'),
            array('name'=>'impuesto','header'=>'I.G.V.','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->igv_monto+0,null)'),
           array('name'=>'total','header'=>'Total','type'=>'html','value'=>'$data->simbolo."    ".MiFactoria::decimal($data->pventa+$data->igv_monto+0)','htmlOptions'=>array('width'=>75),),

        ),
    )); ?>


</div>
    </div>

<br>
<div class="filainterior">
    <div class="tenor"><?php echo $peticion->peticion_tenorinf->mensaje;?></div>
</div>

<br>
<br>
<br>
<br>
<div class="filainterior">
    <div class="firma2"></div>
</div>