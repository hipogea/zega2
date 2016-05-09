<?php
class Julian  {
    CONST DOCUMENTO_SOLPE='340';
    const DOCUMENTO_VALE='101';
    CONST CODIGO_MATERIAL_SERVICIO='10000001';

    public static function limpialogcarga(){
        $mode=NEW Logcargamasiva();
        $nombretabla=$mode->tableName();
        $cadenasql=" DELETE FROM ".$nombretabla." where iduser=".yii::app()->user->id." ";
        Yii::app()->db->createCommand($cadenasql)->execute();
    }



    public static function cleanInput($input) {

        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
            '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
        );

        $output = preg_replace($search, '', $input);
        return $output;
    }



    public static function decimal($valor){

        $cadena= Yii::app()->numberFormatter->format("###,###,##0.00",$valor);
        $cadena=str_replace(".","@",$cadena);
        if(!strpos($cadena,",")===false)
            $cadena=str_replace(",",".",$cadena);
        $cadena=str_replace("@",",",$cadena);
        return $cadena;


    }





    public static function opcionestoolbar($identidad=null,$codocu,$codestado){
        $criterio=New CDbCriteria;
        $criterio->addcondition(" codocu=:vdocu AND codestado=:vestado  AND activo='1' ");
        $criterio->params=array(":vdocu"=>$codocu,":vestado"=>$codestado);
        $botones=array(); //La matriz depurada a devolver
        $botones1=array(); //La matriz depurada a devolver
       $matriz= Opcionesbarra::model()->findAll($criterio);

            foreach ($matriz as $row ) {
              $botones[$row->botones->nameop]=$row->action;
               // $botones1[]=$row->action;
                ///si se trata de un boton o si se trata de un link con parametros de ID
                $botones[$row->botones->nameop]=($row->action=='1')?$row->action:array($row->action,array("id"=>$identidad));
            }


           return $botones;
    }



    public static function colocaimpuesto( $iddocumento , $precioporcantidad , $codocumento , $codigoimpuesto,$idocupadre){
       $criterio=New CDBcriteria();
        $criterio->addCondition("hidocu=:vid AND codocu=:vcodocu AND codimpuesto=:vimp ");
        $criterio->params=array(":vid"=>$iddocumento,":vcodocu"=>$codocumento,":vimp"=>$codigoimpuesto);
        $miko=Impuestosaplicados::model()->find($criterio);

        if(is_null($miko)) {
            $miko = new Impuestosaplicados();
            $miko->hidocu = $iddocumento;

            $miko->codocu = $codocumento;
            $miko->codimpuesto = $codigoimpuesto;
            $miko->hidocupadre = $idocupadre;

        } else {

            $miko->setScenario('actualizaprecio');

        }
        $miko->valor = $precioporcantidad * Valorimpuestos::getimpuesto ( $codigoimpuesto );
       if(!$miko->save()){
           print_r($miko->geterrors());
           yii::app()->end();
       }



    }



public static function insertaprimerdetallecaja($id,$saldo){
    $modelopadre=Cajachica::model()->findByPk($id);
    $modelodet=New Dcajachica();
    $modelodet->hidcaja=$id;
    $modelodet->codtra=$modelopadre->codtra;

}

    public static function estasensesion($id,$codigodoc)	{

        $criterio=New CDbCriteria;
        $criterio->addcondition(" codocu=:vdocu AND iddocu=:vid AND iduser =:vusuario ");
        $criterio->params=array(":vdocu"=>$codigodoc,":vid"=>$id, ":vusuario"=>Yii::app()->user->id);
        $block=Bloqueos::model()->find($criterio);
        if(!is_null($block)) {
            return true ; ///Sui existe bloqueo, estas en sesion
        } else {
            return false;  /// NO hay blqieo esta libre no hay sesion
        }
    }

public function getEstasEnSesion($id,$documento)
{
    return Bloqueos::estasensesion($id,$documento);
}

public function getBloqueo($id,$documento)
{
    return Bloqueos::bloquea($id,$documento);
}

public function getEstabloqueado($id,$documento)
{
    return Bloqueos::establoqueado($id,$documento);
}

public function getDesbloqueo($id,$documento)
{
    return Bloqueos::desbloquea($id,$documento);
}

public function getWhoIsWorkingNow($id,$documento)
{
    return Bloqueos::estaocupado($id,$documento);
}

