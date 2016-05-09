
<?php
//echo "cantidad   ".$proveedorestilos->getItemcount();
//PRINT_R($proveedorestilos->getData());
foreach( $proveedorestilos->getData() as $record)
 {
   // var_dump($record);
    $cadena=" position:absolute; ";
    $cadenalabel=" position:absolute; ";
    foreach($record->attributes as $clave=>$valor)
    {
        if(!($clave=='id' or $clave=='nombre_campo' or $clave=='codocu'))
        {
         if(substr($clave,0,strpos($clave,"_"))=="lbl")
                {
                        $clave=str_replace("lbl_","",$clave);
                        $clave=str_replace("_","-",$clave);
                         $cadenalabel.=" ".$clave.":".$valor."; ";
                    } else {
                        $clave=str_replace("_","",$clave);
                        $cadena.=" ".$clave.":".$valor."; ";
                }
        }
      }
    //  echo  $record->getAttributeLabel($record->nombre_campo)."  :   ".$modelo->{$record->nombre_campo}."<br>";
     if($record->visiblelabel=='1')
      echo CHtml::tag("div",array("style"=>$cadenalabel),$modelo->getAttributeLabel($record->nombre_campo) ,true);
     if($record->visiblecampo=='1')
    echo CHtml::tag("div",array("style"=>$cadena),$modelo->{$record->nombre_campo} ,true);
    // echo "  Este es el campo : ".$record->nombre_campo."  <br>";
  }
?>




<div style="position: absolute; top:<?php echo $modelo->y_report;?>px; left:<?php echo $modelo->x_report;?>px"   >

  <?php  $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'detalle-grid',
    'hideHeader'=>'false',
    'dataProvider'=>VwGuia::model()->search_detalle($modelo->id),
    //'filter'=>$modelo,
    'summaryText'=>'',
    'cssFile' => 'themes/abound/css'.DIRECTORY_SEPARATOR.'estiloguia.css',
    'columns'=>array(
    array('name'=>'c_it_guia','type'=>'raw','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:12px;")).$data->c_itguia.CHtml::closeTag("span")','htmlOptions'=>array('width'=>30),),
    array('name'=>'c_it_guia','type'=>'raw','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:12px;")).$data->n_cangui.CHtml::closeTag("span")','htmlOptions'=>array('width'=>30),),
    array('name'=>'c_um','type'=>'raw','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:12px;")).$data->c_um.CHtml::closeTag("span")','htmlOptions'=>array('width'=>30),),
    array('name'=>'c_descri','type'=>'raw','header'=>'Codigo','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:12px;")).$data->c_descri.CHtml::openTag("br").
    CHtml::closeTag("span").CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier;font-size:10px;")).$data->m_obs.CHtml::closeTag("span")','htmlOptions'=>array('width'=>350),),
    //array('name'=>'c_descri','header'=>'Descripcion','type'=>'html','value'=>'$data->c_descri.CHtml::openTag(\'br\').strtolower($data->m_obs)','htmlOptions'=>array('width'=>400),),
    array('name'=>'c_descri','type'=>'raw','header'=>'Codigo','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:12px;")).$data->nomep.CHtml::closeTag("span")','htmlOptions'=>array('width'=>100),),
    array('name'=>'c_descri','type'=>'raw','header'=>'Codigo','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:10px;")).$data->c_codactivo.CHtml::closeTag("span")','htmlOptions'=>array('width'=>80),),
    //array('name'=>'c_descri','type'=>'raw','header'=>'Codigo','value'=>'CHtml::openTag("span",array("encode"=>false,"style"=>"font-family:courier; font-size:9px;")).$data->motivo.CHtml::closeTag("span")','htmlOptions'=>array('width'=>300),),

    ),
    ));
    echo CHtml::openTag("span",array("encode"=>false,"style"=>"font-size:10px;")).str_repeat('*',150).CHtml::closeTag('span');
  ?>
  </div>
<?php  // yii::app()->end();?>
