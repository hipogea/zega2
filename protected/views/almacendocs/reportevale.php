<?php ?>

    <div class="logo">
        <div class="nombreempresa">
        <?php echo CHtml::image('/recurso/logos/021.jpg',"hola",array('width'=>'60','height'=>'60'));  ?>
        </div>
    <div class="nombreempresa">
        <?php echo $vale->codsociedad0->dsocio."<br>";  ?>
        <?php echo "R.U.C. :".$vale->codsociedad0->rucsoc."<br>"; ?>
        <?php  //$vale->codsociedad0->dirsoc."<br>"; ?>
        <?php //$vale->codsociedad0->dirsoc."<br>"; ?>
    </div>
    </div>

<div class="titulo">
<?php echo $vale->almacendocs_documentos->desdocu;  ?> <?php echo " - ".$vale->numvale;  ?>
</div>

    <div class="subtitulo">
        <?php echo $vale->codcentro;  ?>-<?php echo $vale->codcentro0->nomcen;  ?>
    </div>
      <br>
<div class="subtitulo2">
                 <?php echo $vale->almacendocs_almacenmovimientos->movimiento;  ?>
</div>



    <div class="filainterior">

        <br><br>
<div class="panelizquierdo">

     <div class="filainterior"><div class="etiqueta">Fecha del documento :</div> <div class="valor"><?php echo $vale->fechavale;?> </div></div>
    <div class="filainterior"><div class="etiqueta">Fecha contable :</div> <div class="valor"><?php echo $vale->fechacont;?> </div></div>
    <div class="filainterior"><div class="etiqueta"> Documento de referencia :</div><div class="valor"><?php echo $vale->numdocref."  -  ".$vale->docureferencia->desdocu;?></div></div>
    </div>

    <div class="panelderecho">
        <div class="filainterior"><div class="etiqueta">Descripción larga :</div> <div class="valor"><?php echo $vale->textolargo;?></div></div>
        <div class="filainterior"><div class="etiqueta">Creado  por :</div><div class="valor"><?php echo $vale->creadopor;?></div></div>

        <div class="filainterior"><div class="etiqueta">Generado por  :</div><div class="valor"><?php echo $usuario->ap."-".$usuario->nombres;?></div></div>
        <div class="filainterior"><div class="etiqueta">Imputacion  :</div><div class="valor"><?php echo "";?></div></div>

    </div>
  </div>

<div class="filainterior">
    <div class="indicaciones"><?php echo $vale->textolargo;?></div>
</div>

<hr>

  <br>
<?php ?>

<div class="filainterior">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid',
    'dataProvider'=>VwKardex::model()->search_porvale_firme($vale->id),
    //'filter'=>$model,
    'summaryText'=>'',
    'summaryText'=>'',
    'columns'=>array(
        array('name'=>'cant','header'=>'Cantidad','htmlOptions'=>array('width'=>30),),
        'desum',
        array('name'=>'codart','header'=>'Codigo','htmlOptions'=>array('width'=>60),),
        array('name'=>'descri','header'=>'Descripcion','type'=>'html','value'=>'$data->descripcion','htmlOptions'=>array('width'=>400),),

        //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' )


    ),
)); ?>

  </div>



<br>
<br>
<br>
<br>
<div class="filainterior">
    <div class="firma2"></div>

</div>