public function getRegistrosHijos($nombreclase,$campoenlace,$id)
{
  /* var_DUMP($nombreclase);
    yii::app()->end();*/
    $nombretabla=$nombreclase::tableName();
   // if (!$nombreclase::model()->hasAttribute($campoenlace))
      //  throw new CHttpException(500,'El atributo ID en el modelo '.$nombreclase."   NO existe ");


    return $nombreclase::model()->findAllBySql(" select *from ".$nombretabla."
  																 where	 ".$campoenlace."=".$id."  ");
}

public static function ExisteRegistro($nombreclase,$id)
{

    //if (!$nombreclFase::model()->hasAttribute('id'))
       // throw new CHttpException(500,'El atributo ID en el modelo '.$nombreclase."   NO existe ");
   // if (!$nombreclase::model()->hasAttribute('idusertemp'))
       // throw new CHttpException(500,'El atributo ID en el modelo '.$nombreclase."   NO existe ");
    return $nombreclase::model()->find("id= ".$id." AND idusertemp=".Yii::app()->user->id." ");
}


    public static function Devuelvepeticioneshijos($id)
    {

        $registroshijos =Dpeticion::model()->findAllBySql(" select *from
  																".Yii::app()->params['prefijo']."dpeticion
  																 where
  																 hidpeticion=".$id."  ");
        IF(count($registroshijos)==0)
            throw new CHttpException(500,__CLASS__."---".__FUNCTION__." No se encontraron registros hijos para este vale ".$id);
       // self::Mensaje('success','Se devolvieron '.count($registroshijos). ' Registro hijos ');
        Return  $registroshijos;
    }

    public static function CreaSolpeAutomatica($codocu,$id)
    {        $solpe= New Solpe;
        $solpe->textocabecera="Documento automático";
        $solpe->hidref=$id;
        $solpe->codocuref=$codocu;
        $solpe->escompra<>'1';
        if(!$solpe->save()){
            print_r($solpe->getErrors());
            yii::app()->end();
        }

        $solpe->refresh();
         $identidad=$solpe->id;
        unset($solpe);

        $registrospeticiones=self::Devuelvepeticioneshijos($id);
        foreach($registrospeticiones as $fila){
             $registrodesolpe=new Desolpe();
            $registrodesolpe->setScenario('insert');
             $registrodesolpe->hidsolpe=$identidad;
            $registrodesolpe->cant=$fila->cant;
            $registrodesolpe->codart=$fila->codart;
            $registrodesolpe->um=$fila->um;
            $registrodesolpe->txtmaterial=$fila->descripcion;
            $registrodesolpe->imputacion=$fila->imputacion;
            $registrodesolpe->centro=$fila->codcen;
            $registrodesolpe->codal=$fila->codal;
            $registrodesolpe->item=$fila->item;
            $registrodesolpe->tipimputacion='V';
            ////debe de implemntarse la progrtamacion del plan de ventas
            ///temporalmente quieda con programacion plana
             $registrodesolpe->fechaent=date("Y-m-d");
            $registrodesolpe->tipsolpe=$fila->tipo;
            IF(!$registrodesolpe->save()){
                print_r($registrodesolpe->getErrors());
                yii::app()->end();
            }
            unset($registrodesolpe);
        }
        $nuevasolpe=Solpe::model()->findByPk($identidad);
        //$nuevasolpe->save();
        if(!$nuevasolpe->save()){
            print_r($nuevasolpe->getErrors());
            yii::app()->end();
        }
    }



public static function Impuesto($codigo)    {
    $codigo=strtolower($codigo);
    $criteria=new CDbCriteria;
    $criteria->addcondition("activo='1' ");
    $criteria->addcondition("abreviatura='".$codigo."'");
     $impuesto=Impuesto::model()->find($criteria);
    if(is_null($impuesto))
        throw new CHttpException(500,__CLASS__."---".__FUNCTION__."    No se encontro ningun impuesto activo para esta abreviatura : ".$codigo);
    if(!yii::app()->periodo->HoyDentroDe($impuesto->finicio,$impuesto->ffin))
        throw new CHttpException(500,__CLASS__."---".__FUNCTION__."    Verifique los datos maestros de los impuestos, los periodos de validez no coindiden con la fecha actual, psiblemente tenga que actualizarlos : ".$codigo);

     return $impuesto->valor;



}

public static function Insertamensaje($id,$codocu,$tipo,$nombrefichero=null){
    /* registrar el log de impresiones*/
    $mensa=New Mensajes();
    $mensa->usuario=Yii::app()->user->name;
    $mensa->cuando= date("Y-m-d H:i:s");
    $mensa->nombrefichero= $nombrearch;
    $mensa->codocu=$codocu;
    $mensa->hidocu=$id;
    $mensa->save();
}

    public static function registralogcarga($linea,$idcarga,$mensaje,$campo,$level){
        $modelito=new Logcargamasiva();
        $modelito->setAttributes(array(
            'numerolinea'=>$linea,
            'hidcarga'=>$idcarga,
            'campo'=>$campo,
            'mensaje'=>$mensaje,
            'level'=>$level,
            'iduser'=>Yii::app()->user->id,
            'fecha'=>date("Y-m-d H:i:s")
        ));
        $modelito->save();
    }


 /*   public static function ClearBuffer($arraymodeloshijos,$arraycamposlink,$id)
{
    foreach($arraymodeloshijos as $clave=> $nombreclasetemp){
        $campoenlace=$arraycamposlink[$nombreclasetemp];
       /* echo "es el temporal  : ".$nombreclasetemp."<br>";
       echo "es el array de modelos hijos : <br>";
        print_r ($arraymodeloshijos);
        echo "es el array de campos link  : <br>";
        print_r($arraycamposlink);
        echo "es la busqueda  : <br>";
        echo " ".$campoenlace."<br>";*/

       /* $tabla=$nombreclasetemp::tableName();
        $cadenafinal=(is_null($id))?"":" and ".$campoenlace."=".$id." ";
        $cadena=" DELETE FROM ".$tabla." WHERE  idusertemp=".Yii::app()->user->getId()."  ".$cadenafinal;
       //echo $cadena;
    $command1 = Yii::app()->db->createCommand( $cadena);
    $command1->execute();
       // Bloqueos::clearbloqueos(); ///limpirqa tambien sesiones que ya estan obsoletas
        }
    self::Mensaje('success','Se limpio el buffer');
    Return $cadena;
}*/

public static function CargaModelo($nombreclase,$id)
{
  $modelocargado= $nombreclase::model()->FindByPk($id);
    if(is_null($modelocargado))
        throw new CHttpException(500,"NO se encontro ningun registro para la clase ".$nombreclase."  con el id= ".$id);
    Return  $modelocargado;
}

    public static  function InsertaAtencionReserva($idkardex){
        $row=self::CargaModelo('Alkardex',$idkardex);
        if ($row->codmov=='79' OR $row->codmov=='81'){ ///Si es ventas
                $tipodoc='310'; //RreEERVA PARA VENTA
        } elseif($row->codmov=='10'  OR $row->codmov=='20' ){ //7Sies comsumos de materialres
            $tipodoc='450'; //RreEERVA PARA CONSUMO        }
           $matrix= Alreserva::model()->findAll("hidesolpe=:vhidsolpe AND codocu='".$tipodoc."' ",array(":vhidsolpe"=>$row->idref));
          $model=new Atencionreserva();
        $model->cant=-1*$row->cant;
        $model->hidkardex=$row->id;
        $model->hidreserva=$matrix[0]['id'];
        $model->estadoatencion=Atencionreserva::ESTADO_CREADO;
        if(!$model->save())
        throw new CHttpException(500,"NO se Pudo insertar el registro de atenciones reservas ");
    unset($model);unset($matrix);
       // self::Mensaje('success','Se inserta atencion reserva  '.$row->codart);
            unset($row);
       return true;
    }
}
   
   
   
    public static  function  InsertaAlentregasCompras($idkardex){
        $row=self::CargaModelo('Alkardex',$idkardex);
         $model=new Alentregas();
        $model->cant=$row->cant;
        $model->idkardex=$row->id;
        $model->iddetcompra=$row->idref;
        $model->estado=Alentregas::ESTADO_CREADO;
        if(!$model->save())
        throw new CHttpException(500,"NO se Pudo insertar el registro de atenciones compras ");
        unset($model);unset($row);

    }






    public static function InsertaAlkardexTraslado($idkardex,$cantidad){
        $row=self::CargaModelo('Alkardex',$idkardex);
        $model=new Alkardextraslado();
        $model->cant=$cantidad; //Ojo es la cantidad del kardex destino no del origen
        $model->hidkardexemi=$row->id;
       // self::Mensaje('notice','')
       // $model->hidkardexdes=$row->id; ///Es del destino
        $model->codestado=Alkardextraslado::ESTADO_CREADO;
        if(!$model->save()) {
            echo "<br><br><br><br>";
            print_r ( $model->geterrors () );
            throw new CHttpException( 500 , "NO se Pudo insertar el registro de traslados " );
        }
          // self::Mensaje('notice',' sE GRABO EL REGISTRO DE ALKARDEXTRASLADO '.$model->id);
        unset($model);unset($row);
    }



public static function InsertaCcGastos($filakardex){
    //$row=self::CargaModelo('Alkardex',$idkardex);
    $row=$filakardex;
     $model=new CcGastos();
    $model->ceco=self::CargaModelo('Desolpe',$row->idref)->imputacion;
    $model->fechacontable=$row->fecha;
    $model->monto=-1*$row->getMonto(); ///Es el opuesto de todo
    $model->iduser=Yii::app()->user->id;
    $model->tipo='M';
    $model->idref=$row->id;
    if(!$model->save())
        throw new CHttpException(500,"NO se Pudo insertar el registro de Costos ");
    //self::Mensaje('success','Se inserta los gastos  '.$model->monto.'  al ceco '.self::CargaModelo('Desolpe',$row->idref)->imputacion);
    unset($model);unset($row);
}


    public static function InsertaCcGastosServ($idkardex){
        $row=self::CargaModelo('Alkardex',$idkardex);
        $model=new CcGastos();
        $model->ceco=self::CargaModelo('Desolpe',self::CargaModelo('Docompra',$row->idref)->iddesolpe)->imputacion;
        $model->fechacontable=$row->fecha;
        $model->monto=-1*$row->getMonto(); ///Es el opuesto de todo
        $model->iduser=Yii::app()->user->id;
        $model->tipo='S';
        $model->idref=$row->id;
        if(!$model->save())
            throw new CHttpException(500,"NO se Pudo insertar el registro de Costos ");
      //  self::Mensaje('success','Se inserta los gastos  '.$model->monto.'  al ceco '.self::CargaModelo('Desolpe',$row->idref)->imputacion);
        unset($model);unset($row);
    }



public static function insertadespacho($id,$punto,$respon){
   $despachito=Despacho::model()->find("hidkardex=".$id." and vigente='1' ");
    if(is_null($despachito)) {
        $modelo = new Despacho();
        $modelo->hidkardex = $id;
        $modelo->hidpunto = $punto;
        $modelo->fechacreac = date ( "Y-m-d H:i:s" );
        $modelo->responsable = $respon;
        $modelo->iduser = Yii::app ()->user->id;
        $modelo->vigente= '1';
        $modelo->save ();
      }
}




    /*  DEUEL EL CONSJUNTO DE REGISTROS HIJOS DE LOS VALES DE ALMACEN
    *********************/
public static function DevuelveKardexHijos($id){
    $registroshijos =Alkardex::model()->findAllBySql(" select *from
  																".Yii::app()->params['prefijo']."alkardex
  																 where
  																 hidvale=".$id."  ");
           IF(count($registroshijos)==0)
               throw new CHttpException(500,"No se encontraron registros hijos para este vale ".$id);
   // self::Mensaje('success','Se devolvieron '.count($registroshijos). ' Registro hijos ');
        Return  $registroshijos;
}

public static function Borrahijoskardex($id){
    $command = Yii::app()->db->createCommand(" delete from ".Yii::app()->params['prefijo']."alkardex where hidvale= ".$id);
    $command->execute();
}



    public static function DevuelveAlmacenMovimientos(){
     RETURN Almacenmovimientos::model()->findAllBySql(" select *from ".Yii::app()->params['prefijo']."almacenmovimientos  ");

    }





    public static function OpcionesDefault($docu){
        /*$docu='340';  //guia de remision
       /* $docuhijo='350'; //detalle guia de remisio*/
        $registros= Opcionescamposdocu::model()->findAllBySql("select *from
  																".Yii::app()->params['prefijo']."opcionescamposdocu
  																 where
  																 codocu='".$docu."'");

        foreach($registros as $row) {
             if($row->cuantasopcioneshay==0){
                 $registro=new Opcionesdocumentos();
                 $registro->idusuario=Yii::app()->user->id;
                 $registro->idopdoc=$row->id;
                 $registro->save();
                 unset($registro);
             }
        }
        unset($registros);

        return $proveedor=VwOpcionesdocumentos::model()->search_us($docu,Yii::app()->user->id);
    }

  const   CAMPO_CODIGO_MATERIAL='mf_codigomaterial';
    const CAMPO_UM_MATERIAL='mf_unidad_de_medida';
    const   CAMPO_CANTIDAD_MATERIAL='mf_cantidad_material';
    const CAMPO_PRECIO_UNITARIO_MATERIAL='mf_precio_unitario';
    const CAMPO_ID_FILA='mf_id';
    const CAMPO_CODIGO_DOCUMENTO='mf_codoc';
   // const CAMPO_CENTRO='mf_centro';
   // const CAMPO_ALMACEN='mf_almacen';
    const CAMPO_NUMERO_DOC='mf_numdocref';
    const  CAMPO_ID_REF='mf_idref';
    const CAMPO_CENTRO='mf_centro';
    const  CAMPO_ALEMI='mf_alemi';
    const  CAMPO_TXTMATERIAL='mf_textomaterial';
    const ESTADO_DOCOMPRA_ANULADO='40';
    const CAMPO_ID_OTROKARDEX='mf_idotrokardex';
    const CAMPO_MONEDA='mf_moneda';





    public static function DevuelveReingresospendientes ($idvale){
            $items = Yii::app()->db->createCommand("select t.hidvale,t.id AS ".self::CAMPO_ID_FILA.",
                                                 t.codcentro as ".self::CAMPO_CENTRO.",
                                                               t.alemi as ".self::CAMPO_ALEMI.",
                                                             t.idref AS ".self::CAMPO_ID_REF.",
                                                              t.id AS ".self::CAMPO_ID_OTROKARDEX.",
                                                              t.codmoneda as ".self::CAMPO_MONEDA.",
                                                        t.codart AS ".self::CAMPO_CODIGO_MATERIAL.",
                                                        t.um AS ".self::CAMPO_UM_MATERIAL.",
                                                        t.codocuref as  ".self::CAMPO_CODIGO_DOCUMENTO.",
                                                         t.numdocref as  ".self::CAMPO_NUMERO_DOC.",
                                                         t.preciounit as  ".self::CAMPO_PRECIO_UNITARIO_MATERIAL.",
                                                             t.cant AS ".self::CAMPO_CANTIDAD_MATERIAL.",
                                                              sum(x.cant) as n_sumita
 									from {{alkardex}} t
 									LEFT JOIN {{reingreso}} x ON t.id=x.hidkardex
 									WHERE  t.hidvale=".$idvale."
 									group by t.id, t.codart,t.um,t.preciounit,t.codmoneda, t.cant,t.coddoc,t.codcentro,t.hidvale,t.aldes,t.codocuref,t.numdocref
 									HAVING sum(x.cant) < abs(t.cant) or sum(x.cant) is null ")->queryAll();

        return $items;
    }





    /**************************************
     * DEVUELVE LOS REGISTROS DE LA SOLPE QUE ESTAN PENDIENTES DE ANTEDER DE ALMACEN
     * Se fija en los registros de la Solpe que les falta atender, comparando
     * la cantidad pedida Original de la reserva con la cantidad acumulada en las
     * atenciones de almacen, Ademas el precio unitario es consultado desde el
     * Inventario, (Tener en cuenta que el preciuo unitario, se refiere a la
     * Unidad base del inventario, luego el kardex debe de trandforma este precio unitario
     * a la unidad de medida con la que se ha pedido
     * @param $idsolpe , el di de la solpe
     * @return mixed
     ****************************************/



    public static function DevuelveTraspasospendientes ($idvale){
       // $numvale=Solpe::model()->find("numero=:vnumero",array(":vnumero"=>trim($numsolpe)))->id;


     /*observe la linea    t.aldes as ".self::CAMPO_ALEMI.",   quiere defri que el campo alemi es el campo aldes en el kardex de referncia */

        $items = Yii::app()->db->createCommand("select t.hidvale,t.id AS ".self::CAMPO_ID_FILA.",
                                                 t.codcentro as ".self::CAMPO_CENTRO.",
                                                               t.aldes as ".self::CAMPO_ALEMI.",
                                                             t.id AS ".self::CAMPO_ID_REF.",
                                                             s.codmon as ".self::CAMPO_MONEDA.",
                                                        t.codart AS ".self::CAMPO_CODIGO_MATERIAL.",
                                                        t.um AS ".self::CAMPO_UM_MATERIAL.",
                                                        t.codocuref as  ".self::CAMPO_CODIGO_DOCUMENTO.",
                                                         t.numdocref as  ".self::CAMPO_NUMERO_DOC.",
                                                             t.cant AS ".self::CAMPO_CANTIDAD_MATERIAL.",
                                                             r.punit AS ".self::CAMPO_PRECIO_UNITARIO_MATERIAL.",
                                                              sum(x.cant) as n_sumita
 									from {{alkardex}} t
 									INNER JOIN {{alinventario}} r ON t.alemi=r.codalm
 									and t.codcentro=r.codcen and t.codart=r.codart
 									INNER JOIN {{almacenes}} s on r.codalm=s.codalm  and r.codcen=s.codcen
 									LEFT JOIN {{alkardextraslado}} x ON t.id=x.hidkardexemi
 									WHERE  t.hidvale=".$idvale."
 									group by t.id, t.codart,t.um, t.cant,r.punit,t.coddoc
 									HAVING sum(x.cant) < t.cant or sum(x.cant) is null ")->queryAll();
        return $items;
    }

   public static function tiempopasado($fecha){
      $tinicial= strtotime($fecha);
       $tfinal=time();
         $diferencia=$tfinal-$tinicial;
         $segano=60*60*24*7*30*12;
         $segmes=60*60*24*7*30;
         $segdia=60*60*24;
         $seghora=60*60;
         $segminuto=60;

       $annos=floor($diferencia/$segano);
       $meses=floor(($diferencia-$annos*$segano)/$segmes);
       $dias=floor(($diferencia-$annos*$segano-$meses*$segmes)/$segdia);
       $horas=floor(($diferencia-$annos*$segano-$meses*$segmes-$dias*$segdia)/$seghora);
       $minutos=floor(($diferencia-$annos*$segano-$meses*$segmes-$dias*$segdia-$horas*$seghora)/$segminuto);
       $segundos=$diferencia-$annos*$segano-$meses*$segmes-$dias*$segdia-$horas*$seghora-$segminuto*$minutos;

       $tiempopasad="";
       $tiempopasad.=($annos > 0)?" ".$annos."años ":"";
       $tiempopasad.=($meses > 0)?" ".$meses."m ":"";
       $tiempopasad.=($dias > 0)?" ".$dias."d ":"";
       $tiempopasad.=($horas > 0)?" ".$horas."h ":"";
       $tiempopasad.=($minutos > 0)?" ".$minutos."min ":"";
       $tiempopasad.=($segundos > 0)?" ".$segundos."s ":"";

       Return $tiempopasad;







   }


    /**************************************
     * DEVUELVE LOS REGISTROS DE LA SOLPE QUE ESTAN PENDIENTES DE ANTEDER DE ALMACEN
     * Se fija en los registros de la Solpe que les falta atender, comparando
     * la cantidad pedida Original de la reserva con la cantidad acumulada en las
     * atenciones de almacen, Ademas el precio unitario es consultado desde el
     * Inventario, (Tener en cuenta que el preciuo unitario, se refiere a la
     * Unidad base del inventario, luego el kardex debe de trandforma este precio unitario
     * a la unidad de medida con la que se ha pedido
     * @param $idsolpe , el di de la solpe
     * @return mixed
     ****************************************/



    public static function DevuelveSolPespendientes ($numsolpe,$idvale){
        $vale=Almacendocs::model()->findByPk($idvale);

        $almacen=$vale->codalmacen;
        $centro=$vale->codcentro;
        $idsolpe=Solpe::model()->find("numero=:vnumero",array(":vnumero"=>trim($numsolpe)))->id;

        $itemsreservados = Yii::app()->db->createCommand("select t.hidsolpe,t.id AS ".self::CAMPO_ID_FILA.",
                                                             t.id AS ".self::CAMPO_ID_REF.",
                                                             t.centro as ".self::CAMPO_CENTRO.",
                                                               t.codal as ".self::CAMPO_ALEMI.",
'".yii::app()->settings->get('general','general_monedadef')."' as ".self::CAMPO_MONEDA.",
                                                        t.codart AS ".self::CAMPO_CODIGO_MATERIAL.",
                                                        t.um AS ".self::CAMPO_UM_MATERIAL.",
                                                         w.numero as ".self::CAMPO_NUMERO_DOC.",
                                                        w.codocu as  ".self::CAMPO_CODIGO_DOCUMENTO.",
                                                             s.cant AS ".self::CAMPO_CANTIDAD_MATERIAL.",
                                                             r.punit*c.cambio AS ".self::CAMPO_PRECIO_UNITARIO_MATERIAL.",
                                                              sum(x.cant) as n_sumita
 									from {{desolpe}} t
 									INNER JOIN {{alreserva}} s ON s.hidesolpe=t.id
 									INNER JOIN {{alinventario}} r ON t.codal=r.codalm
 									and t.centro=r.codcen and t.codart=r.codart
 									INNER JOIN {{almacenes}} b ON b.codalm=r.codalm
 									INNER JOIN {{tipocambio}} c ON b.codmon=c.codmon1 AND
 									c.codmon2='".yii::app()->settings->get('general','general_monedadef')."'
 									INNER JOIN {{solpe}}  w ON  t.hidsolpe=w.id
 									LEFT JOIN {{atencionreserva}} x ON s.id=x.hidreserva
 									WHERE ( (t.centro='".$centro."'   and t.codal='".$almacen."') and ( ( t.codart <> '".CODIGO_MATERIAL_SERVICIO."' AND   s.estadoreserva not in('30','70') AND s.codocu IN('450') and t.hidsolpe=".$idsolpe." )
 									      or(  t.codart <> '".CODIGO_MATERIAL_SERVICIO."' AND s.estadoreserva = '40' AND   s.codocu IN('800') and t.hidsolpe=".$idsolpe."  ) )    )
 									group by t.id, t.codart,t.um, s.cant,r.punit,s.codocu
 									HAVING sum(x.cant) < s.cant or sum(x.cant) is null ")->queryAll();

        //var_dump( $itemsreservados);yii::app()->end();
        return $itemsreservados;
    }
    /*  DEUEL EL CONSJUNTO DE REGISTROS HIJOS DE LOS VALES DE ALMACEN pero cON ALIAS PARA LOS CAMPOS
 EST SE HACE PARA ABSTRAER ESTE METODOPARA CUALQUIER MOVIMIENTO
*********************/
    public static function DevuelveKardexHijosconalias($id){
        $registroshijos =  Yii::app()->db->createCommand(" select  codart AS ".self::CAMPO_CODIGO_MATERIAL.",
                                                            codcentro as ".self::CAMPO_CENTRO.",
                                                               alemi as ".self::CAMPO_ALEMI.",
                                                                  um AS ".self::CAMPO_UM_MATERIAL.",
                                                                    cant AS ".self::CAMPO_CANTIDAD_MATERIAL.",
                                                                    id AS ".self::CAMPO_ID_OTROKARDEX.",
                                                                    codmoneda AS ".self::CAMPO_MONEDA.",
                                                                    idref AS ".self::CAMPO_ID_REF.",
                                                                    codocuref AS ".self::CAMPO_CODIGO_DOCUMENTO.",
                                                                    preciounit AS ".self::CAMPO_PRECIO_UNITARIO_MATERIAL.",
                                                                     numdocref AS ".self::CAMPO_NUMERO_DOC.",
                                                                     0 AS n_sumita
                                                                  from {{alkardex}}
  																 where
  																 hidvale=".$id."  ")->queryAll();


        IF(count($registroshijos)==0)
            throw new CHttpException(500,"No se encontraron registros hijos para este vale ".$id);
        //self::Mensaje('success',__CLASS__.' => '.__FUNCTION__.'   :     Se devolvieron '.count($registroshijos). ' Registro hijos ');
        Return  $registroshijos;
    }



    public static function DevuelveDetallevaleAnular ($numvale){

    }
 


  public static function DevuelveDetallevaCompraPendiente ($numvale){

    }



    /**************************************
     * DEVUELVE LOS REGISTROS DE LA COMPRA QUE ESTAN PENDIENTES DE INGRESAR
     * Se fija en los registros de la Ocompra  que les falta atender, comparando
     * la cantidad comprada Original  con la cantidad acumulada en las
     * ALENTREGAS de almacen, Ademas el precio unitario es consultado desde la
     * COMPRA, (Tener en cuenta que el preciuo unitario, se refiere a la
     * Unidad de la compra , luego el kardex debe de trandforma este precio unitario
     * a la unidad de medida base del inventario
     * @param $idsolpe , el ID de la compra
     * @return mixed
     ****************************************/
    public static function DevuelveComprasPendientes ($idcompra,$codalmacen){
        $itemscomprados = Yii::app()->db->createCommand("
 									select h.numcot AS ".self::CAMPO_NUMERO_DOC.", d.hidguia,d.id AS ".self::CAMPO_ID_FILA.", d.codart AS ".self::CAMPO_CODIGO_MATERIAL.",
 									 d.codentro as ".self::CAMPO_CENTRO.",
 									 h.moneda as ".self::CAMPO_MONEDA.",
                                    d.codigoalma as ".self::CAMPO_ALEMI.",
 									d.um  AS ".self::CAMPO_UM_MATERIAL.",
 									d.id  AS ".self::CAMPO_ID_REF.",
 									d.coddocu  AS ".self::CAMPO_CODIGO_DOCUMENTO.",
 									 d.cant  AS ".self::CAMPO_CANTIDAD_MATERIAL.", 									 
 									 d.punit  AS ".self::CAMPO_PRECIO_UNITARIO_MATERIAL." , sum(x.cant) as n_sumita
 									from  {{ocompra}}  h  INNER JOIN {{docompra}} d
 									ON h.idguia=d.hidguia	left JOIN {{alentregas}} x ON d.id=x.iddetcompra
 									WHERE  d.codigoalma='".$codalmacen."' and  d.hidguia=".$idcompra." and tipoitem='M' and d.estadodetalle not in('".self::ESTADO_DOCOMPRA_ANULADO."')
 									group by d.id, d.codart,d.um, d.cant,d.punit
 									HAVING sum(x.cant) < d.cant or sum(x.cant) is null ")->queryAll();




        return $itemscomprados;
    }

    /**************************************
     * DEVUELVE LOS REGISTROS DE LA COMPRA DE SERVICIO QUE ESTAN PENDIENTES DE INGRESAR
     * Se fija en los registros de la Ocompra  que les falta atender, comparando
     * la cantidad comprada Original  con la cantidad acumulada en las
     * ALENTREGAS de almacen, Ademas el precio unitario es consultado desde la
     * COMPRA, (Tener en cuenta que el preciuo unitario, se refiere a la
     * Unidad de la compra , luego el kardex debe de trandforma este precio unitario
     * a la unidad de medida base del inventario
     * @param $idsolpe , el ID de la compra
     * @return mixed
     ****************************************/
    public static function DevuelveServiciosPendientes ($idcompra){
        $itemscomprados = Yii::app()->db->createCommand("
 									select h.moneda as ".self::CAMPO_MONEDA.",
 									h.numcot AS ".self::CAMPO_NUMERO_DOC.",
 									d.hidguia,d.id AS ".self::CAMPO_ID_FILA.",
 									d.codart AS ".self::CAMPO_CODIGO_MATERIAL.",
 									 d.codentro as ".self::CAMPO_CENTRO.",
                                    d.codigoalma as ".self::CAMPO_ALEMI.",
 									d.um  AS ".self::CAMPO_UM_MATERIAL.",
 									d.id AS ".self::CAMPO_ID_REF.",
 									d.descri as ".self::CAMPO_TXTMATERIAL.",
 									d.coddocu  AS ".self::CAMPO_CODIGO_DOCUMENTO.",
 									 d.cant  AS ".self::CAMPO_CANTIDAD_MATERIAL.",
 									 d.punit  AS ".self::CAMPO_PRECIO_UNITARIO_MATERIAL." , sum(x.cant) as n_sumita
 									from {{ocompra h}} INNER JOIN {{docompra}} d  on h.idguia=d.hidguia
 									LEFT JOIN {{alentregas x}} ON d.id=x.iddetcompra
 									WHERE  d.hidguia=".$idcompra." AND  tipoitem='S'
 									group by h.moneda,d.id, d.codart,d.um, d.cant,d.punit
 									HAVING sum(x.cant) < d.cant or sum(x.cant) is null ")->queryAll();


        return $itemscomprados;
    }


    /**************************************
     * ESTA FUNCION INSERTA UN REGISTRO EN EL KARDEXTEMP
     *
     * @param $idvale , el ID del vale o cabecera
     * @param $codmov , el cdoigo de movimiento
     * @param  $row , el objeto registro (DEOLPE, DOCOMPRA, KARDEX)
     *          desde se van a copiar los datos al Kardex
     * @return Booleano
     ****************************************/

    public static function CreaTempKardex($idvale,$codmov,$row){
        $retorno=true;
        ///VERIFICANDO QUE NO S EHAYA CREADO YA

      /* $cuantoshay=Tempalkardex::model()->findAll("hidvale=:vhidvale AND
                                            idref=:vidfila AND
                                            coddoc=:vcoddoc AND
                                             idusertemp=".Yii::app()->user->id."  ",


                                        array(":vhidvale"=>$idvale,
                                            ":vidfila"=>$row[self::CAMPO_ID_FILA],
                                            ":vcoddoc"=>$row[self::CAMPO_CODIGO_DOCUMENTO]
                                          )
                                       );*/
     
        $retorno=false;
        $kardex=new Tempalkardex();
       // echo $kardex->getScenario();yii::app()->end();
        $kardex->hidvale=$idvale;
        $kardex->setscenario('buffer');
       $kardex->codart=$row[self::CAMPO_CODIGO_MATERIAL];
         $kardex->um=$row[self::CAMPO_UM_MATERIAL];
        $kardex->codmov=$codmov;
        $kardex->hidvale=$idvale;
        if(!is_null($row[self::CAMPO_TXTMATERIAL]))
        $kardex->comentario=$row[self::CAMPO_TXTMATERIAL];
        $kardex->alemi=$row[self::CAMPO_ALEMI];
        $kardex->codcentro=$row[self::CAMPO_CENTRO];
        $kardex->idstatus=1;///OJO SIEMPRE ES AGREGADO +1
        $kardex->codocuref=$row[self::CAMPO_CODIGO_DOCUMENTO];
        $kardex->numdocref=$row[self::CAMPO_NUMERO_DOC];
       $kardex->idref=$row[self::CAMPO_ID_REF];
        $kardex->idotrokardex=$row[self::CAMPO_ID_OTROKARDEX];
        $kardex->preciounit=$row[self::CAMPO_PRECIO_UNITARIO_MATERIAL];
        $kardex->codmoneda=$row[self::CAMPO_MONEDA];
        //self::Mensaje('notice',__CLASS__.'  '.__FUNCTION__.'  LA CANTIDAD SOLICITADA DEL MATERIAL  : '.$kardex->codart.'  =>  '.$row[self::CAMPO_CANTIDAD_MATERIAL]);
        //self::Mensaje('notice',__CLASS__.'  '.__FUNCTION__.'  LA CANTIDAD ACUMULADA DEL AMTERIAL   : '.$kardex->codart.'  =>  '.(double)$row['n_sumita']);
       // self::Mensaje('notice',__CLASS__.'  '.__FUNCTION__.' El signo es '. Almacenmovimientos::model()->findByPk($codmov)->signo);

        // $kardex->cant=(double)$row['n_sumita'];
       // $kardex->cant=$row[self::CAMPO_CANTIDAD_MATERIAL];
       $kardex->cant=(abs($row[self::CAMPO_CANTIDAD_MATERIAL])-(double)$row['n_sumita'])*Almacenmovimientos::model()->findByPk($codmov)->signo;
      /*  echo " <br><br>";
        var_dump($kardex->attributes);*/
        if( $kardex->save()){
            $retorno=true;
        }else{
          //  print_r($kardex->geterrors());yii::app()->end();
        }


       // self::Mensaje('success','Se inserta el temporal '.$kardex->codart);
        return $retorno;
    }

    public static function Mensaje($nivel,$mensaje){
        $nivel.="_".time();
        $valor=uniqid($nivel."_");
          Yii::app()->user->setFlash($valor,$mensaje);
    }

    public static function Validacentro($centro,$almacen){
        $retorno=true;
        $almacenes=Almacenes::model()->findByPk($almacen);
          if(!is_null($almacenes))
          {
              if(is_null($almacenes->centros)){
                 $retorno=false;
              } else {
                  if($almacenes->centros->codcen<>trim($centro))
                      $retorno=false;
              }
          } else {
              $retorno=false;
          }

              return $retorno;
    }


    public static  function insertadetalles($idvale,$codmov,$numdocref=null){

      //  $idvalex=$idvale;
      /* var_dump($idvale);
        var_dump( $numdocref);*/
       // yii::app()->end();
        $registrox=MiFactoria::RegistrosDetallePorMovimiento($codmov,$numdocref,$idvale);
        //var_dump($registrox);yii::app()->end();
        foreach($registrox as $fila)
        {
             if( !MiFactoria::CreaTempKardex($idvale,$codmov,$fila))
            {
                self::Mensaje('error','No se pudo levantar a memoria el registro de Kardex  '.$fila->codart);
            }
        }
        //self::Mensaje('success',__CLASS__.' => '.__FUNCTION__.'      Se insertaron '.count($registrox). ' Registro hijos ');
    }

public static function InsertaCumple() {
			$matr=Trabajadores::model()->findall("cumple=:dato" , array(":dato"=>date("Y-m-d")));
			//solo puede haber un mensaje de onomastico por dia
			//
			//
			//

			/*echo "<br><br><br><br><br>".count($matr)."<br>";
		 echo date("Y-m-d").'';*/
			$esto=Noticias::model()->find("tiponoticia='02' and aprobado='1' and fecha>=:fechita",array(":fechita"=>date("Y-m-d")));
    /*var_dump($esto);
    yii::app()->end();*/
			//print_r($matr);
			//echo gettype($esto);
		if (count($matr) > 0 and $esto==null)  {
			$cadena="Feliz cumpleaños , el dia de hoy  :  ";
			  for ($i = 0; $i < count($matr); ++$i) {

			  			$cadena=$cadena.$matr[$i]['nombres']." ".$matr[$i]['ap']." ".$matr[$i]['am']."   ";
			  }
$cadena=$cadena."\n";
$cadena=$cadena."Muchas felicidades en este dia ....!";

$mensaje=New Noticias;
$mensaje->txtnoticia=$cadena;
$mensaje->iduser=Confignoticias::model()->findBypK(1)->iduseradm;
$mensaje->autor=Yii::app()->user->um->loadUserById($mensaje->iduser)->username;
$mensaje->tiponoticia='02';
$mensaje->aprobado=1;
$mensaje->fechapropuesta=date('Y-m-d');
$mensaje->fexpira=date('Y-m-d');
if(!$mensaje->save())
    throw new CHttpException(500,'NO s peudo grabra el noticin del cumple.');
        }
    return 1;
}





    public static function RegistrosDetallePorMovimiento($mov,$numdoc=NULL,$idvale=null) {

        switch ($mov) {
            case '10':
                $registros=self::DevuelveSolPespendientes ($numdoc,$idvale);
                break;
            case '79':
            $registros=self::DevuelveSolPespendientes ($numdoc,$idvale);
            break;

            case '68': ///Ingreso de Servicios
                $id=Ocompra::model()->find("numcot=:vnumerocompra",array(":vnumerocompra"=>trim($numdoc)))->idguia;
                $registros=self::DevuelveServiciosPendientes ($id);
                break;

            case '77': //INIICNAR TRASALADO, n hya nada que decolver
                $registros=ARRAY();
                break;
            case '78': //Acepta traslado
                $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
                $registros=self::DevuelveTraspasospendientes($id);
                break;


            case '54': //ANULA ACEPTACION DEL TRASLADO

                $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
                $registros=self::DevuelveKardexHijosconalias($id);
                break;
            case '98':  //carag inicial no haya nada que devolver
                $registros=array();
                break;
            case '89': //anular carga inicial
               // yii::app()->end();
                $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
                $registros=self::DevuelveKardexHijosconalias($id);
                break;
            case '70': //Reingreso
                // yii::app()->end();
                $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
                //var_dump($id);
                $registros=self::DevuelveReingresospendientes ($id);
                break;
            case '20':
            /* echo "salio el mv";
             yii::app()->end();*/
            $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
            $registros=self::DevuelveKardexHijosconalias($id);
            break;

            case '40': //anular ingreso de compras
                /* echo "salio el mv";
                 yii::app()->end();*/
                $id=Almacendocs::model()->find("numvale=:vnumvale",array(":vnumvale"=>trim($numdoc)))->id;
                $registros=self::DevuelveKardexHijosconalias($id);
                break;
                
                 case '30':
              /* echo "salio el mv";
               yii::app()->end();*/
                     $almacen=Almacendocs::model()->findByPk($idvale)->codalmacen;
                $id=Ocompra::model()->find("numcot=:vnumerocompra",array(":vnumerocompra"=>trim($numdoc)))->idguia;
              
                $registros=self::DevuelveComprasPendientes ($id,$almacen);
                break;

            case '50':
               $registros=array();
                break;
            default:
                throw new CHttpException(500,__CLASS__.' => '.__FUNCTION__.'     No se ha encontrado tratamiento de registros hijos para este movimiento revise esta funcion ');

        }
      //  var_dump($registros);
    return $registros;
    }


 public static function TipoCambio($monedaaentregar,$monedaaobtener ) {

      $monedaaobtener=self::cleaninput($monedaaobtener);
      $monedaaentregar=self::cleaninput($monedaaentregar);
      $modelo= Tipocambio::model()->find(" codmon1='".$monedaaentregar."'  and  codmon2='".$monedaaobtener."'");
      if(is_null($modelo))
         throw new CHttpException(500,__CLASS__.' => '.__FUNCTION__.' oNO se ha encontrado el cambio de estas monedas :'.$monedaaentregar."           ".$monedaaobtener."     ");
       return $modelo->cambio;

}





    /* Devuelve los valores de una cosulta de una columan en forma de array */

    public static function arrayColumnaSQL($nombretabla,$nombrecampo,$arraycondicion,$arrayparametros){
       // $comando=yii::app()->db->createCommand()->select($nombrecampo)->from($nombretabla)->where("codocu=:vcodocu AND iddocu=:viddocu",array(":vocodocu"=>$this->coddocu,":viddocu"=>$this->idguia));
        $comando=yii::app()->db->createCommand()->select($nombrecampo)->from($nombretabla)->where($arraycondicion,$arrayparametros);
        $filas=$comando->queryAll();
        $avalores=array();
        //return $filas;

        foreach($filas as $fila){
            /*$avalores[]=$fila->{$nombrecampo};
            /*return $fila->{$nombrecampo};*/
            $avalores[]=$fila[$nombrecampo];

		 }
        unset($filas);

  return array_unique($avalores);


    }


    public function FileReceptor($fullFileName,$userdata) {
        // userdata is the same passed via widget config.
        $path_parts = pathinfo($fullFileName);
        if (rename($fullFileName,$path_parts['dirname'].DIRECTORY_SEPARATOR.$userdata.'.'.$path_parts['extension'] )) {
            $ruta_imagen = $fullFileName;
            $miniatura_ancho_maximo = 200;
            $miniatura_alto_maximo = 200;
            $info_imagen = getimagesize('materiales'.DIRECTORY_SEPARATOR.$userdata.'.'.$path_parts['extension']);
            $imagen_ancho = $info_imagen[0];
            $imagen_alto = $info_imagen[1];
            $imagen_tipo = $info_imagen['mime'];
            $proporcion_imagen = $imagen_ancho / $imagen_alto;
            $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;
            if ( $proporcion_imagen > $proporcion_miniatura ){
                $miniatura_ancho = $miniatura_ancho_maximo;
                $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
            } else if ( $proporcion_imagen < $proporcion_miniatura ){
                $miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
                $miniatura_alto = $miniatura_alto_maximo;
            } else {
                $miniatura_ancho = $miniatura_ancho_maximo;
                $miniatura_alto = $miniatura_alto_maximo;
            }
            switch ( $imagen_tipo ){
                case "image/jpg":
                case "image/jpeg":
                    $imagen = imagecreatefromjpeg( 'materiales'.DIRECTORY_SEPARATOR.$userdata.'.'.$path_parts['extension'] );
                    break;
                case "image/png":
                    $imagen = imagecreatefrompng( 'materiales'.DIRECTORY_SEPARATOR.$userdata.'.'.$path_parts['extension'] );
                    break;
                case "image/gif":
                    $imagen = imagecreatefromgif( 'materiales'.DIRECTORY_SEPARATOR.$userdata.'.'.$path_parts['extension'] );
                    break;
            }

            $lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );
            imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
            imagejpeg($lienzo, 'materiales'.DIRECTORY_SEPARATOR.$userdata.'.'.STRTOUPPER($path_parts['extension']), 50);

        } else {

        }

    }

 public static function validamail($email){
  $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$"; 

     if (eregi($pattern, $email)){ 
        return true; 
     } 
     else { 
        return false; 
     }    
 }

    public static function getcolor ($porcentaje,$rango1,$rango2,$rango3){
        if($porcentaje < $rango1)
        {
                        return "success";
        }
        elseif($porcentaje < $rango2){
            return "info";
        }elseif($porcentaje < $rango3)
        {
            return "danger";
        }

    }
        public static function statusession(){
            $sesion_activa=Yii::app()->user->um->findSession(Yii::app()->user->um->LoadUserById(yii::app()->user->id));
            $minutosrestantes=ROUND(($sesion_activa->expire-time())/60,0);
            $porcentaje=100*round((time()-$sesion_activa->created)/($sesion_activa->expire-$sesion_activa->created),1);
           return array('porcentaje'=>$porcentaje,'minutosrestantes'=>$minutosrestantes);

        }



    public static function octieneparafacturar($numerocompra){
        $entregasyafacturadas= yii::app()->db->createCommand()->
        select('u.id ')->from('{{alentregas}} u,
                                    {{docompra}} v,
                                    {{ocompra}} w,
                                     {{detingfactura}}  x'
        )->where(' x.hidalentrega=u.id and
        u.iddetcompra=v.id AND
        v.hidguia=w.idguia and
        x.codestado <> :vestado
        and w.numcot=:vnumerocompra ' ,
            array(":vnumerocompra"=>$numerocompra,
                ":vestado"=>'20'
            )
        )->queryColumn();




        $criterio=New CDBCriteria();
        $criterio->addCondition(' a.iddetcompra=c.id and c.hidguia=d.idguia ');
        $criterio->addCondition('a.cant > 0');
        $criterio->addCondition('d.numcot=:vnumero');
        $criterio->addNotInCondition('a.id', $entregasyafacturadas);
        $posi=strpos($criterio->condition,':ycp');
        $inicio=(integer)substr($criterio->condition,$posi+4,1);
       // VAR_DUMP($criterio->condition);echo "<br>"; VAR_DUMP($posi);echo "<br>"; VAR_DUMP($inicio);echo "<br>"; yii::app()->end();
        $valores=array();
        $i=$inicio+0;
        foreach($entregasyafacturadas as $clave=>$valor){
            $valores[":ycp".$i]=$valor.'';
            $i=$i+1;
        }
        $criterio->params=$valores;
        $criterio->params[':vnumero']=$numerocompra;
        /*print_r($entregasyafacturadas);*/
         //VAR_DUMP($criterio->condition);yii::app()->end();

        $entregaspendientes=yii::app()->db->createCommand()->
        select('a.id as identrega, a.cant as cantentrega,
                c.item, c.cant as cantcompra, d.numcot
            ')
            ->from('{{alentregas}} a ,
                        {{docompra}} c ,
                        {{ocompra}} d ')
            ->where($criterio->condition,$criterio->params)->queryAll();

        return  $entregaspendientes;
    }



    public static function insertadetallesrecepfactura($model){



//print_r($entregaspendientes);yii::app()->end();

/*
        //Primero debemos verificar si ha habido anulacion de vales
       // y luego darnos cuenta que pares de kardex  (Vale original, Vale anulacion) Son para no considerarlos.
       //Sacando los numeros de vales originales relacionados a la compra
        $vales=yii::app()->db->createCommand()->
        select('a.numvale')->from('{{almacendocs}} a,{{alkardex}} b, {{alentregas}} c')
            ->where("a.id=b.hidvale AND b.id=c.idkardex AND b.numdocref=:nocompra",
                        array(":nocompra"=>$model->numocompra)
                     )->queryColumn();

        VAR_DUMP($vales);ECHO "<BR>";
        //Sacando los numeros de documentos referenciados en dichos vales, que tambien son vales
        $valesreferenciados=yii::app()->db->createCommand()->
        select('a.numdocref')->from('{{almacendocs}} a,{{alkardex}} b, {{alentregas}} c')
            ->where("a.id=b.hidvale AND b.id=c.idkardex AND b.numdocref=:nocompra ",
                array(":nocompra"=>$model->numocompra)
            )->queryColumn();
        VAR_DUMP($valesreferenciados);ECHO "<BR>";
       // var_dump($model->numocompra);
        $arraypar=array_combine($vales,$valesreferenciados);
        $vales=array_unique($vales);
        $valesreferenciados=array_unique($valesreferenciados);

        VAR_DUMP($vales);ECHO "<BR>";
        VAR_DUMP($valesreferenciados);ECHO "<BR>";
      /*  print_r( $arraypar);
        echo "<br><br><br>";
        print_r( $vales);
        echo "<br><br><br>";
        print_r( $valesreferenciados);
        echo "<br><br><br>";*/
        ///Ahora usamos la teoria de conjuntos  $vales INTERESECCION  $valesreferenciados
        ///QUIRE DECIR QEU SI HA HABIDO ANULACIONES , DEBE DE HABER UNA INTERSECCION
      /*  $interseccion=array_intersect( $vales,$valesreferenciados);
        ECHO " ITESECCIONM ".VAR_DUMP($interseccion)."<BR>";
        IF(COUNT($interseccion)>0){
            foreach($interseccion as $clave=>$valor){
                    unset($arraypar[$valor]);
               if( array_search($valor,$arraypar))unset($arraypar[array_search($valor,$arraypar)]);
               }
                $vales=array_keys($arraypar);
        }
        ECHO " vales ".VAR_DUMP($vales)."<BR>";

       ///prteparamos n array de parametros pra el querybuilder
        $valores=array();
        $i=0;
        foreach($vales as $clave=>$valor){
            $valores[":ycp".$i]=$valor.'';
            $i=$i+1;
        }

        print_r( $valores);echo "<br>";
        $criterio=New CDBCriteria;
        $criterio->addCondition("a.id=b.hidvale AND b.id=c.idkardex AND b.numdocref=:numocompra");
        $criterio->addInCondition('a.numvale',array_keys($valores));
        $valores[":numocompra"]=$model->numocompra;
        $criterio->params= $valores;
        $entregas=yii::app()->db->createCommand()->
        select('c.id')->from('{{almacendocs}} a,{{alkardex}} b, {{alentregas}} c')
            ->where($criterio->condition,$criterio->params)->queryAll();
        //buscando las enrtegas
        $registrocompra=Ocompra::findByNumero($model->numocompra);
       echo "entregas <br>";var_dump($entregas);
        yii::app()->end();*/
      //  print_r($entregaspendientes); yii::app()->end();
        $entregaspendientes=MiFactoria::octieneparafacturar($model->numocompra);
        foreach( $entregaspendientes as  $clave=>$fila){

            $detalle=new Tempdetingfactura;
            $detalle->setScenario('basico');
            $detalle->setAttributes(
                        array(
                            'hidfactura'=>$model->id,
                            'hidalentrega'=>$fila["identrega"],
                            'idusertemp'=>yii::app()->user->id,
                            'idstatus'=>1,//+1 agregado
                            'codestado'=>'10',
                        )
            );
          //  print_r($detalle->attributes);yii::app()->end();
           if(!$detalle->save())
               yii::app()->user->setFlash('error',yii::app()->mensajes->getErroresItem($detalle->geterrors()));
        }
    }

    public static function titulo($titulo,$imagen){
        echo  CHtml::openTag("h1")."  ".CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$imagen.".png")."  ".$titulo.CHtml::closeTag("h1");

    }


    public static function textoamatriz($texto){
        //detectando las tabulaciones
        $general=array();
        $filas=explode("\n",$texto);
        foreach($filas as $clave=>$valor){
            $general[$clave]=explode("\t",$valor);

        }
 array_pop($general);
        return $general;
    }


    public static function meses()
    {
        return array(
            '01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL',
            '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO',
            '09' => 'SETIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE',
        );
    }

        public static function anos(){
            return array(
                '01'=>'2001','02'=>'2002','03'=>'2003','04'=>'2004',
                '05'=>'2005','06'=>'2006','07'=>'2007','08'=>'2008',
                '09'=>'2009','10'=>'2010','11'=>'2011','12'=>'2012',
                '13'=>'2013','14'=>'2014','15'=>'2015','16'=>'2016',
                '17'=>'2017','18'=>'2018','19'=>'2019','20'=>'2020',
                '21'=>'2021','22'=>'2022','23'=>'2033','24'=>'2024',
                '25'=>'2025','26'=>'2026','27'=>'2027','28'=>'2028',
            );
    }

}//fin de la clase Mifactoria